@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <div class="d-flex">
                <div>
                    @if ($user->filepath)
                    <img src="{{ $user->image_url }}" alt="{{ $user->name }}" class="img-thumbnail" style="width: 200px" >
                    @endif
                    <strong>{{ $user->name }}</strong><br>
                    {{ $user->email }}
                </div>
                <div class="card-body">
                    @if ($user->career)
                        {!! nl2br(e($user->career)) !!}
                    @endif
                </div>
            </div>      
        </div>
    </div>
    <a class="text-center" href="{{ route('notifications.index') }}">通知一覧に戻る</a>
</div>
@endsection
