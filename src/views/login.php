<?php
session_start();


// LOGIN

$msg = '';
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  if (

    $_POST['username'] == '123'
    &&
    $_POST['password'] == '123'
  ) {
    $_SESSION['logged_in'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = '123';
  } else {
    $msg = 'Wrong username or password';
  }
}










?>