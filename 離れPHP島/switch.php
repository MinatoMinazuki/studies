<?php

$toName = $_POST['toName'];
$fromName = $_POST['fromName'];
$textType = $_POST['sel'];
$content = "";

switch ($textType){
    case 1:
        $content .=  "あの日の".$toName."へ、愛の告白です。".$fromName."より。";
        break;
    case 2:
        $content .= "親愛なる".$toName."へ、尊敬をしております。".$fromName."より。";
        break;
    case 3:
        $content .= $toName."さん、こんにちは！僕らは友達かな？".$fromName."より。";
        break;
    case 4:
        $content .= $toName."様。ようやく今日が終わりました".$fromName."より。";
        break;
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
    <div>
        <form action="/island.php" method="post">
            <input type="text" name="fromName" value="">から<input type="text" name="toName" value="">さんへ
            <br><br>
            <input type="radio" value="1" name="sel">愛の告白<br>
            <input type="radio" value="2" name="sel">尊敬してます<br>
            <input type="radio" value="3" name="sel">友情確認<br>
            <input type="radio" value="4" name="sel">喧嘩中<br>
            <br>
            <input type="submit" value="送信" name="submit">
        </form>
    </div>
    <div>
    <?php
    echo $content;
    ?>
    </div>
    </center>
</body>
</html>