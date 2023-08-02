<?php
date_default_timezone_set('Asia/Tokyo');

$filename = "uranai.txt";

$buff = array();
$temp = "";
$error = "";
$cnt = 0;
$uranai = "";

if (file_exists($filename)){
    $fp = @fopen($filename, "r");
    if (!$fp){
        $error = "ファイルを開くのに失敗しました";
    } else {
        while (!feof($fp)){
            $temp = fgets($fp);
            if ($temp != ""){
                $buff[] = $temp;
            }
        }
        fclose($fp);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['submit1']) && $_POST['name'] != ""){
        $name = $_POST['name'];
        $name = htmlspecialchars($name, ENT_QUOTES);
        $i = count($buff);
        if ($i>0){
            $ransu = rand(0, $i-1);
            $uranai = $buff[$ransu];
        }
    }

    if (isset($_POST['submit2']) && $_POST['msg'] != ""){
        $fp = @fopen($filename, "a+");
        if (!$fp){
            $error = "エラーが発生しました。";
        } else {
            flock($fp, LOCK_EX);
            $msg = htmlspecialchars($msg, ENT_QUOTES);
            fputs($fp, $msg ."\n");
            flock($fp, LOCK_UN);
            fclose($fp);
            $error = "エラーです。";
        }
    }
}

?>

<HTML>
<HEAD>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=utf-8">
<TITLE>離れPHP島</TITLE>
</HEAD>
<BODY>
    <?php
    if($error != ""){echo $error;}
    ?>
    <br>
    <font size="2">
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
        あなたのお名前：<input type="text" name="name" value="" size="20"><br><br>
        <input type="submit" name="submit1" value="今日の運勢を占う！"><br>
        </form>
    </font>
    <br><br>
    <?php
    if($name != "" && $uranai = ""){
        echo "!!<br>\n";
        echo "<font size=\"5\" color=\"#f08080\"><B>" . $name . "" . $uranai . "</B></font><br>\n";
    }
    ?>
    <br><br><br><br>
    <font size="2">
        ん？なんですって？実はあなたも占い師さん？<br>
        じゃあ、あなたもみんなのことを占ってくれると嬉しいな♪<br>
        あ、そうそう、ここは「良いことだけの占いの館」<br>
        嬉しい、楽しい、面白い、元気が出る占いだけを教えてね。(^_^)<br>
    <form action="<?php $PHP_SELF ?>" method="post">
    占い内容：<input type="text" name="msg" value="" size="80"><br><br>
    <input type="submit" name="submit2" value="占いを追加する"><br>
</font>
</form>
</BODY>
</HTML>