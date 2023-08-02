<?php

$name = $_POST['name'];

$phone = $_POST['phone'];

$email = $_POST['email'];

$body = $_POST['body'];
    
//問い合わせ内容のメール構築
$to = "lion003justice@gamil.com";
$mailtitle = "{$name}様よりお問い合わせが届きました。";
$contents = <<<EOD

お名前
{$name}

電話番号
{$phone}

メールアドレス
{$email}

内容
{$body}

EOD;
$from = 'From: '.$email;

//相手に送る送信完了メール
$to2 = $email;
$mailtitle2 = "お問い合わせ内容を受け付けました" ;
$body2 = <<<EOD

        EOD;


mb_language("japanese");
mb_internal_encoding("UTF-8");

if (mb_send_mail($to2, $mailtitle2, $body2)){

    $message = '<p class="question-text">『' . $email . '』宛に確認メールを送信しました<br>お問い合わせありがとうございます。</p>';

};

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    if($message !== ""){
        echo $message;
    }
    ?>
    <a href="form.php">TOPに戻る</a>
</body>
</html>