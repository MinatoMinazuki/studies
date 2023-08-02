<?php
session_start();
//送信ボタンが押されたかどうか
if (isset($_POST['submit'])){
    //POSTされたデータをエスケープ処理して変数に格納
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

    //エラーがあれば配列に格納
    $errors = [];
    if (trim($name) === "" || trim($name) === " "){
        $errors['name'] = "名前を入力してください";
    }
    if (trim($phone) === "" || trim($phone) === " "){
        $errors['phone'] = "電話番号を入力してください";
    }
    if (trim($email) === "" || trim($email) === " "){
        $errors['email'] = "Eメールアドレスを入力してください";
    }
    if (trim($content) === "" || trim($content) === " "){
        $errors['content'] = "お問い合わせ内容を入力してください";
    };

    //エラーがあればエラー表示
    if (count($errors) === 0) {
        //エスケープ処理した後の
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['content'] = $content;
        //echo "入力値に異常はありませんでした";
        //エラーがなければ画面遷移
        header('location:http://site01.localhost:8888/confirm.php');
    } else {
        echo $errors['name'];
        echo $errors['phone'];
        echo $errors['email'];
        echo $errors['content'];
    }
};

//confirm.phpから戻ってきた際に値を保持
if(isset($_GET) && isset($_GET['action']) && $_GET['action'] === 'edit'){
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    $_SESSION['content'] = $content;    
};

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
    <form method="post" action="form.php">
        <p>お名前</p>
        <input type="text" name="name" value="<?php if(isset($name)){echo $name;} ?>" placeholder="お名前" required>
        <p>電話番号</p>
        <input type="tel" name="phone" value="<?php if(isset($phone)){echo $phone;} ?>" placeholder="電話番号" required>
        <p>メールアドレス</p>
        <input type="email" name="email" maxlength="50" value="<?php if(isset($email)){echo $email;} ?>" placeholder="Eメールアドレス" required>
        <p>お問い合わせ内容</p>
        <textarea type="text" name="content" maxlength="500" placeholder="お問い合わせ内容を500字以内で入力してください" rows="7" col="33" required><?php if(isset($content)){echo $content;} ?></textarea>
        <button type="submit" name="submit" value="確認">確認</button>
    </form>
</body>
</html>