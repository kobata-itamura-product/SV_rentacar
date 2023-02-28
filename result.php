<!DOCTYPE html>
<html>
<head>
<title>従業員一覧</title>
</head>
<body>
<h1>従業員一覧</h1>
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
require 'mailer.php';
// PHPMailerのインスタンス化
//$mailer = PHPMailer(true);
//$mailer->CharSet    = 'UTF-8';
//$mailer->SMTPDebug  = 0;
//$mailer->isSMTP();
//$mailer->Host       = 'vmss249.kagoya.net';
//$mailer->SMTPAuth   = true;
//$mailer->Username   = 'kir502106.t-kobata';
//$mailer->Password   = 'good8051';
//$mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//$mailer->Port       = 587;
//var_dump($mailer);
foreach ( $result_list as $row )
$mailer->addAddress($row['mail_address']);
if($mailer->send()){
  echo "メールを送信しました";
} else {
  echo "メールの送信に失敗しました";
};
  // 送信
  //$mailer->send();
?>
</body>
</html>