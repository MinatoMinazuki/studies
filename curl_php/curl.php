<?php

//curlセッションの初期化
$ch = curl_init();

//curlオプションの設定
curl_setopt($ch, CURLOPT_URL, "https://www.google.co.jp/");

//curlを実行する
curl_exec($ch);

//curlセッションを終了する
curl_close($ch);

?>