<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>キャンプギアリストログイン画面</title>
</head>

<body>
  <form action="gear_login_act.php" method="POST">
    <fieldset>
      <legend>キャンプギアリストログイン画面</legend>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>ログイン</button>
      </div>
      <a href="gear_register.php">新規登録</a>
    </fieldset>
  </form>

</body>

</html>