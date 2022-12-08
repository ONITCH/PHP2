<?php
//POSTデータを確認する
if (
    !isset($_POST['your_name']) || $_POST['your_name'] == '' ||
    !isset($_POST['comments']) || $_POST['comments'] == '' ||
    !isset($_POST['country']) || $_POST['country'] == '' ||
    !isset($_POST['genre']) || $_POST['genre'] == ''
) {
    exit('必要項目を入力してね');
}

// // データベース設定ファイルを含む
// $statusMsg = '';

// // ファイルのアップロード先
// $targetDir = "img/";
// $fileName = basename($_FILES["up_image"]["name"]);
// $targetFilePath = $targetDir . $fileName;
// $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// if (isset($_POST["up_image"]) && !empty($_FILES["up_image"]["name"])) {
//     // 特定のファイル形式の許可
//     $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
//     if (in_array($fileType, $allowTypes)) {
//         // サーバーにファイルをアップロード
//         if (move_uploaded_file($_FILES["up_image"]["tmp_name"], $targetFilePath)) {
//             // データベースに画像ファイル名を挿入
//             $insert = $db->query("INSERT into trip_board_table (file_name) VALUES ('" . $fileName . "')");
//             if ($insert) {
//                 $statusMsg = " " . $fileName . " が正常にアップロードされました";
//             } else {
//                 $statusMsg = "ファイルのアップロードに失敗しました、もう一度お試しください";
//             }
//         } else {
//             $statusMsg = "申し訳ありませんが、ファイルのアップロードに失敗しました";
//         }
//     } else {
//         $statusMsg = '申し訳ありませんが、アップロード可能なファイル（形式）は、JPG、JPEG、PNG、GIFのみです';
//     }
// } else {
//     $statusMsg = 'アップロードするファイルを選択してください';
// }

// // ステータスメッセージを表示
// echo $statusMsg;


//画像の処理
if (!isset($_POST["image"]) || $_POST["image"] == "") {


    if (!empty($_FILES)) {
        // $_FILES['image']['name']もとのファイルの名前
        // $_FILES['image']['tmp_name']サーバーにある一時ファイルの名前
        $filename = uniqid() . $_FILES['image']['name'];
        $uploaded_path = 'img/' . $filename;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_path);

        if ($result) {
            $MSG = 'アップロード成功！';
            $image_url = $uploaded_path;
        } else {
            $MSG = 'アップロード失敗！エラーコード：' . $_FILES['image']['error'];
        }
    } else {
        $MSG = '画像を選択してください';
    }
    echo $MSG;
}



$your_name = $_POST['your_name'];
$comments = $_POST['comments'];
$country = $_POST['country'];
$genre = $_POST['genre'];
// $image = $_POST['image'];


//DB接続・各種項目設定
$dbn = 'mysql:dbname=trip_board;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo jason_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
//[dbError:...]が表示されたらDBでエラー発生

//SQL作成＆実行
if (!empty($image_url)) {
    // 画像あるなら
    $sql = 'INSERT INTO trip_board_table(id, your_name, country, genre, comments, image_url, created_at, updated_at) VALUES (NULL, :your_name, :country, :genre, :comments, :image_url, now(), now())';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':image_url', $image_url, PDO::PARAM_STR);
} else {
    // 画像ないなら
    $sql = 'INSERT INTO trip_board_table(id, your_name, country, genre, comments, image_url, created_at, updated_at) VALUES (NULL, :your_name, :country, :genre, :comments, NULL, now(), now())';
    $stmt = $pdo->prepare($sql);
}

//バインド変数を設定  ?????
$stmt->bindValue(':your_name', $your_name, PDO::PARAM_STR);
$stmt->bindValue(':comments', $comments, PDO::PARAM_STR);
$stmt->bindValue(':country', $country, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
// $stmt->bindValue(':image', $image, PDO::PARAM_STR);

//SQL実行（失敗するとsql error）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

//SQL実行の処理

header('Location:board_input.php');
exit();
