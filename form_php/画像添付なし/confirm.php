<?php

$name = $_POST['name'];

$phone = $_POST['phone'];

$email = $_POST['email'];

$body = $_POST['body'];

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
            <td><?php echo nl2br($body); ?></td>
        </tr>
    </table>
    <p>こちらの内容で送信してもよろしいですか？</p>
    <form method="post" action="send.php">
        <button type="submit" value="送信">送信</button>
        <input type="hidden" name="name" value="<?php echo $name ?>">
        <input type="hidden" name="phone" value="<?php echo $phone ?>">
        <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="hidden" name="body" value="<?php echo $body ?>">
        <a href="form.php?action=edit">戻る</a>
    </form>
    </div>
</body>
</html>