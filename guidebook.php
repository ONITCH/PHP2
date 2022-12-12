<?php
include('functions_connect.php');
// session_start();
// check_session_id();
$pdo = connect_to_db();

// $username = $_SESSION['username'];
// var_dump($username);
// exit;

$output1 = "";
try {
    // $sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
    $sql = "SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY like_count DESC LIMIT 0, 1;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    foreach ($result as $row) {
        $output1 .= "
                <table class='tdcontents'>
                    <tr>
                        <td><img src='./img2/crown1.png' width='50' height='40'> </td>
                        <td class='tdgenre'>{$row["genre"]}</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <td colspan='3'><img class='tdimg' src='{$row["image_url"]}' width='240' height='200'></td>
                    </tr>
                        <td class='tdcomment' colspan='3'>{$row["comments"]}</td>
                    <tr>
                    <td colspan='2' class='tddata'>{$row["created_at"]}</td>
                    <td class='tddata'>{$row["your_name"]}</td>
                    </tr>
                    <tr>
                </table>
                    ";
    }
} catch (PDOException $e) {
    echo  "<p>Failed : " . $e->getMessage() . "</p>";
    exit();
}

$output2 = "";
try {
    // $sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
    $sql = "SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY like_count DESC LIMIT 1, 1;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    foreach ($result as $row) {
        $output2 .= "
                <table class='tdcontents'>
                    <tr>
                        <td><img src='./img2/crown2.png' width='50' height='40'> </td>
                        <td class='tdgenre'>{$row["genre"]}</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <td colspan='3'><img class='tdimg' src='{$row["image_url"]}' width='240' height='200'></td>
                    </tr>
                        <td class='tdcomment' colspan='3'>{$row["comments"]}</td>
                    <tr>
                    <td colspan='2' class='tddata'>{$row["created_at"]}</td>
                    <td class='tddata'>{$row["your_name"]}</td>
                    </tr>
                    <tr>
                </table>
                    ";
    }
} catch (PDOException $e) {
    echo  "<p>Failed : " . $e->getMessage() . "</p>";
    exit();
}

$output3 = "";
try {
    // $sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
    $sql = "SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY like_count DESC LIMIT 2, 1;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    foreach ($result as $row) {
        $output3 .= "
                <table class='tdcontents'>
                    <tr>
                        <td><img src='./img2/crown3.png' width='50' height='40'> </td>
                        <td class='tdgenre'>{$row["genre"]}</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <td colspan='3'><img class='tdimg' src='{$row["image_url"]}' width='240' height='200'></td>
                    </tr>
                        <td class='tdcomment' colspan='3'>{$row["comments"]}</td>
                    <tr>
                    <td colspan='2' class='tddata'>{$row["created_at"]}</td>
                    <td class='tddata'>{$row["your_name"]}</td>
                    </tr>
                    <tr>
                </table>
                    ";
    }
} catch (PDOException $e) {
    echo  "<p>Failed : " . $e->getMessage() . "</p>";
    exit();
}
$output4 = "";
try {
    // $sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
    $sql = "SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY like_count DESC LIMIT 3, 1;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    foreach ($result as $row) {
        $output4 .= "
                <table class='tdcontents'>
                    <tr>
                        <td class='tdp'>④</td>
                        <td class='tdgenre'>{$row["genre"]}</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <td colspan='3'><img class='tdimg' src='{$row["image_url"]}' width='240' height='200'></td>
                    </tr>
                        <td class='tdcomment' colspan='3'>{$row["comments"]}</td>
                    <tr>
                    <td colspan='2' class='tddata'>{$row["created_at"]}</td>
                    <td class='tddata'>{$row["your_name"]}</td>
                    </tr>
                    <tr>
                </table>
                    ";
    }
} catch (PDOException $e) {
    echo  "<p>Failed : " . $e->getMessage() . "</p>";
    exit();
}

$output5 = "";
try {
    // $sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
    $sql = "SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY like_count DESC LIMIT 4, 1;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    foreach ($result as $row) {
        $output5 .= "
                <table class='tdcontents'>
                    <tr>
                        <td class='tdp'>⑤</td>
                        <td class='tdgenre'>{$row["genre"]}</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <td colspan='3'><img class='tdimg' src='{$row["image_url"]}' width='240' height='200'></td>
                    </tr>
                        <td class='tdcomment' colspan='3'>{$row["comments"]}</td>
                    <tr>
                    <td colspan='2' class='tddata'>{$row["created_at"]}</td>
                    <td class='tddata'>{$row["your_name"]}</td>
                    </tr>
                    <tr>
                </table>
                    ";
    }
} catch (PDOException $e) {
    echo  "<p>Failed : " . $e->getMessage() . "</p>";
    exit();
}

$output6 = "";
try {
    // $sql = 'SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY created_at DESC';
    $sql = "SELECT * FROM trip_board_table LEFT OUTER JOIN ( SELECT board_id, COUNT(id) AS like_count FROM like_table GROUP BY board_id ) AS result_table ON trip_board_table.id = result_table.board_id ORDER BY like_count DESC LIMIT 5, 1;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    foreach ($result as $row) {
        $output6 .= "
                <table class='tdcontents'>
                    <tr>
                        <td><img src='./img2/crown3.png' width='50' height='40'> </td>
                        <td class='tdgenre'>{$row["genre"]}</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <td colspan='3'><img class='tdimg' src='{$row["image_url"]}' width='240' height='200'></td>
                    </tr>
                        <td class='tdcomment' colspan='3'>{$row["comments"]}</td>
                    <tr>
                    <td colspan='2' class='tddata'>{$row["created_at"]}</td>
                    <td class='tddata'>{$row["your_name"]}</td>
                    </tr>
                    <tr>
                </table>
                    ";
    }
} catch (PDOException $e) {
    echo  "<p>Failed : " . $e->getMessage() . "</p>";
    exit();
}


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅先情報収集ボード</title>
    <link rel="stylesheet" type="text/css" href="./guidebook.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Potta+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div id="header-wrapper">
            <div id="logo">
                <a href="./index.php">
                    <p>TABIMEMO</p>
                </a>
            </div>
            <div id="header">
                <div id="header-menu">
                    <a href="">
                        <p>ガイドブック</p>
                    </a>
                    <a href="./board_input.php">
                        <p>掲示板</p>
                    </a>
                    <a href="./board_mypage.php">
                        <p>ログイン</p>
                    </a>
                    <a href="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div id="container-wrapper">
        <!-- <div id="container">ガイドブック</div> -->
        <div id="top-wrapper">
            <div id="top-container">
                <div id="top-right">
                    <div id="top-pic">
                        <img id="picture" src="./img2/india1.jpg">
                    </div>
                    <p id="country-name">とりあえず、インド</p>
                    <div id="about">
                        <p>フレンドリーかと思いきや</p>
                        <p>平気な顔してウソをつく</p>
                        <p>注意が必要、だけど憎めない国</p>
                    </div>
                </div>
            </div>
            <div id="bottom-container">
            </div>
        </div>

        <div id="best3-wrapper">
            <div id="top3">
                <div id="one"><?= $output1 ?></div>
                <div id="two"><?= $output2 ?></div>
                <div id="three"><?= $output3 ?></div>
            </div>
        </div>
        <div id="best6-wrapper">
            <div id="top3">
                <div id="ele">
                    <img src="./img2/india_ele.png" alt="">
                </div>
                <div id="one"><?= $output4 ?></div>
                <div id="two"><?= $output5 ?></div>

            </div>
        </div>

    </div>
    <footer>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>