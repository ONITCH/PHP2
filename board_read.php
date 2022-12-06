<?php
$dbn = 'mysql:dbname=trip_board;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo jason_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

$sql = 'SELECT * FROM trip_board_table ORDER BY created_at DESC';
$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

//SQL実行

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo'<pre>';
// var_dump($result);
// echo'</pre>';
// ok

$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
        <td>{$record["your_name"]}</td>
        <td>{$record["country"]}</td>
        <td>{$record["genre"]}</td>
        <td>{$record["comments"]}</td>
        <td>{$record["created_at"]}</td>
        <td>
            <a href='board_edit.php?id={$record["id"]}'>edit</a>
        </td>
        <td>
            <a href='board_delete.php?id={$record["id"]}'>delete</a>
        </td>
    </tr>
    ";
}

?>

<!-- inputにそのままデータを送るのでこれはDBからの読み込み専用。 -->