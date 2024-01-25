<?php
session_start();
include("functions.php");
check_session_id();

$pdo = connect_to_db();

$user_id = $_SESSION['user_id'];

// SQL作成&実行
// ここで表示したいことを書く（絞り込み、並び替えなど）
$sql = 'SELECT * FROM `my_table`';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// DB接続，SQL実行など

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td><a href='like_create.php?user_id={$user_id}&item_id={$record["id"]}'>like</a></td>
      <td>{$record["item"]}</td>
      <td>{$record["genre"]}</td>
      <td>{$record["maker"]}</td>


    </tr>
  ";
}
}


//「検索」ボタン押下時
if (isset($_POST["search"])) {

//「アイテム」だけ入力されている場合
if (isset($_POST["search_item"]) && empty($_POST["search_maker"])){
$search_item = $_POST["search_item"];
$search_maker = '';
}

//「メーカー」だけ入力されている場合
if (empty($_POST["search_item"]) && isset($_POST["search_maker"])){
$search_item = '';
$search_maker = $_POST["search_maker"];
}

//「アイテム」「メーカー」両方が入力されている場合
if (isset($_POST["search_item"]) && isset($_POST["search_maker"])){
$search_item = $_POST["search_item"];
$search_maker = $_POST["search_maker"];
}

//実行
$sql="SELECT * FROM my_table WHERE item like '%{$search_item}%' and maker like '%{$search_maker}%'";
$rec = $pdo->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);

}else{

//「検索」ボタン押下してないとき
// $sql='SELECT * FROM my_table WHERE 1';
$sql='SELECT * FROM my_table
    LEFT OUTER JOIN
    (SELECT item_id, COUNT(id) AS like_count
        FROM like_table
        GROUP BY item_id
    ) AS result_table
    ON  my_table.id = result_table.item_id';
$rec = $pdo->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);
}

//データベース切断
// $dbh=null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャンプギアリスト（検索画面）</title>
    <!-- bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!-- FontAwesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<a href="gear_input.php" class="button is-info">入力画面へ</a>
<a href="gear_index.php" class="button is-success">ホームへ</a>
<a href="gear_read.php" class="button is-info">マイリストへ</a>
<!--検索-->
<form action="gear_search.php" method="POST">
<table>
<tr>
<th>名前</th>
<td><input type="text" name="search_item" value="<?php if( !empty($_POST['search_item']) ){ echo $_POST['search_item']; } ?>"></td></td>
<th>メーカー</th>
<td><input type="text" name="search_maker" value="<?php if( !empty($_POST['search_maker']) ){ echo $_POST['search_maker']; } ?>"></td>
<td><input type="submit" name="search" value="検索"></td>
</tr>
</table>
</form>

<!--検索解除-->
<?php if (isset($_POST["search"])) {?>
<a href="gear_search.php">検索を解除</a><br />
<?php } ?>

<!-- 検索結果の表示 -->
  <div class="columns">
    <div class="column">
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th>チェック</th>
          <th>アイテム</th>
          <th>ジャンル</th>
          <th>メーカー</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
    </div>

</body>
</html>
