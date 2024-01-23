<?php
session_start();
include("functions.php");
check_session_id();

// 入力項目のチェック
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
!isset($_POST['weight']) || $_POST['weight'] === '' ||
!isset($_POST['id']) || $_POST['id'] === ''
) {
  exit('paramError');
}

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
$id = $_POST['id'];

// var_dump($_POST);
// exit();

// DB接続
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'UPDATE my_table SET item=:item, category=:category, genre=:genre, maker=:maker,
purchase_date=:purchase_date, price=:price, long_side=:long_side, short_side=:short_side, thickness=:thickness, weight=:weight, 
updated_at=now() WHERE id=:id';

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
$stmt->bindValue(':id', $id, PDO::PARAM_STR);


try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:gear_read.php');
exit();
