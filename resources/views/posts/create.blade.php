@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
        <h5 class="card-subtitle mb-2 text-muted">案件</h5>
          <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group row">
              <label for="title" class="col-md-4 col-form-label text-md-right  font-weight-bold">タイトル</label>

              <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="" required autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="body" class="col-md-4 col-form-label text-md-right">内容</label>

              <div class="col-md-6">
                <textarea id="body" class="form-control" name="body" required></textarea>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">投稿</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection