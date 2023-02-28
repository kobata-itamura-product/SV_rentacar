<?php
// ログイン処理
function login($mail_address, $password){
  $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
  $db->query('SET NAMES utf8');
  $sql = "SELECT *  FROM accounts  WHERE mail_address = :mail_address AND  password = :password";
  $stt = $db->prepare($sql);
  $stt->bindParam(':mail_address', $mail_address);
  $stt->bindParam(':password', $password);
  $stt->execute();
  while($row=$stt->fetch()){
    $result['id'] = $row['id'];
    $result['name'] = $row['name'];
    $result['mail_address'] = $row['mail_address'];
    $result['password'] = $row['password'];
  }
  if(isset($result)){
    return $result;
  }
}
// ログイン認証
function authCheck($mail_address, $password){
  $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
  $db->query('SET NAMES utf8');
  $sql = "SELECT * FROM employee_list WHERE mail_address = :mail_address AND password = :password ";
  $stt = $db->prepare($sql);
  $stt->bindParam(':mail_address', $mail_address);
  $stt->bindParam(':password', $password);
  $stt->execute();
  while($row=$stt->fetch()){
    $result['id'] = $row['id'];
    $result['name'] = $row['name'];
    $result['mail_address'] = $row['email_address'];
    $result['password'] = $row['password'];
  }
  if(isset($result)){
    return $result;
  }
}
?>