<?php

// var_dump($_POST);
// exit();

require_once('board_read.php');

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
    <form action="board_create.php" method="POST">
        <fieldset>
            <legend>旅先情報収集ボード</legend>
            <!-- 読み込みどこでする？ -->
            <div>
                NAME:    <input type="text" name="your_name">
            </div>
            <div>
                国:      <select type="text" name="country">
                            <option value="india">インド</option>
                            <option value="thailand">タイ</option>
                            <option value="　">　</option>
                        </select>
            </div>
            <div>
                ジャンル: <select type="text" name="genre">
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
            </div>
            <div>
                コメント:<textarea type="text" name="comments"></textarea>
            </div>
            <div>
            <button>submit</bottun>
            </div>
            <div>
            <!-- <a href="board_read.php">ボード表示</a> -->
            </div>
        </fieldset>
    </form>
    <div>ワード検索
        <form action="board_search.php" method="POST">
            <input type="text" name="search_word">
            <input type="submit" name="submit" value="送信">
        </form>
    </div>


    <div>
        <table>
        <?= $output ?>

        </table>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>