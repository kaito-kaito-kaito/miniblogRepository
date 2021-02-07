@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">{{ $post->user->name }}</div>
      <div class="card-body">
        <p class="card-text">{{ $post->title }}</p>
        <p class="card-text">{!! nl2br(e($post->body)) !!}</p>
        @auth
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
        @endauth
      </div>
    </div>
  </div>


@endsection