<html>
<head>
<title>スタッフログイン画面</title>
</head>
<body>
<h1>スタッフログイン画面</h1>
<form action="login_staff.php" method="post">
  メールアドレス：<input type="text" name="mail_address" size="30"><br>
  パスワード：<input type="password" name="password" size="20"><br>
  <input type="submit" value="ログイン">
</form>
</body>
</html>
<?php
//データベース名、ユーザー名、パスワード
$dsn = 'mysql:dbname=staff_all_osaka;host=localhost;charset=utf8';
$user = 'r.takeda';
$password = '123456';

//MySQLのデータベースに接続
$pdo = new PDO($dsn, $user, $password);
// テーブル全行取得（データ取得）
$result_list = $pdo->query('SELECT * FROM employee_list');

// ユーザー情報を格納する配列
foreach ($result_list as $row)
$users = [
    [
        'mail_address' => $row['mail_address'],
        'password' => $row['password']
    ],
];

// ログイン処理
if (isset($_POST['mail_address']) && isset($_POST['password'])) {
    $name = $_POST['mail_address'];
    $password = $_POST['password'];

    foreach ($users as $staff) {
        if ($name === $staff['mail_address'] && $password === $staff['password']) {
            // ログイン成功
            echo 'ログインしました';
            header('Location:remailer.php');
            exit;
        } else {
            echo 'メールアドレスもしくはパスワードが間違っています。';
            $link = '<a href="login_staff.php">戻る</a>';
        }
    }

}

?>