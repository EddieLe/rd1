<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        api 全部賽事
        <form method = "post" action = "">
            <input type="submit" value="更新"/>
        </form>
        apisearch 賽事
        <form method = "post" action = "">
            <input type="text" name="type"value="" />
            <input type="submit" value="搜尋"/>
        </form>
    </body>
</html>
<?php
echo "全部賽事" . "<br>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://eddie-eddie-lee.c9users.io/rd1/api/Api.php");
curl_setopt($ch,CURLOPT_HEADER,false);
$temp = curl_exec($ch);
echo $temp;
echo  "<br>";

echo "搜尋賽事" . "<br>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://eddie-eddie-lee.c9users.io/rd1/api/ApiSearch.php");
curl_setopt($ch,CURLOPT_HEADER,false);
$temp = curl_exec($ch);
echo $temp;
?>