@extends('layouts.app')

@section('content')
<div class="container">
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインしました！<br>
                    右上のユーザー名をクリックして、早速DtoDを使っていきましょう！
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
