<?php
session_start();
// セッションにアカウント情報がある場合
if(isset($_SESSION['employee_list'])){
  // 認証処理
  $account = authCheck($_SESSION['employee_list']['mail_address'], $_SESSION['employee_list']['password']);
  if(isset($account)){
    // ログインフラグをtrueにする
    $login = true;
    // セッションにユーザー情報を格納
    $_SESSION['employee_list'] = $account;
  } else {
    // ログインフラグをfalseにする
    $login = false;
    // セッションを破棄
    unset($_SESSION['employee_list']);
  }
// セッションにアカウント情報がない場合
} else {
  // ログインフラグをfalseにする
  $login = false;
}
?>