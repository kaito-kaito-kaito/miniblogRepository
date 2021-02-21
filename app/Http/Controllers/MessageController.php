<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\MessageGroup;
use App\Models\MessageMember;
use App\Models\Post;
use App\Models\User;

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

        $messageMember = MessageMember::create([
            'message_group_id' => $messageGroup->id,
            'user_id' => $user->id, 
        ]);

        // return redirect()->url('/message-group/' . $messageGroup->id);
        return redirect()->route('messages.show', $messageGroup);
    }
    
    public function index() //グループ一覧
    {
        $messageGroups = null;
        return view('messages.index', [ 'messageGroups' => $messageGroups ]);
        //やること　一覧の取得処理、blade(参考；案件一覧)
    }

    public function show(MessageGroup $messageGroup) //メッセージ一覧
    {
        $messages = $messageGroup->messages()->paginate();
        return view('messages.show', [ 'messages' => $messages ]);
        //やること　blade
    }

    public function send(CreateRequest $request, MessageGroup $messageGroup) //メッセージ投稿
    {
        return redirect()->route('messages.show', $messageGroup);
        //やること　フォームリクエスト作成、メッセージテーブルにデータ登録(参考；案件投稿)
    }
}
