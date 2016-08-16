<?php
header("content-type: text/html; charset=utf-8");

$url = "http://www.228365365.com/sports.php";
$url1 = "http://www.228365365.com/app/member/FT_browse/body_var.php?uid=test00&rtype=r&langx=zh-cn&mtype=3&page_no=0&league_id=&hot_game=undefined";
$url2 = "http://www.228365365.com/app/member/TN_browse/body_var.php?uid=test00&rtype=r&langx=zh-cn&mtype=3&page_no=0&league_id=";

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HEADER,false);
curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__."/cookie.txt");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

$temp = curl_exec($ch);

curl_setopt($ch,CURLOPT_URL,$url2);
curl_setopt($ch,CURLOPT_HEADER,false);
curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__."/cookie.txt");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

$temp=curl_exec($ch);
curl_close($ch);

echo "<iframe>";
echo $temp;
echo "</iframe>";
