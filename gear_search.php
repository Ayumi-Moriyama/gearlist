<?php
// 各種項目設定
$dbn ='mysql:dbname=camping_gear;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

$dbh=new PDO($dbn,$user,$pwd);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

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
$rec = $dbh->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);

}else{

//「検索」ボタン押下してないとき
$sql='SELECT * FROM my_table WHERE 1';
$rec = $dbh->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);
}

//データベース切断
$dbh=null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャンプギアリスト（検索画面）</title>
    <!-- bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<a href="gear_input.php">入力画面へ</a>
<a href="gear_index.php">ホームへ</a>
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
<br />

<!--検索解除-->
<?php if (isset($_POST["search"])) {?>
<a href="gear_search.php">検索を解除</a><br />
<?php } ?>

<table class="table is-fullwidth">
<tr>
<th>名前</th>
<th>ジャンル</th>
<th>メーカー</th>
</tr>

<!--MySQLデータを表示-->
<?php foreach ($rec_list as $rec) { ?>
<tr>
<td><?php echo $rec['item'];?></td>
<td><?php echo $rec['genre'];?></td>
<td><?php echo $rec['maker'];?></td>
</tr>
<?php } ?>
</table>

</body>
</html>
