@extends('layouts.app')

@section('content')
<div class="container">
<label class="font-weight-bold">トークルーム一覧</label>
    @foreach($messageGroups as $messageGroup)
      <div class="card">
        <div class="card-header">
        <p class="card-text"><a href="{{ route('posts.show', $messageGroup->post_id) }}">{{ $messageGroup->post->title }}</a> / 
        @foreach($messageGroup->members as $member)
        <a href="{{ route('users.show', $member->user_id) }}">{{ $member->user->name }}</a>
        @endforeach
        </p>
        </div>
        <div class="card-body">
        @if ($messageGroup->last_body)
        <small>{{ $messageGroup->last_posted_at->format('Y/m/d H:i') }}</small>
        <p>{{ $messageGroup->last_body }}</p>
        @endif
        <div class="d-flex justify-content-end">
        <a  href="{{ route('messages.show', $messageGroup->id) }}">トーク画面へ</a>
        </div>
        </div>
      </div>
      <br>
    @endforeach
    @if(empty($messageGroup))
    現在、トークルームはありません
    @endif
  </div>
@endsection
