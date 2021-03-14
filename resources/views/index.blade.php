@extends('layouts.app')

@section('content')
<div class="jumbotron" style="margin-top: -1.5rem;">
        <div class="container">
          <h1 class="display-5">
          個人ゲーム開発向け<br>
          マッチングサイトDtoDへようこそ！</h1>
          <p>DtoDは、デザインにもっとこだわりたい！と考えているゲームディベロッパーの方や<br>
        オリジナルのゲームを作ってみたい！というデザイナーの方に向けたマッチングサイトです！<br>
        利用料はもちろん無料。まずは新規登録してみましょう！</p>
        </div>
      </div>
</div>
<div class="container">
<h5 class="card-subtitle mb-2 text-muted">使い方</h5>
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-6">
            <h2>ディベロッパー</h2>
            <p>1.右上のメニュー「投稿する」から案件のタイトル、ゲームジャンルや条件などの詳細を記入し投稿しましょう！<br>
            2.デザイナーから案件にいいねされたら「通知」にメッセージが届きます。デザイナーの情報を確認し、いいねを返しましょう！<br>
            3.いいねを返した時点でトークルームが作成され、デザイナー側に通知が届きます。案件について話し合いましょう！<br></p>
          </div>
          <div class="col-md-6">
            <h2>デザイナー</h2>
            <p>1.右上のメニュー「案件を探す」から希望のゲームジャンル、条件などを検索し自分に合った案件を探しましょう！<br>
            2.希望に合う案件があったら、「詳細を見る」からいいねを送りましょう！<br>
            3.ディベロッパー側からいいねを返されたら「通知」が届きトークルームが作られます。案件について話し合いましょう！ </p>
          </div>
        </div>
</div>
@endsection