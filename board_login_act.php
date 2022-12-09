<?php
session_start();
include('functions_connect.php');

// var_dump($_POST);
// exit;

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE username=:username AND password=:password AND is_deleted=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue('password', $password, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// ユーザーの有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
    echo "<p>ログイン情報に誤りがあります</p>";
    echo "<a href=board_login.php>ログイン</a>";
    exit();
} else {
    // 成功したとき 🌟ここで色々設定できそう？ 名前をページに表示させたり？
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['is_admin'] = $val['is_admin'];
    $_SESSION['username'] = $val['username'];
    header("Location:board_input.php");
    exit();
}
