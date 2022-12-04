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
// これを別ファイルに持ってくる