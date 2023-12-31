<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<title>掲示板</title>
<h1>掲示板サンプル</h1>
<section>
    <h2>投稿完了</h2>
    <button onclick="location.href='bord.php'">戻る</button>
</section>

<?php

$id = null;
$name = $_POST['name'];
$contents = $_POST['contents'];
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
*/

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
*/

?>