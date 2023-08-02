<?php

$error = "";
$spacecount = 0;

$moji = $_POST['moji'];
$kugiri = $_POST['kugiri'];

if(isset($_POST['submit'])){
    $moji = trim($moji);
    $moji = htmlspecialchars($moji, ENT_QUOTES);
    $kugiri = trim($kugiri);
    $kugiri = htmlspecialchars($kugiri, ENT_QUOTES);
    if(strlen(trim($moji)) == 0){$error = "言葉が未入力です";}
    if(strlen(trim($kugiri)) == 0){$error = "区切りが未入力です";}
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
        <h2>好きな文字でわける！！</h2>
        <form method="post" action="island.php">
            元の言葉：<input type="text" name="moji" value="<?= $moji ?>" size="60"><br>
            この文字でわける：<input type="text" name="kugiri" value="<?= $kugiri ?>" size="20"><br>
            <input type="submit" name="submit" value="分解！">
        </form>

        <br><br><br><br>
        <table border="1">
            <tr>
            <td align="left">
                <?php

                if($error=="" && $kugiri != "" && $moji != ""){
                    $ardata=explode($kugiri, $moji);
                    $cnt = 0;
                    foreach($ardata as $value){
                        $cnt++;
                        echo $cnt ."コ目：$value<br>";
                    }
                } else {
                    echo "ここに結果が入ります";
                }

                ?>
            </td>
            </tr>
        </table>
    </center>
</body>
</html>