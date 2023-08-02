<?php
$errors = [];
if($_POST){
    $id = null;
    $name = $_POST["name"];
    $contents = $_POST["contents"];

    //名前・投稿内容の空欄確認
    if(null == $name){
        $errors['name'] .= "名前を入力してください";
    }
    if(null == $contents){
        $errors['contents'] .= "投稿内容を入力してください";
    }

    if(!$errors){
        date_default_timezone_set('Asia/Tokyo');
        $created_at = date('Y-m-d H:i:s');
        //DB接続情報を設定
        $pdo = new PDO(
            "mysql:dbname=bord;host=localhost","root","root",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'")
        );

        /*ここで「DB接続NG」だった場合、接続情報に誤りがある
        if($pdo){
            echo "DB接続OK";
        } else {
            echo "DB接続NG";
        }
        //*/

        //SQLを実行
        $regist = $pdo->prepare("INSERT INTO post(id, name, contents, created_at) VALUES(:id,:name,:contents,:created_at)");
        $regist->bindParam(":id", $id);
        $regist->bindParam(":name", $name);
        $regist->bindParam(":contents", $contents);
        $regist->bindParam(":created_at", $created_at);
        $regist->execute();

        /*ここで「登録失敗」だった場合、SQLに誤りがある
        if($regist) {
            echo "登録成功";
        } else {
            echo "登録失敗";
        }
        //*/
    }
}

//DB接続情報を設定
$pdo = new PDO(
    "mysql:dbname=bord;host=localhost","root","root",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utf8'")
);

/*ここで「DB接続NG」だった場合、接続情報に誤りがある
if ($pdo){
    echo "DB接続OK";
} else {
    echo "DB接続NG";
}
//*/

//SQLを実行
$regist = $pdo->prepare("SELECT * FROM post ORDER BY created_at DESC limit 20");
$regist->execute();

/*ここで「登録失敗」だった場合、SQL文に誤りがある
if ($regist){
    echo "DB接続OK";
} else {
    echo "DB接続NG";
}
//*/

?>


<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<title>掲示板</title>
<h1>掲示板サンプル</h1>
<section>
    <h2>新規投稿</h2>
    <div id="error">
        <?php foreach($errors as $error); ?>
        <?php {echo $error.'<br>';}?>
    </div>
    <form action="bord.php" method="post">
        名前 : <input type="text" name="name" value=""><br>
        投稿内容: <textarea name="contents" id="" cols="" rows=""></textarea><br>
        <button type="submit">投稿</button>
    </form>
</section>


<section>
    <h2>投稿内容一覧</h2>
        <?php foreach($regist as $loop):?>
            <div>No:<?php echo $loop['id'] ?></div>
            <div>名前:<?php echo $loop['name'] ?></div>
            <div>投稿内容:<?php echo $loop['contents'] ?></div>
            <div>投稿時間:<?php echo $loop['created_at']?></div>
            <div>------------------------------------------</div>
        <?php endforeach; ?>
</section>