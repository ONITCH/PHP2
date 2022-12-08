<?php
session_start();
// var_dump($_POST);
// exit();   ok
include('functions_connect.php');
check_session_id();

include_once('board_read.php');
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅先情報収集ボード</title>
    <link rel="stylesheet" type="text/css" href="./board.css" />
</head>

<body>
    <!-- ヘッダー -->
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
                    <a href="./board_login.php">
                        <p>ログイン</p>
                    </a>
                    <a href="./board_logout.php">
                        <p>サインアップ</p>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div id="container-wrapper">
        <!-- 掲示板の書き込みパート -->
        <form action="board_create.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>旅先情報収集ボード</legend>
                <!-- 読み込みどこでする？ -->
                <table>
                    <tr>
                        <td>NAME:</td>
                        <td><input type="text" name="your_name"></td>
                        <!-- </tr>
                    <tr> -->
                        <td>国:</td>
                        <td>
                            <select type="text" name="country">
                                <option value="インド">インド</option>
                                <option value="タイ">タイ</option>
                                <option value="エジプト">エジプト</option>
                            </select>
                        </td>
                        <!-- </tr>
                    <tr> -->
                        <td>ジャンル:</td>
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
                    <!-- <form method="post" enctype="multipart/form-data"> -->
                    <tr class="form-group">
                        <label>画像を選択</label>
                        <input type="file" name="image">
                    </tr>
                    <!-- </form> -->
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit_data" value="投稿">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <div>いいねカウンター
        </div>
        <!-- 検索パート -->
        <div>
            <form action="board_search.php" method="POST">
                ワード検索:<input type="text" name="search_word">
                <input type="submit" name="submit" value="検索">
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


        <!-- 掲示板はここ -->
        <div>
            <table>
                <?= $output ?>

            </table>
        </div>
    </div>

    <footer>

    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>