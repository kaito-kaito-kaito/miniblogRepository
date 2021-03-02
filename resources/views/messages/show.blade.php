@extends('layouts.app')

@section('content')
<div class="container">
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
    <div class="card">
    <div class="card-header">
        {{ $message->member->user->name }}
    </div>
    <div class="card-body">
    <p class="card-text">{{ $message->body }}</p>
    </div>
    </div>
    <br>
    @endforeach
</div>
@endsection