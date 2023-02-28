<?php
    //データベース名、ユーザー名、パスワード
    //$dsn = 'mysql:dbname=staff_all_osaka;host=localhost;charset=utf8';
    //$user = 'r.takeda';
    //$password = '123456';

    //MySQLのデータベースに接続
    //$pdo = new PDO($dsn, $user, $password);

// テーブル全行取得（データ取得）
//$result_list = $pdo->query('SELECT * FROM employee_list');

$field_name = $_POST['name'];
$field_email = $_POST['email'];
$field_message = $_POST['message'];
$to = 't.kobata@good-works.co.jp'; //（**送信先のメールアドレスを入力）
$subject = 'Message from a site visitor '.$field_name;
$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;
$param = "-ffrom@good-works.co.jp";
$headers = 'From: '.$field_email."\r\n";
$headers .= "Content-Type: text/plain \r\n"; // HTML メールなら text/htmlで
$headers .= "Return-Path: from@good-works.co.jp \r\n";
$headers .= "Reply-To: from@good-works.co.jp\r\n";
$headers .= "Precedence: bulk \r\n"; // 大量メール送信時にはあったほうがよい
$headers .= "X-Sender: $field_email\r\n";
$headers .= "X-Priority: 3 \r\n";
//mbstringの日本語設定
mb_language( 'ja' );
mb_internal_encoding( 'UTF-8' );
$mail_status =mb_send_mail($to, $subject, $body_message, $headers, $param);

if ($mail_status) {?>
    <script language="javascript" type="text/javascript">
        window.location = 'confirmation.html';//（※送信後に移動するページ）
    </script>
<?php
}
else { ?>
    <script language="javascript" type="text/javascript">
        window.location = 'confirmation.html';//（※送信失敗後に移動するページ）
        echo 'メールの送信に失敗しました'
    </script>
<?php
}
?>