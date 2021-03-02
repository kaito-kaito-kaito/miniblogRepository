@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($messageGroups as $messageGroup)
      <div class="card">
        <div class="card-header">
        <label class="font-weight-bold">{{ $messageGroup->post->title }} /</label>
        @foreach($messageGroup->members as $member)
        {{ $member->user->name }}
        @endforeach
        </div>
        <div class="card-body">
        <div class="d-flex justify-content-end">
        <a  href="{{ route('messages.show', $messageGroup->id) }}">トーク画面へ</a>
        </div>
        </div>
      </div>
      <br>
    @endforeach
  </div>
@endsection
