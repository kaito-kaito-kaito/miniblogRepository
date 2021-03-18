@extends('layouts.app')

@section('content')
<div class="container">
        <label class="font-weight-bold">{{ $messageGroup->post->title }}</label>
        <form method="POST" action="{{ route('messages.send', $messageGroup->id) }}">
        <div class="d-flex">
            @csrf
            <input id="body" name="body" type="text" class="form-control" style="width: 500px" placeholder="入力して下さい" required autofocus>
            <button type="submit" class="btn btn-primary">送信</button>
            </form>
        </div>
        <div class="d-flex justify-content-end">
        <a  href="{{ route('messages.index') }}">トークルーム一覧に戻る</a>
        </div>
</div>    
<br>    

<div class="container mt-4">
    @foreach($messages as $message)
    @if (Auth::id() === $message->member->user_id )
    <div class="d-flex justify-content-end">
    <div class="card w-50">
    @else
    <div class="d-flex justify-content-start">
    <div class="card w-50">
    @endif
        <div class="card-header">
            @if ($message->member->user->base64Image)
            <img src="{{ $message->member->user->base64Image }}" alt="{{ $message->member->user->name }}" class="img-thumbnail" style="width: 100px" >
            @endif
            {{ $message->member->user->name }}
        </div>
        <div class="card-body">
        <small>{{ $message->created_at->format('Y/m/d H:i') }}</small>
        <p class="card-text">{{ $message->body }}</p>
        </div>
    </div>
    </div>
    <br>
    @endforeach
    @if(empty($message))
    現在、メッセージはありません
    @endif
</div>
@endsection