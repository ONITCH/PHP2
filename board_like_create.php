<?php
include('functions_connect.php');
// var_dump($_GET);
// exit();
$user_id = $_GET['user_id'];
$board_id = $_GET['board_id'];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND board_id=:board_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':board_id', $board_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}


$like_count = $stmt->fetchColumn();

// var_dump($like_count);
// exit();

if ($like_count !== 0) {
    $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND board_id=:board_id';
} else
    $sql = 'INSERT INTO like_table(id, user_id, board_id, created_at) VALUES (NULL, :user_id, :board_id, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':board_id', $board_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:board_input.php");
exit();
