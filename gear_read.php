<?php

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
      <td></td>
      <td>{$record["item"]}</td>
      <td>{$record["genre"]}</td>
      <td>{$record["maker"]}</td>
      <td>{$record["weight"]}</td>
      <td>{$record["price"]}</td>
      <td>
        <a href='gear_edit.php?id={$record["id"]}'>edit</a>
      </td>
      <td>
        <a href='gear_delete.php?id={$record["id"]}'>delete</a>
      </td>
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
  <title>キャンプギアリスト（一覧画面）</title>
  <!-- bulma -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <fieldset>
    <legend>キャンプギアリスト（一覧画面）</legend>
    <a href="gear_input.php">入力画面へ</a>
    <a href="gear_index.php">ホームへ</a>
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
          <th>更新</th>
          <th>削除</th>
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