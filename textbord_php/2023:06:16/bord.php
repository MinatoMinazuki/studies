<?php

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
*/

//SQLを実行
$regist = $pdo->prepare("SELECT * FROM post ORDER BY id DESC");
$regist->execute();

/*ここで「登録失敗」だった場合、SQL文に誤りがある
if ($regist){
    echo "DB接続OK";
} else {
    echo "DB接続NG";
}
*/

?>


<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<title>掲示板</title>
<h1>掲示板サンプル</h1>
<section>
    <h2>新規投稿</h2>
    <form action="send.php" method="post">
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