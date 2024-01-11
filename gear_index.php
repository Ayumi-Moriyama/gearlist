<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ギアリスト（ホーム画面）</title>
    <!-- bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="hero is-success is-halfheight">
    <div class="hero-body">
    <div class="">
        <p class="title">
        キャンプギアリスト
        </p>
        <p class="subtitle">
        キャンプギアの登録・検索・集計
        </p>
    </div>
    </div>
</section>

<div class="tile is-ancestor">
    <div class="tile is-parent">
    <article class="tile is-child box">
        <p class="title">登録</p>
        <p class="subtitle">キャンプギアを登録する</p>
        <a href="gear_input.php" class="button is-dark">登録画面へ</a>
    </article>
    </div>
    <div class="tile is-parent">
    <article class="tile is-child box">
        <p class="title">検索</p>
        <p class="subtitle">手持ちのキャンプギアを検索する</p>
        <a href="gear_search.php" class="button is-dark">検索画面へ</a>
    </article>
    </div>
    <div class="tile is-parent">
    <article class="tile is-child box">
        <p class="title">集計</p>
        <p class="subtitle">キャンプギアの重量などを集計する</p>
        <a href="gear_read.php" class="button is-dark">集計画面へ</a>
    </article>
    </div>
</div>



</body>
</html>