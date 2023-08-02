<?php

$error = "";
$spacecount = 0;

$moji = $_POST['moji'];

if(isset($_POST['submit'])){
    $moji = trim($moji);
    $moji = htmlspecialchars($moji, ENT_QUOTES, 'UTF-8');
    for($i = 100; $i >= 1; $i--){
        $sp = str_repeat(" ", $i);
        $moji = str_replace($sp, " ", $moji);
        $sp = str_repeat("　", $i);
        $moji = str_replace($sp, " ", $moji);
    }

    $spacecount = substr_count($moji, " ");
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
        <h2>スペースでわける！！</h2>
        <div>スペースを入れた文字列を作ってみてね</div><br>
        <form method="post" action="island.php">
            <input type="text" name="moji" value="<?= $moji ?>" size="60"><br>
            <input type="submit" name="submit" value="分解！">
        </form>

        <br><br><br><br>
        <table border="1">
            <tr>
            <td align="left">
                <?php

                $format = "";
                for($i = 1; $i <= $spacecount+1; $i++){
                    $format .= "%s";
                    if($i < $spacecount){$format .= " ";}
                }
                $ardata = sscanf($moji, $format);

                foreach($ardata as $key => $value){
                    printf("%sコ目:%s<br>\n", $key+1, $value);
                }

                ?>
            </td>
            </tr>
        </table>
    </center>
</body>
</html>