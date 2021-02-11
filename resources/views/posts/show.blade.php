@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
      @if ($post->user->filepath)
      <img src="{{ $post->user->image_url }}" alt="{{ $post->user->name }}" class="img-thumbnail" style="width: 100px" >
      @endif
      {{ $post->user->name }}
      </div>
      <div class="card-body">
        <p class="card-text font-weight-bold">{{ $post->title }}</p>
        <p class="card-text">{!! nl2br(e($post->body)) !!}</p>
        @auth
        @if (Auth::user()->isDesigner())
          @unless($bookmarked)
            <form method="POST" action="{{ route('bookmarks.add', $post->id) }}">
              @csrf
              <button type="submit" class="btn btn-success">いいね</button>
            </form>
            @else
            <form method="POST" action="{{ route('bookmarks.remove', $post->id) }}">
              @csrf
              <button type="submit" class="btn btn-danger">いいねを解除する</button>
            </form>            
          @endunless
          @endif
          @if(Auth::id() === $post->user_id)
            <form method="POST" action="{{ route('posts.delete', $post->id) }}">
              @csrf
              <button type="submit" class="btn btn-danger">削除</button>
            </form>
          @endif
        @endauth
      </div>
    </div>
    
    <a class="text-center" href="{{ route('search.index') }}">案件一覧に戻る</a>
  </div>
@endsection