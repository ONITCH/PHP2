<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}
// $alert = "<script type='text/javascript'>alert('ログアウトしますか？');</script>";
// echo $alert;
session_destroy();
header('Location:index.php');
exit();

// ログアウトするときは毎回これ
