<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        apisearch 賽事
        <form method = "post" action = "">
            <input type="text" name="type"value="" />
            <input type="submit" value="搜尋"/>
        </form>
    </body>
</html>
<?php
echo "搜尋賽事(預設全部)" . "<br>";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://eddie-eddie-lee.c9users.io/rd1/api/ApiSearch.php");
curl_setopt($ch,CURLOPT_HEADER,false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array( 'type' => $_POST['type']) ));
curl_exec($ch);
?>
