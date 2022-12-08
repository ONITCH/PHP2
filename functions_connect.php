<?php
function connect_to_db()
{
    $dbn = 'mysql:dbname=trip_board;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('db error:' . $e->getMessage());
    }
}


// include('functions_connect.php');
// $pdo = connect_to_db();
// session idを持っていなければログイン画面に遷移。IDの有無と最新かどうかを見て、アクセス権限を与える

function check_session_id()
{
    if (!isset($_SESSION["session_id"]) || $_SESSION["session_id"] != session_id()) {
        header('Location:todo_login.php');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION["session_id"] = session_id();
    }
}

// ログインが必要なページに下記を置く
// session_start();
// check_session_id();
// プラス include('functions_connect.php');
