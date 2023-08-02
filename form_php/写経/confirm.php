<?php

session_start();
if(isset($_SESSION['name'])){
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    $_SESSION['content'] = $content;
}

$token = sha1(uniqid(mt_rand(), true));
$_SESSION['token'] = $token;

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
    <h2 >お問い合わせ内容確認</h2>
    <table>
        <tr>
            <th>お名前</th>
            <td><?php echo $name; ?></td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><?php echo $phone; ?></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td><?php echo nl2br($content); ?></td>
        </tr>
    </table>
    <p>こちらの内容で送信してもよろしいですか？</p>
    <form method="post" action="send.php">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <button type="submit" value="送信">送信</button>
        <a href="form.php?action=edit">戻る</a>
    </form>
    </div>
</body>
</html>