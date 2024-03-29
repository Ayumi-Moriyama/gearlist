<?php
session_start();
include("functions.php");
check_session_id();

$pdo = connect_to_db();

$user_id = $_SESSION['user_id'];

// SQL作成&実行
// ここで表示したいことを書く（絞り込み、並び替えなど）
$sql="SELECT * FROM my_table
    LEFT OUTER JOIN
    (SELECT item_id,user_id, COUNT(id) AS like_count
        FROM like_table
        GROUP BY item_id
    ) AS result_table
    ON  my_table.id = result_table.item_id
    HAVING user_id = '$user_id'";

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
      <td><a href='use_create.php?user_id={$user_id}&item_id={$record["id"]}'>use</a></td>
      <td>{$record["item"]}</td>
      <td>{$record["genre"]}</td>
      <td>{$record["maker"]}</td>
      <td>{$record["weight"]}</td>
      <td>{$record["price"]}</td>
    </tr>
  ";
}
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>キャンプギアリスト（マイリスト）</title>
  <!-- bulma -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <fieldset>
    <legend>キャンプギアリスト（マイリスト）</legend>
    <a href="gear_index.php" class="button is-success">ホームへ</a>
    <a href="gear_read_use.php" class="button is-info">持ち物リストへ</a>
  <div class="columns">
    <div class="column">
      <table class="table is-bordered">
        <thead>
          <tr>
            <th>金額合計(円)</th>
            <th>総重量(㎏)</th>
          </tr>
        </thead>
        <tbody>
            <td id="price"></td>
            <td id="weight"></td>
        </tbody>
      </table>
    </div>
  </div>
  <div class="columns">
    <div class="column">
    <table class="table is-bordered is-striped is-hoverable">
      <thead>
        <tr>
          <th>チェック</th>
          <th>アイテム</th>
          <th>ジャンル</th>
          <th>メーカー</th>
          <th>重さ（ｇ）</th>
          <th>価格</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
    </div>

  </fieldset>

<script>
  // PHPのデータをJSに渡す
      const resultArray = <?=json_encode($result) ?>;
      console.log(resultArray);

  // 金額合計
      const totalPrice = resultArray.reduce((sum,i)=>sum + i.price, 0);
      // console.log(totalPrice); 
      $("#price").text(totalPrice);

  // 重さ合計（総重量）
      const weightList = resultArray.reduce((sum,i)=>sum + i.weight, 0);
      console.log(`総重量は${weightList}gです`);
      const weightListKg = weightList / 1000;
      console.log(weightListKg); 
      $("#weight").text(weightListKg);

</script>

</body>

</html>