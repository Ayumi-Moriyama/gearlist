<?php
// POSTデータ確認

$item = $_POST['item'];
$category = $_POST['category'];
$genre = $_POST['genre'];
$maker = $_POST['maker'];
$purchase_date = $_POST['purchase_date'];
$price = $_POST['price'];
$long_side = $_POST['long_side'];
$short_side = $_POST['short_side'];
$thickness = $_POST['thickness'];
$weight = $_POST['weight'];


if (
!isset($_POST['item']) || $_POST['item'] === '' ||
!isset($_POST['category']) || $_POST['category'] === '' ||
!isset($_POST['genre']) || $_POST['genre'] === '' ||
!isset($_POST['maker']) || $_POST['maker'] === '' ||
!isset($_POST['purchase_date']) || $_POST['purchase_date'] === '' ||
!isset($_POST['price']) || $_POST['price'] === '' ||
!isset($_POST['long_side']) || $_POST['long_side'] === '' ||
!isset($_POST['short_side']) || $_POST['short_side'] === '' ||
!isset($_POST['thickness']) || $_POST['thickness'] === '' ||
  !isset($_POST['weight']) || $_POST['weight'] === ''
) {
  exit('ParamError');
}

// 各種項目設定
$dbn ='mysql:dbname=camping_gear;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL作成&実行
$sql = 'INSERT INTO my_table (
  id, item, category, genre, maker, purchase_date, price, long_side, short_side, thickness, weight, created_at, updated_at
  ) VALUES (NULL, :item, :category, :genre, :maker, :purchase_date, :price, :long_side, :short_side, :thickness, :weight, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':maker', $maker, PDO::PARAM_STR);
$stmt->bindValue(':purchase_date', $purchase_date, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':long_side', $long_side, PDO::PARAM_STR);
$stmt->bindValue(':short_side', $short_side, PDO::PARAM_STR);
$stmt->bindValue(':thickness', $thickness, PDO::PARAM_STR);
$stmt->bindValue(':weight', $weight, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
header('Location:gear_input.php');
exit();
