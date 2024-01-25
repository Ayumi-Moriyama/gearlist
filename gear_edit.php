<?php
session_start();
include("functions.php");
check_session_id();

// id受け取り
$id = $_GET['id'];
// var_dump($_GET);
// exit();

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM my_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>キャンプギアリスト（編集画面）</title>
</head>

<body>
  <form action="gear_update.php" method="POST">
    <fieldset>
      <legend>キャンプギアリスト（編集画面）</legend>
      <a href="gear_read.php">一覧画面</a>
      <div>
        アイテム名: <input type="text" name="item" value="<?= $record['item'] ?>">
      </div>
      <div>
        カテゴリー: <input type="text" name="category" value="<?= $record['category'] ?>">
      </div>
      <div>
        ジャンル: <input type="text" name="genre" value="<?= $record['genre'] ?>">
      </div>
      <div>
        メーカー: <input type="text" name="maker" value="<?= $record['maker'] ?>">
      </div>
      <div>
        購入日: <input type="date" name="purchase_date" value="<?= $record['purchase_date'] ?>">
      </div>
      <div>
        購入時の価格（円）: <input type="number" name="price" value="<?= $record['price'] ?>">
      </div>
      <div>
        収納サイズ（長辺）cm: <input type="number" step="0.1" name="long_side" value="<?= $record['long_side'] ?>">
      </div>
      <div>
        収納サイズ（短辺）cm: <input type="number" step="0.1" name="short_side" value="<?= $record['short_side'] ?>">
      </div>
      <div>
        収納サイズ（厚み）cm: <input type="number" step="0.1" name="thickness" value="<?= $record['thickness'] ?>">
      </div>
      <div>
        重さ（ｇ）: <input type="number" name="weight" value="<?= $record['weight'] ?>">
      </div>

      <div>
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>