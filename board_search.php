<?php
// var_dump ($_POST);
// exit();
include('functions_connect.php');
//↓関数を取ってきてる
$pdo = connect_to_db();

session_start();
check_session_id();

$output = "";

if ($_POST) {
    // var_dump ($_POST['search_word']);
    // exit();
    try {
        $sql = "SELECT * FROM trip_board_table WHERE comments LIKE '%" . $search_word . "%' ORDER BY created_at DESC";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        // if($result){

        if ($result == false) {
            echo "見つかりません🤯";
        }

        foreach ($result as $row) {

            $output .= "
                    <tr>
                        <td>{$row["your_name"]}</td>
                        <td>{$row["country"]}</td>
                        <td>{$row["genre"]}</td>
                        <td>{$row["comments"]}</td>
                        <td>{$row["created_at"]}</td>
                        <td><img src='{$row["image_url"]}' width='120' height='120'></td>
                        <td>
                            <a href='board_edit.php?id={$row["id"]}'>edit</a>
                        </td>
                        <td>
                            <a href='board_delete.php?id={$row["id"]}'>delete</a>
                        </td>
                        </tr>
                    ";
        }
    } catch (PDOException $e) {
        echo  "<p>Failed : " . $e->getMessage() . "</p>";
        exit();
    }
}


// header('Location:board_input.php');
// exit();

?>
<!-- </body>
</html> -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅先情報収集ボード・サーチ画面</title>
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
                    <!-- <a href="">
                        <p>サインアップ</p>
                    </a> -->
                </div>
            </div>
        </div>
    </header>
    <div id="container-wrapper">
        <form id="form-wrapper" action="board_create.php" method="POST">
            <fieldset>
                <legend>旅先情報収集ボード</legend>
                <!-- 読み込みどこでする？ -->
                <table>
                    <tr>
                        <td>NAME:</td>
                        <td><input type="text" name="your_name"></td>
                    </tr>
                    <tr>
                        <td>国:</td>
                        <td>
                            <select type="text" name="country">
                                <option value="インド">インド</option>
                                <option value="タイ">タイ</option>
                                <option value="エジプト">エジプト</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>ジャンル</td>
                        <td>
                            <select type="text" name="genre">
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
                        <td><textarea type="text" name="comments"></textarea></td>
                    </tr>
                    <tr class="form-group">
                        <label>画像を選択</label>
                        <input type="file" name="image">
                    </tr>
                    <tr>
                        <td></td>
                        <td><button>submit</bottun>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>

        <div>いいねカウンター
        </div>
        <div>ワード検索
            <form action="board_search.php" method="POST">
                <input type="text" name="search_word">
                <input type="submit" name="submit" value="送信">
            </form>
            <form action="board_search_country.php" method="POST">
                国で絞る:
                <select type="text" name="country">
                    <option value="インド">インド</option>
                    <option value="タイ">タイ</option>
                    <option value="エジプト">エジプト</option>
                </select>
                <input type="submit" name="submit" value="国で絞る">
            </form>
        </div>


        <div>
            <table><?= $output ?></table>
        </div>
    </div>
    <footer>


    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>