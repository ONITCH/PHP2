<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
</head>

<body>
    <form action="board_login_act.php" method="POST">
        <fieldset>
            <legend>ログイン画面</legend>
            <div>
                username: <input type="text" name="username">
            </div>
            <div>
                password: <input type="text" name="password">
            </div>
            <div>
                <button>Login</button>
            </div>
            <a href="board_login_register.php">or register</a>
        </fieldset>

    </form>
</body>

</html>