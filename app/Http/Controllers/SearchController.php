<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('q');
        $query = Post::query();

        if(!empty($keyword))
        {
            $query->where('title','like','%'.$keyword.'%')->orWhere('body','like','%'.$keyword.'%');
        }

        $posts = $query->orderBy('created_at','desc')->paginate(10);
        return view('search.index', ['posts' => $posts])->with('keyword',$keyword);

    }

}
