<?php
  if(isset($_POST['text'])){
    print $_POST['text'];
    exit();
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ajax</title>
</head>
<body method="post"> 
  <p id="result">ここの本文をAjaxでテキストエリアに入力された値に入れ替えます。</p>
    <form>
        <textarea id="text" type="text" name="text" ></textarea>
        <input id="btn" type="button" name="submit" value="本文を変更" style="display:block">
    </form>
    <script src="ajax.js"></script>
</body>
</html>