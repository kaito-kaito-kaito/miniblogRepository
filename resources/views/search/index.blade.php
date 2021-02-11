@extends('layouts.app')

@section('content')
  <div class="container">
            <form action="{{ route('search.index') }}" method="GET">
                <div class="d-flex">
                <input type="text" name="q" class="form-control" style="width: 500px" placeholder="入力して下さい" value="{{$keyword}}" required autofocus>
                <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </form>
        <br>
        <br>
  </div>
  
  <div class="container">
    @foreach($posts as $post)
      <div class="card">
        <div class="card-header">
        @if ($post->user->filepath)
        <img src="{{ $post->user->image_url }}" alt="{{ $post->user->name }}" class="img-thumbnail" style="width: 100px" >
        @endif
        {{ $post->user->name }}
        </div>
        <div class="card-body">
        　<p class="card-text font-weight-bold">{{ $post->title }}</p>
          <p class="card-text">{{ $post->body }}</p>
          <p class="card-text"><a href="{{ route('posts.show', $post->id) }}">詳細を見る</a></p>
        </div>
      </div>
      <br>
    @endforeach
  </div>

  <div class="container">
      <div class="col-sm-8" style="text-align:right;">
          <div class="paginate">
          {{ $posts->appends(Request::only('q'))->links() }}
          </div>
      </div>
  </div>
  
  
@endsection