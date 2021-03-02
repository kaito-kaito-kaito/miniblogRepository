<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\MessageGroup;
use App\Models\MessageMember;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\CreateRequest;

class MessageController extends Controller
{
    public function start(Post $post,User $user)
    {
        // last_body, last_posted_at はnull
        $messageGroup = MessageGroup::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);

        $messageMember = MessageMember::create([
            'message_group_id' => $messageGroup->id,
            'user_id' => Auth::id(), 
        ]);
        
        $messageGroup->notifications()->create([
            'user_id' => Auth::id(),
            'message' => '<a href="' .route('users.show',$user->id ) . '">' . $user->name . '</a>と<a href="' .route('posts.show', $post) . '">' . $post->title . '</a>についてのトークルームを作りました！',
        ]);

        $messageMember = MessageMember::create([
            'message_group_id' => $messageGroup->id,
            'user_id' => $user->id, 
        ]);
        
        $messageGroup->notifications()->create([
            'user_id' => $user->id,
            'message' => '<a href="' .route('users.show', Auth::id()) . '">' . Auth::user()->name . '</a>と<a href="' .route('posts.show', $post) . '">' . $post->title . '</a>についてマッチングしました！<br>
            右上のメニューからメッセージを確認しましょう！',
        ]);

        // return redirect()->url('/message-group/' . $messageGroup->id);
        return redirect()->route('messages.show', $messageGroup);
    }
    
    public function index() //グループ一覧
    {
        $messageGroups = MessageGroup::query()
        ->whereHas('members', function($query) {
            $query->where('user_id', Auth::id());
        })
        ->orderBy('post_id', 'desc')
        ->paginate();

        return view('messages.index', [ 'messageGroups' => $messageGroups ]);
        //やること　一覧の取得処理、blade(参考；案件一覧)
    }

    public function show(MessageGroup $messageGroup) //メッセージ一覧
    {
        $messages = $messageGroup->messages()->orderBy('id', 'desc')->paginate();
        return view('messages.show', [ 'messages' => $messages, 'messageGroup' =>$messageGroup  ]);
        //やること　blade
    }

    public function send(CreateRequest $request, MessageGroup $messageGroup) //メッセージ投稿
    {
        $member = $messageGroup->members()->firstOrCreate(['user_id' => Auth::id()]);
        $message = new Message;
        $message->fill($request->all() + ['message_member_id' => $member->id])->save();

        return redirect()->route('messages.show', $messageGroup);
        //やること　フォームリクエスト作成、メッセージテーブルにデータ登録(参考；案件投稿)
    }
}
