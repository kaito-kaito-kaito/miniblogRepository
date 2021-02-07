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
                    <p>{{ $user->name }}</p>
                    <p> {{ $user->email }} </p>
                </div>
                <div>
                    @if ($user->career)
                        <p>{!! nl2br(e($user->career)) !!}</p>
                    @endif
                </div>
            </div>      
        </div>
    </div>
</div>
@endsection
