<?php
session_start();
if (isset($_SESSION) === $_POST['token']){
    if(isset($_SESSION[$name])){
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = str_replace(array("\r","\n"),'',$_SESSION['email']);
        $_SESSION['content'] = $content;    
    }
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
    {$content}

    EOD;
    $from = 'From: '.$email;

    ///////相手に送る送信完了メール//////

    ////////////////////////////////

    mb_language("japanese");
    mb_internal_encoding("UTF-8");

    $param = "-f" . $to;
    if (mb_send_mail($to2, $mailtitle2, $contents2, $from2, $param)){

        $message = '<p class="question-text">『' . $email . '』宛に確認メールを送信しました<br>お問い合わせありがとうございます。</p>';

        if (mb_send_mail($to, $mailtitle, $contents, $from, $param)){

            //終了開始
            $_SESSION = [];
            if (isset($_COOKIE[session_name()])){
                $param = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            };
            session_destroy();
        } else {
            $message = '<p class="question-text error">『'. $email . '』宛にメールを送信できませんでした。<br>正しいメールアドレスで再度ご連絡ください。</p>';
        }
    }
} else {
    header('Location:http//site01.localhost:8888/form.php');
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