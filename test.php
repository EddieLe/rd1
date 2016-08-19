<?php
$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,"http://tt181.me/test0975313025.php");
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('token:rd1' ));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array( 'id' => 10, 'name' => 'Eddie_Lee') ));
curl_exec($ch);
