@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-2">
            @if ($user->filepath)
            <img src="{{ $user->image_url }}" alt="{{ $user->name }}" class="img-thumbnail" style="width: 200px" >
            @endif
            <div class="card-body">
            <p>{{ $user->name }}</p>
            <p> {{ $user->email }} </p>         
            </div>
    </div>
</div>
@endsection
