@extends('layouts.app')

@section('content')
  @foreach($errors->all() as $message)
    <div>{{ $message }}</div>
  @endforeach

  @if(Session::has('message'))
    <div>{{ Session::get('message') }}</div>
  @endif
  
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
        <h5 class="card-subtitle mb-2 text-muted">ユーザー情報</h5>
          <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
            @csrf

            @if ($user->filepath)
            <div class="text-center">
            <img src="{{ $user->image_url }}" alt="{{ $user->name }}" class="img-thumbnail" style="width: 200px">
            </div>
            @endif

            <p></p>
            
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">プロフィール画像</label>

              <div class="col-md-6">
              <input name="file" type="file" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">名前</label>

              <div class="col-md-6">
              <input name="name" type="text" class="form-control" value="{{ $user->name }}" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">メールアドレス</label>

              <div class="col-md-6">
              <input name="email" type="email" class="form-control" value="{{ $user->email }}" />
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">経歴など</label>

              <div class="col-md-6">
              <textarea name="career" class="form-control">{{ $user->career }}</textarea>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">変更</button>
              </div>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection