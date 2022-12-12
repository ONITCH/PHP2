<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todoリストユーザ登録画面</title>
    <link rel="stylesheet" type="text/css" href="./board.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
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
                        <p></p>
                    </a>
                </div>
            </div>
        </div>
    </header>



    <div id="container-wrapper">
        <form action="board_login_register_act.php" method="POST">
            <fieldset>
                <legend>ユーザ登録画面</legend>
                <div>
                    username: <input type="text" name="username">
                </div>
                <div>
                    password: <input type="text" name="password">
                </div>
                <div>
                    <button>Register</button>
                </div>
                <a href="board_login.php">or login</a>
            </fieldset>
        </form>
    </div>

</body>

</html>