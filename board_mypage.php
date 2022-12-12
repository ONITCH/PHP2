<?php
include('functions_connect.php');
session_start();
check_session_id();
$pdo = connect_to_db();

$username = $_SESSION['username'];
// var_dump($username);
// exit;

// if (ユーザーID)
// $user_id = $_SESSION['user_id'];
// var_dump($user_id);
// exit;
$username_san = "$username" . "さん";
// var_dump($username_san);
// exit();

$output = "";

try {
    // $sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
    $sql = "SELECT * FROM trip_board_table WHERE your_name LIKE '$username_san' ORDER BY created_at DESC";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    if ($result == 0) {
        echo "まだ投稿はありません。いったことある国の情報を掲示板から投稿しよう！";
    } else {
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
        <td>
            <a class='result_edit' href='board_edit.php?id={$record["id"]}'>edit</a>
        </td>
        <td>
            <a class='result_delete' href='board_delete.php?id={$record["id"]}'>delete</a>
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
    }
} catch (PDOException $e) {
    echo  "<p>Failed : " . $e->getMessage() . "</p>";
    exit();
}



// var_dump($output);
// exit;

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅先情報収集ボード</title>
    <link rel="stylesheet" type="text/css" href="./board.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Potta+One&display=swap" rel="stylesheet">

</head>

<body>
    <!-- ヘッダー -->
    <header>
        <div id="header-wrapper">
            <div>
                <a href="./index.php">
                    <p id="logo">TABIMEMO</p>
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
                    <a href="./board_mypage.php">
                        <p>マイページ</p>
                    </a>
                    <!-- <a href="./board_logout.php">
                        <p>サインアップ</p>
                    </a> -->
                </div>
            </div>
        </div>
    </header>
    <div id="container-wrapper">
        <h1>旅人・<?= $username ?>さん</h1>
        <div><img src='./img2/traveler.png' width='140' height='200'></div>
        <div></div>

        <a href="board_input.php">
            <p>◇みんなの掲示板へ◇</p>
        </a>
        <a href="board_logout.php">
            <p>◇ログアウト◇</p>
        </a>
        <div class="mypage-edit">自分の投稿を編集する</div>
        <!-- <div><?= $no_comments ?></div> -->
        <div>
            <?= $output ?>
        </div>

    </div>




    <footer>

    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>