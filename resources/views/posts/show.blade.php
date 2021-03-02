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
              <button id="button" class="btn btn-success" disabled="disabled">いいねを送りました</button>        
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
    @if(Auth::id() === $post->user_id)
    <p class="card-text font-weight-bold">この案件にいいねしたデザイナー</p>
    @endif
    <div class="container">
    @foreach($bookmarkUsers as $bookmarkUser)
      <div class="card">
        <div class="card-header">
        @if ($bookmarkUser->filepath)
        <img src="{{ $bookmarkUser->image_url }}" alt="{{ $bookmarkUser->name }}" class="img-thumbnail" style="width: 100px" >
        @endif
        {{ $bookmarkUser->name }}
        <div class="d-flex justify-content-end">
        @if(\App\Models\MessageGroup::where('post_id', $post->id)->whereHas('members', function($query) use($bookmarkUser) { return $query->where('user_id', $bookmarkUser->id); })->count())
        <button id="button" class="btn btn-success" disabled="disabled">マッチング済み</button>
        @else
        <form method="GET" action="{{ route('messages.start', [$post, $bookmarkUser]) }}">
        <button type="submit" class="btn btn-success">いいねを返してメッセージする</button>
        </form>
        @endif
        </div>
        </div>
      </div>
      <br>
    @endforeach
    </div>
  </div>
@endsection