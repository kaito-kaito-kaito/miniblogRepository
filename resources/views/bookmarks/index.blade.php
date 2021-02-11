@extends('layouts.app')

@section('content')
  <div class="container">
    @forelse($posts as $post)
      <div class="card">
        <div class="card-header">
        @if ($post->user->filepath)
        <img src="{{ $post->user->image_url }}" alt="{{ $post->user->name }}" class="img-thumbnail" style="width: 100px" >
        @endif
        {{ $post->user->name }}
        </div>
        <div class="card-body">
        　<p class="card-text font-weight-bold">{{ $post->title }}</p>
          <p class="card-text">{{ $post->body }}</p>
          <p class="card-text"><a href="{{ route('posts.show', $post->id) }}">詳細を見る</a></p>
        </div>
      </div>
      <p></p>
    @empty
      <p>いいねはありません</p>
    @endforelse
  </div>
@endsection