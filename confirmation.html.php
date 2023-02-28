<!DOCTYPE html>
<html>
<head>
<title>安否確認</title>
</head>
<body>
<h1>安否確認</h1>
<?php
    //データベース名、ユーザー名、パスワード
    $dsn = 'mysql:dbname=staff_all_osaka;host=localhost;charset=utf8';
    $user = 'r.takeda';
    $password = '123456';

    //MySQLのデータベースに接続
    $pdo = new PDO($dsn, $user, $password);

// テーブル全行取得（データ取得）
$result_list = $pdo->query('SELECT * FROM employee_list');

$field_name = $_POST['name'];
$field_email = $_POST['email'];
$field_message = $_POST['message'];
$mail_to = 'o78.kobata.takahiro@gmail.com'; //（**送信先のメールアドレスを入力）
$subject = 'Message from a site visitor '.$field_name;
$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;
$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";
$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) {?>
    <script language="javascript" type="text/javascript">
        window.location = '';//（※送信後に移動するページ）
    </script>
<?php }
else {?>
    <script language="javascript" type="text/javascript">
        alert('メッセージ送信に失敗しました。こちらのメールアドレスへお問い合わせください。test@gmail.com');//（※自分のメールアドレス）
        window.location = '';//（※送信失敗後に移動するページ）
    </script>
<?php
}
?>
<form role="form" action="confirmation.php" method="post">
<div class="form-group">
<label for="exampleInputName1">Your Name</label>
<input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name" name="name">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
<label for="exampleInputText1">Message</label>
<textarea class="form-control" rows="3" name="message">本文

お疲れ様です。
大阪支社、（氏名）です。

安否について問題無い旨、ご報告いたします。
</textarea>
</div>
<button type="submit" value="SEND MESSAGE" class="btn btn-default">送信</button>
</form>
</body>
</html>
