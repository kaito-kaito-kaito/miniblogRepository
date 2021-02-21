@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインしました！<br>
                    右上のユーザー名をクリックして、早速機能を使っていきましょう！
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
