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

// PHPMailerのインスタンス化
$mailer = new PHPMailer(true);

try {
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

  // 送信者の設定
  $mailer->setFrom('r.takeda@good-works.co.jp', mb_encode_mimeheader('武田龍司'));

  
  //var_dump($row);
    //if($mailer->send()){
      //echo "メールを送信しました";
    //} else {
      //echo "メールの送信に失敗しました";
    //};
  // 送信
  //$mailer->send();

  } catch (Exception $e) {
  file_put_contents('MAIL_ERROR_' . time() . '.txt', $mailer->ErrorInfo);
  }
  ?>
  <input type="button" onClick="checkAllBox(true)" value="全選択">
  <input type="button" onClick="checkAllBox(false)" value="全解除">
  <form action="result.php" method="post">
  <div id="boxes">
  <?php foreach ( $result_list as $row ):?>
    <input type="checkbox" name="mail">
    <?="ID: {$row['id']} <br>"?>
    <?="名前: {$row['name']} <br>"?>
    <?="所属: {$row['affiliation']} <br>"?>
    <?="メールアドレス: {$row['mail_address']} <br>"?>
  <?php endforeach;?>
  <?php
  //session_start();
  //isset($_SESSION[$mailer]);
  //if (!isset($_SESSION[$row['mail_address']])) {
    //$_SESSION[$row['mail_address']] = 0;
  //} else {
    //$_SESSION[$row['mail_address']]++;
  //}
  // 宛先の設定
    $mails=$_POST[$row['mail_address']];
    $mailer->addAddress($row['mail_address']);
    //var_dump($mailer);
    // メールの内容
    $mailer->Subject = mb_encode_mimeheader("件名：安否確認のお願い");
    $mailer->Body    = "本文
    お疲れ様です。
    大阪支社、武田です。
    皆さまの安否確認について以下URLよりログイン頂き、「安否確認」を
    お願い出来ますでしょうか。
    URL：
    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    ";
  ?>
  <input type="submit" value="送信" onclick="location.href='result.php'">
  </div>
  </form>
</body>
</html>
<script>
const checkbox3 = document.getElementsByName("mail")

function checkAllBox(trueOrFalse) {
  for(i = 0; i < checkbox3.length; i++) {
    checkbox3[i].checked = trueOrFalse
  }
}
const checkboxes = document.querySelectorAll('input[type="checkbox"]');

const mailAddresses = Array.from(checkboxes).map(check);
</script>

<script>
    function sendMail() {
        var checkbox = document.getElementsByName('checkbox');
        var to = [];
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                to.push(checkbox[i].value);
            }
        }
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'mailer.php', true);
        xhr.setRequestHeader('Content-Type', 'application/');
</script>