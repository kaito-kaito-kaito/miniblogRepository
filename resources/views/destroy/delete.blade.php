@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
        <h5 class="card-subtitle mb-2 text-muted">退会フォーム</h5>
        <div class="form-group row">
        <label for="body" class="col-md-9 col-form-label ">一度退会した場合、ユーザー情報はすべて消去され、当サイトを再び利用する際は再度の登録が必要となります。よろしいですか？</label>        
        </div>
        
            <form method="post" action="{{ route('users.delete') }}">
    　　　　@csrf
    　　　　@method('delete')
           <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-8">
                <button type="submit" class="btn btn-danger">退会する</button>
              </div>
            </div>
          　</form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection