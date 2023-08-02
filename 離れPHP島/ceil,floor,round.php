<?php

$error = "";

if(isset($_POST['submit'])){
    $sel = $_POST['sel'];
    $tani = $_POST['tani'];
    $moto = $_POST['moto'];
    $wari = $_POST['wari'];
    $kotae = "";
    $kotae2 = "";
    if(!preg_match("/^[0-9.]*$/", $moto)){$error = "割り算の数字に誤りがあります";}
    if(!preg_match("/^[0-9.]*$/", $wari)){$error = "割り算の数字に誤りがあります";}
    if(!is_numeric($moto)){$error = "数字を入力してください";}
    if(!is_numeric($wari)){$error = "数字を入力してください";}

    if($error == ""){
        $kotae2 = $moto/$wari;
        switch ($sel) {
            case '0':
                $kotae = ceil($moto/$wari*$tani)/$tani;
                break;

            case '1':
                $kotae = floor($moto/$wari*$tani)/$tani;
                break;

            case '2':
                $kotae = round($moto/$wari*$tani)/$tani;
                break;
        }
    }
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
        <h2>割り算をしよー</h2>
        <?php
        if($error != ""){echo $error;}
        ?>
        <form method="post" action="<?php echo $_SERVER['script_name']; ?>">
            <input type="radio" name="sel" value="0" <?php if($sel == "0"){echo "checked";} ?>>切り上げ
            <input type="radio" name="sel" value="1" <?php if($sel == "1"){echo "checked";} ?>>切り捨て
            <input type="radio" name="sel" value="2" <?php if($sel == "2"){echo "checked";} ?>>四捨五入
            で
            <select name="tani">
                <option value="1" <?php if($tani=1){echo "selected";} ?>>整数値にする</option>
                <option value="10" <?php if($tani=10){echo "selected";} ?>>少数点以下第一位にする</option>
                <option value="100" <?php if($tani=100){echo "selected";} ?>>少数点以下第二位にする</option>
                <option value="1000" <?php if($tani=1000){echo "selected";} ?>>少数点以下第三位にする</option>
                <option value="10000" <?php if($tani=10000){echo "selected";} ?>>少数点以下第四位にする</option>
            </select>
            <br><br>
            <input type="text" name="moto" value="<?php echo $moto; ?>">/
            <input type="text" name="wari" value="<?php echo $wari; ?>">
            <input type="submit" name="submit" value="=">
            <input type="text" name="kotae" value="<?php echo $kotae; ?>">
            &nbsp;丸め処理ナシ:<input type="text" name="kotae2" value="<?php echo $kotae2; ?>">
        </form>
        <br><br>
        <span>* ＝　のボタンを押すと割り算します！</span>
    </center>
</body>
</html>