<!DOCTYPE html>
<html lang="ja">
  <meta charset="utf-8">
  <head>
  <title>安否確認</title>
  </head>
  <body>
    <h1>安否確認</h1> 
    <form role="form" action="remailer.php" method="post">
    <div class="form-group">
    <label for="exampleInputName1">Your Name</label>
    <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter name" name="name" required>
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
    <label for="exampleInputText1">Message</label>
    <textarea class="form-control" rows="3" name="message" required>本文

    お疲れ様です。
    大阪支社、（氏名）です。

    安否について問題無い旨、ご報告いたします。
    </textarea>
    </div>
    <button type="submit" value="SEND MESSAGE" class="btn btn-default">送信</button>
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
?>
<?php
// PHPMailerの使用宣言
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// PHPMailerの読み込み
require_once('php_mailer/src/Exception.php');
require_once('php_mailer/src/PHPMailer.php');
require_once('php_mailer/src/SMTP.php');

// PHPMailerのインスタンス化
$mailer = new PHPMailer(true);

  // サーバーの設定
  $mailer->CharSet    = 'UTF-8';
  $mailer->SMTPDebug  = 0;
  $mailer->isSMTP();
  $mailer->Host       = 'vmss249.kagoya.net';
  $mailer->SMTPAuth   = true;
  $mailer->Username   = 'kir502106.t-kobata';
  $mailer->Password   = 'good8051';
  $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mailer->Port       = 587;

  $field_name = $_POST['name'];
  $field_email = $_POST['email'];
  $field_message = $_POST['message'];

  $mailer->addAddress('t.kobata@good-works.co.jp');
  
  // メールの内容
  // 送信者の設定
  $mailer->Subject = mb_encode_mimeheader($field_name);
  $mailer->setFrom($field_email);
  $mailer->Body    = $field_message;
  if($mailer->send()){
    echo "メールを送信しました";
  } else {
    echo "メールの送信に失敗しました";
  };
?>