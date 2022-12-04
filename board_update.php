<?php
include('functions_connect.php');


if (
    !isset($_POST['your_name']) || $_POST['your_name'] == '' ||
    !isset($_POST['country']) || $_POST['country'] == '' ||
    !isset($_POST['genre']) || $_POST['genre'] == '' ||
    !isset($_POST['comments']) || $_POST['comments'] == '' ||
    !isset($_POST['id']) || $_POST['id'] == ''
) {
    exit('paramError');
}

$your_name = $_POST['your_name'];
$country = $_POST['country'];
$genre = $_POST['genre'];
$comments = $_POST['comments'];
$id = $_POST['id'];

$pdo = connect_to_db();

$sql = 'UPDATE trip_board_table SET your_name=:your_name, country=:country, genre=:genre, comments=:comments, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':your_name', $your_name, PDO::PARAM_STR);
$stmt->bindValue(':country', $country, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':comments', $comments, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('Location:board_input.php');
exit();
