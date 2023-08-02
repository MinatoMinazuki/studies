<?php

$error = "";

// $num1 = $_POST['num1'];
// $num2 = $_POST['num2'];
// $num3 = $_POST['num3'];
// $num4 = $_POST['num4'];
// $num5 = $_POST['num5'];
// $num6 = $_POST['num6'];
// $num7 = $_POST['num7'];
// $num8 = $_POST['num8'];
// $num9 = $_POST['num9'];
// $num10 = $_POST['num10'];

// printf("わたしの好きな食べ物は%sです。","$num1");

$name = $_POST['name'];

    if (isset($_POST['submit'])){
        for($i = 1; $i <= 10; $i++){
            $name[$i] = htmlspecialchars($name[$i], ENT_QUOTES, 'UTF-8');
        }
    }

if ($error=="" && isset($name)){
    $cnt = 0;
    $format = "私の好きな食べ物は";
    $ardata = array();
    for ($i = 1; $i <= 10; $i++){
        if($name[$i] != ""){
            $cnt++;
            if ($cnt > 1){$format .= "と";}
            $format .= "%s";
            $ardata[$cnt] = $name[$i];
        }
    }
    $format .= "です!!!";
}

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
        <h2>何が食べたい？</h2>
        <div>あなたの好きな食べ物はなんですか？</div><br>
        <div><?php vprintf($format, $ardata) ?></div><br>
        <form method="post" action="island.php">
        <!-- NO1:<input type="text" name="num1" value=""><br>
        NO2:<input type="text" name="num2" value=""><br>
        NO3:<input type="text" name="num3" value=""><br>
        NO4:<input type="text" name="num4" value=""><br>
        NO5:<input type="text" name="num5" value=""><br>
        NO6:<input type="text" name="num6" value=""><br>
        NO7:<input type="text" name="num7" value=""><br>
        NO8:<input type="text" name="num8" value=""><br>
        NO9:<input type="text" name="num9" value=""><br>
        NO10:<input type="text" name="num10" value=""><br> -->
        <?php

        for ($i = 1; $i <= 10; $i++) {
            echo "NO$i:<input type=\"text\" name=\"name[$i]\" value=\"\"ß><br>\n";
        }

        ?>
        <input type="submit" name="submit" value="これが食べたい">
        </form>
    </center>
</body>
</html>