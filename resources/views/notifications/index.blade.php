@extends('layouts.app')

@section('content')
<div class="container">
@foreach($notifications as $notification)
    <div class="card mb-2">
        <div class="card-body">
            <small>{{ $notification->created_at->format('Y/m/d H:i') }}</small>
            <p>{!! $notification->message !!}<p>
        </div>
    </div>
@endforeach
</div>
@endsection