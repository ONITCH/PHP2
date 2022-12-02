<?php
//POSTデータを確認する
if (
    !isset($_POST['your_name']) || $_POST['your_name']=='' ||
    !isset($_POST['comments']) || $_POST['comments']=='' ||
    !isset($_POST['country']) || $_POST['country']=='' ||
    !isset($_POST['genre']) || $_POST['genre']==''
){
    exit('ParamError');
}

$your_name = $_POST['your_name'];
$comments = $_POST['comments'];
$country = $_POST['country'];
$genre = $_POST['genre'];

//DB接続・各種項目設定
$dbn ='mysql:dbname=trip_board;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try{
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e){
    echo jason_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
//[dbError:...]が表示されたらDBでエラー発生

//SQL作成＆実行

$sql = 'INSERT INTO trip_board_table(id, your_name, country, genre, comments, created_at, updated_at) VALUES (NULL, :your_name, :country, :genre, :comments, now(), now())';

$stmt = $pdo->prepare($sql);

//バインド変数を設定  ?????
$stmt->bindValue(':your_name', $your_name, PDO::PARAM_STR);
$stmt->bindValue(':comments', $comments, PDO::PARAM_STR);
$stmt->bindValue(':country', $country, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);

//SQL実行（失敗するとsql error）
try {
    $status = $stmt->execute();
} catch (PDOException $e){
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

//SQL実行の処理

header('Location:board_input.php');
exit();
?>

