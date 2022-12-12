<?php
include('functions_connect.php');
$pdo = connect_to_db();

$id = $_GET['id'];

$sql = 'DELETE FROM trip_board_table WHERE id =:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:board_mypage.php");
exit();
