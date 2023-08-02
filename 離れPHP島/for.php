<?php

$num = $_POST['number'];
$error = "";

if( !preg_match( '/^[0-9]+$/', $num)){ $error = "半角数字を入力してください";}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>離れPHP島</title>
</head>
<body>
    <center>
    <h1>ケーキ食べる？</h1>
    <form action="island.php" method="post"">
    <div>
        <br><br><br><br><br>
        ケーキを何個食べますか？10個まで！<br>
        <input type="text" value="<?= $num ?>" name="number">個<br>
        <input type="submit" value="食べる！">
    </div>
    </form>
    <div>
        <?php
        if ($error != ""){
            echo $error;
        } else {
            if($num > 0 && $num <=10){
                echo $num."個用意しました！<br>\n";
                echo "<br>\n";
                for ($i = 0; $i < $num; $i++){
                    echo "cakeです。";
                }
            } else {
                    echo "ケーキは10個まで！";
            }
        }
        ?>
    </div>
    </center>
</body>
</html>