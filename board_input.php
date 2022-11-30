<?php
require_once('board_read.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>旅先情報収集ボード</title>
</head>

<body>
    <form action="board_create.php" method="POST">
        <fieldset>
            <legend>旅先情報収集ボード</legend>
            <!-- 読み込みどこでする？ -->
            <div>
                name: <input type="text" name="your_name">
            </div>
            <div>
                comments:<input type="text" name="comments">
            </div>
            <div>
            <button>submit</bottun>
            </div>
            <div>
            <a href="board_read.php">ボード表示</a>
            </div>
        </fieldset>
    </form>
    <div>
        <table>
        <?= $output ?>
        </table>
    </div>

<script> </script>

</body>

</html>