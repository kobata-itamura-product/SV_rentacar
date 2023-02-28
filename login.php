<html>
<head>
<title>マスターログイン画面</title>
</head>
<body>
<h1>マスターログイン画面</h1>
<form action="login.php" method="post">
  メールアドレス：<input type="text" name="mail_address" size="20"><br>
  パスワード：<input type="password" name="password" size="20"><br>
  <input type="submit" value="ログイン">
</form>
</body>
</html>
<?php

// ユーザー情報を格納する配列
$users = [
    [
        'mail_address' => 'r.takeda@good-works.co.jp',
        'password' => '123456'
    ],
];

// ログイン処理
if (isset($_POST['mail_address']) && isset($_POST['password'])) {
    $name = $_POST['mail_address'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($name === $user['mail_address'] && $password === $user['password']) {
            // ログイン成功
            echo 'ログインしました';
            header('Location:mailer.php');
            exit;
        }
    }

}

?>