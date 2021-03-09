<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->bookmarkingPosts;

        return view('bookmarks.index', ['posts' => $posts]);
    }

    public function add(Post $post)
    {
        // PostモデルにbookmarkへのリレーションがなかったらhasManyで追加してください
        $bookmark = $post->bookmarks()->firstOrNew(['user_id' => Auth::id()]);
        if (!$bookmark->id) { 
            // データが存在してない時は登録して、通知
            $bookmark->save();
            $bookmark->notifications()->create([
                'user_id' => $post->user->id,
                'message' => '<a href="' .route('users.show', Auth::id()) . '">' . Auth::user()->name . '</a>から<a href="' .route('posts.show', $post) . '">' . $post->title . '</a>にいいねが届きました！<br>
                <a href="' .route('posts.show', $post) . '">' . $post->title . '</a>をクリックし、いいねを返しましょう！',
            ]);
        }
        return redirect()->back();
    }

    public function remove(Post $post)
    {
    Auth::user()->bookmarkingPosts()->detach($post->id);

    return redirect()->back();
    }
}
