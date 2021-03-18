
# DtoD
DtoDは個人ゲーム開発者(プログラマー)、デザイナー向けのマッチングアプリです。


# イメージ画像
![トップ画面](https://user-images.githubusercontent.com/77225648/111067447-a5ed7500-8507-11eb-8128-549e1f42ea51.png)

![投稿画面](https://user-images.githubusercontent.com/77225648/111027539-3bb7d000-8434-11eb-971f-55fc1d99ca75.png)

![ユーザー情報編集画面](https://user-images.githubusercontent.com/77225648/111027562-58ec9e80-8434-11eb-85bb-f7c5459be2eb.png)

![通知画面](https://user-images.githubusercontent.com/77225648/111027573-64d86080-8434-11eb-82ed-03ca30ebc0bb.png)

![検索画面](https://user-images.githubusercontent.com/77225648/111027589-833e5c00-8434-11eb-864b-26fc779370c9.png)

![案件詳細画面](https://user-images.githubusercontent.com/77225648/111027873-54c18080-8436-11eb-87f0-2562559be09a.png)

![メッセージ画面](https://user-images.githubusercontent.com/77225648/111617331-50c2a380-8826-11eb-972b-76563619042b.png)

# 特徴
![リーンキャンバス](https://user-images.githubusercontent.com/77225648/111067463-b69deb00-8507-11eb-8ce9-e46ad266d554.png)


# 使用した言語・技術・ライブラリなど

- PHP (>= 7.0)
- Laravel 6.0
- MySQL
- jQuery
- Bootstrap
- Heroku


# 使い方

- https://murmuring-sierra-14815.herokuapp.com にアクセス。
- 右上のメニューから「名前」「メールアドレス」などの諸項目を記入し、新規登録。
- ディベロッパーの場合
    - 右上のメニュー「投稿する」から案件のタイトル、ゲームジャンルや条件などの詳細を記入し投稿。
    - デザイナーから案件にいいねされたら「通知」にメッセージが届く。デザイナーの情報を確認し、いいねを返す。
    - いいねを返した時点で右上のメニュー「メッセージ」にトークルームが作成され、デザイナー側に通知が届く。案件についてメッセージをやり取りする。
- デザイナーの場合
    - 右上のメニュー「案件を探す」から希望のゲームジャンル、条件などを検索し、案件を探す。
    - 希望に合う案件があったら、「詳細を見る」からいいねを送る。
    - ディベロッパー側からいいねを返されたら「通知」が届き、右上のメニュー「メッセージ」にトークルームが作られる。案件についてメッセージのやり取りをする。
