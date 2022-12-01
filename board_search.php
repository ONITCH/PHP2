<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>検索結果</title>
</head>
<body>
    <div>検索結果</div>
    <form action="" method="POST">
        <label>Name：</label>
        <input type="text" name="search_word" />　<input type="submit" value="Search" />
    </form>
<?php
    $dsn = 'mysql:dbname=trip_board;charset=utf8mb4;port=3306;host=localhost';
    $username = 'root';
    $password = '';
    if ($_POST) {
        try {
            $dbh = new PDO($dsn, $username, $password);
            $search_word = $_POST['search_word'];
            if($search_word==""){
              echo "input search word";
            }
            else{
                $sql ="SELECT * FROM trip_board_table WHERE comments LIKE '%".$search_word."%'";
                $sth = $dbh->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll();
                if($result){
                    foreach ($result as $row) {
                        echo $row['your_name']." ";
                        echo $row['country']." ";
                        echo $row['comments']." ";
                        echo $row['created_at'];
                        echo "<br />";
                    }
                }
                else{
                    echo "not found";
                }
            }
        }catch (PDOException $e) {
            echo  "<p>Failed : " . $e->getMessage()."</p>";
            exit();
        }
    }
// header('Location:board_input.php');
// exit();

?>
</body>
</html>