<?php
include('functions_connect.php');
$pdo = connect_to_db();
session_start();
check_session_id();

$id = $_GET['id'];

//
$sql = 'SELECT * FROM trip_board_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// $country = "";
// foreach ($record as $country_record) {
//     $country .= "{$country_record["country"]}";
// }


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集</title>
    <link rel="stylesheet" type="text/css" href="./board.css" />
</head>

<body>
    <header>
        <div id="header-wrapper">
            <div id="logo">
                <a href="./index.php">
                    <p>ロゴ</p>
                </a>
            </div>
            <div id="header">
                <div id="header-menu">
                    <a href="./guidebook.php">
                        <p>ガイドブック</p>
                    </a>
                    <a href="./board_input.php">
                        <p>掲示板</p>
                    </a>
                    <a href="">
                        <p>ログイン</p>
                    </a>
                    <a href="">
                        <p>サインアップ</p>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div id="container-wrapper">
        <form action="board_update.php" method="POST">
            <fieldset>
                <legend>編集して</legend>
                <!-- 読み込みどこでする？ -->
                <a href="board_read.php"></a>
                <table>
                    <tr>
                        <td>NAME:</td>
                        <td><input type="text" name="your_name" value="<?= $record['your_name'] ?>"></td>
                        <!-- </tr>
                    <tr> -->
                        <td>国:</td>
                        <td>
                            <select type="text" name="country">
                                <option value="<?= $record['country'] ?>"><?= $record['country'] ?></option>
                                <option value="インド">インド</option>
                                <option value="タイ">タイ</option>
                                <option value="エジプト">エジプト</option>
                            </select>
                        </td>
                        <!-- </tr>
                    <tr> -->
                        <td>ジャンル</td>
                        <td>
                            <select type="text" name="genre">
                                <option value="<?= $record['genre'] ?>"><?= $record['genre'] ?></option>
                                <option value="#生活・人">生活・人</option>
                                <option value="#食べるべき">これは食べるべき</option>
                                <option value="#気候・服装">気候・服装</option>
                                <option value="#おすすめエリア">おすすめエリア</option>
                                <option value="#おすすめ観光地">おすすめ観光地</option>
                                <option value="#驚き体験">驚き体験</option>
                                <option value="#穴場">穴場</option>
                                <option value="#何が有名？">何が有名？</option>
                                <option value="#注意喚起">注意喚起</option>
                                <option value="#あったら便利">あったら便利</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>コメント:</td>
                        <td><textarea type="text" name="comments" value="<?= $record['comments'] ?>"><?= $record['comments'] ?></textarea></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="id" value="<?= $record['id'] ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button>submit</bottun>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>

</body>

</html>