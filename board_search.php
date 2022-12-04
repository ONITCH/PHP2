<?php
// var_dump ($_POST);
// exit();
include('functions_connect.php');
// $dsn = 'mysql:dbname=trip_board;charset=utf8mb4;port=3306;host=localhost';
// $username = 'root';
// $password = '';
//↓関数を取ってきてる
$pdo = connect_to_db();

$output = "";

if ($_POST) {
    // var_dump ($_POST['search_word']);
    // exit();
    try {
        // $dbh = new PDO($dsn, $username, $password);
        $search_word = $_POST['search_word'];
        if ($search_word == "") {
            echo "ワードを入れてね😅";
        } else {
            // exit('ok');
            $sql = "SELECT * FROM trip_board_table WHERE comments LIKE '%" . $search_word . "%'";
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
                    </tr>
                    ";
            }
        }
        // else{
        //     echo "not found";
        // }
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果</title>
</head>

<body>
    <table><?= $output ?></table>

</body>

</html>