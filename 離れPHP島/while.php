<?php

$error = "";

$num = $_POST['number'];
$from = $_POST['from'];
$to = $_POST['to'];

if( !preg_match("/^[0-9]+$/", $num) || !preg_match("/^[0-9]+$/", $from) || !preg_match("/^[0-9]+$/", $to)){
    $error = "半角数字を入力してネ";
}

if( $num > 100){$error = "100以下の数字を入れて";}
if( $from > 100){$error = "100以下の数字を入れて";}
if( $to > 100){$error = "100以下の数字を入れて";}

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
        <h2>計算教えて</h2>
        <form method="post" action="island.php">
        <div>数字の
            <input type="text" name="number" value="<?= $num ?>">に<br>
        </div>
        <div>
            <input type="text" name="from" value="<?= $from ?>">から
            <input type="text" name="to" value="<?= $to ?>">
            <input type="submit" name="submit" value="の値を足し算する">
            <br><br><br><br><br>
        </div>
        <div>
            <?php
            if( $error != ""){
                echo $error;
            } else {
                $i = $from;
                while ($i <= $to){
                    echo $num."+$i=";
                    echo $num+$i. "<br>\n";
                    $i++;
                }
            }
            ?>
        </div>
    </center>
</body>
</html>