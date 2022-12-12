<?php
$dbn = 'mysql:dbname=trip_board;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

$sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
// $sql = 'SELECT * FROM trip_board_table ORDER BY created_at DESC';
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

// ログインact.PHPからのこれ。
$user_id = $_SESSION['user_id'];

$output = "";
foreach ($result as $record) {
    $output .= "
    <div class='result_all'>
    <table>
    <tr>
        <td class='result_your_name'>{$record["your_name"]}</td>
        <td class='result_country'>国：{$record["country"]}</td>
        <td class='result_genre'>{$record["genre"]}</td>
        <td class='result_created_at'>{$record["created_at"]}</td>
        <td colspan = '2'>　　　　　　　　 </td>
        <td colspan = '3'></td>
        <td class='result_like'>
        <a href='board_like_create.php?user_id={$user_id}&board_id={$record["id"]}'>❤️{$record["like_count"]}</a>
    </td>
    </tr>
    <tr>
        <td><img class='result_image' src='{$record["image_url"]}' width='140' height='130'></td>
        <td  colspan = '5' class='result_comments'>{$record["comments"]}</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    </table>
    </div>

    ";
}
// 
?>


<!-- inputにそのままデータを送るのでこれはDBからの読み込み専用。 -->
<!-- 
<td>
    <a href='board_edit.php?id={$record["id"]}'>edit</a>
</td>
<td>
    <a href='board_delete.php?id={$record["id"]}'>delete</a>
</td> -->