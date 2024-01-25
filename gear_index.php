<?php
session_start();
include("functions.php");
check_session_id();

$pdo = connect_to_db();

$username = $_SESSION['username'];

?>

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
                <?php echo $username;?>さんのマイページ
            </p>
        </div>
    </div>
</section>

<div class="tile is-ancestor">

    <div class="tile is-parent">
    <article class="tile is-child box">
        <p class="title">検索</p>
        <p class="subtitle">キャンプギアを検索しマイリストに登録</p>
        <a href="gear_search.php" class="button is-dark">検索画面へ</a>
    </article>
    </div>
    <div class="tile is-parent">
    <article class="tile is-child box">
        <p class="title">マイリスト</p>
        <p class="subtitle">手持ちのキャンプギアを表示する</p>
        <a href="gear_read.php" class="button is-dark">マイリストへ</a>
    </article>
    </div>
    <div class="tile is-parent">
    <article class="tile is-child box">
        <p class="title">持ち物リスト</p>
        <p class="subtitle">マイリストのうち持っていくものを表示</p>
        <a href="gear_read_use.php" class="button is-dark">持ち物リストへ</a>
    </article>
    </div>

</div>

<a href="gear_logout.php">ログアウト</a>


</body>
</html>