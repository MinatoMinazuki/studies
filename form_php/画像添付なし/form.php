<?php

//送信ボタンが押されたかどうか
if(isset($_POST['submit'])){
    //POSTで送る内容を確認
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $body = htmlspecialchars($_POST['body'], ENT_QUOTES, 'UTF-8');
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <form method="post" action="confirm.php">
        <p>お名前</p>
        <input type="text" name="name">
        <p>電話番号</p>
        <input type="tel" name="phone">
        <p>Eメールアドレス</p>
        <input type="email" name="email">
        <p>お問い合わせ内容</p>
        <textarea name="body"></textarea>
        <input type="submit" name="submit">
    </form>
</body>
</html>