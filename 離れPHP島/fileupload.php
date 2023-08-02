<?php

$error = "";

if(isset($_POST['submit'])){
    $img1 = $_FILES['img1'];
    $img1tmp = $_FILES['img1']['tmp_name'];
    $img1name = $_FILES['img1']['name'];
    $img1size = $_FILES['img1']['size'];
    $img1type = $_FILES['img1']['type'];

    $kaku = "";
    if(is_uploaded_file($img1tmp)){
        if($img1type == "image/gif"){$kaku = ".gif";}
        if($img1type == "image_png" || $img1type == "image/x-png"){$kaku = ".png";}
        if($img1type == "image/jpg" || $img1type == "image/pjpeg"){$kaku = ".jpg";}
        if($kaku == ""){$error = "アップロード画像に誤りがあります";}
        if($kaku != ""){
            $boRtn = move_uploaded_file($img1tmp, "php20230722/" .date("YmdHis").$kaku);
            if($boRtn){
                $error = "アップロードに成功しました";
            } else {
                $error = "アップロードに失敗しました";
            }
        } else {
            $error = "ファイルの種類に誤りがあります";
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
        <h2>画像アップロード</h2>
        <div>*jpg,gif,pngのみ有効。ファイルサイズは50kbまで*</div>
        <?php
        if($error != ""){echo $error;}
        ?>
        <br><br>
        <form method="post" action="island.php" enctype="multipart/form-data">
            <input type="hidden" name="max_file_size" value="50000">
            <input type="file" name="img1" size="40"><br><br>
            <input type="submit" name="submit" value="アップロードする！">
        </form>
        <?php
        $cnt = 0;
        $filename = array();
        if($dir = @opendir("php20230722")){
            while($file = readdir($dir)){
                if(!is_dir($file)){
                    $cnt++;
                    $filename[$cnt] = $file;
                }
            }
            closedir($dir);
        }

        sort($filename);
        ?>
        <table border="0" width="600">
            <?php
            $cnt = 0;
            foreach($filename as $value){
                $cnt++;
                if($value != ".." && $value != "."){
                    if($cnt == 1){echo "<tr>";}
                    echo "<td valign\"center\" align=\"center\">\n";
                    echo "<img border=\"0\" src=\"php20230722/$value\">\n";
                    echo "</td>\n";
                    if($cnt == 2){
                        echo "</tr>\n";
                        $cnt = 0;
                    }
                }
            }
            if($cnt == 1){
                echo "<td>$nbsp;</td>\n";
                echo "</tr>\n";
            }
            ?>
        </table>
    </center>
</body>
</html>