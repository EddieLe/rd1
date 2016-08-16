<?php
header("content-type: text/html; charset=utf-8");
require_once 'MysqlAction.php';

$url = "http://www.228365365.com/sports.php";
$url1 = "http://www.228365365.com/app/member/FT_browse/body_var.php?uid=test00&rtype=r&langx=zh-cn&mtype=3&page_no=0&league_id=&hot_game=undefined";
$url2 = "http://www.228365365.com/app/member/FT_future/body_var.php?uid=test00&rtype=r&langx=zh-cn&mtype=3&page_no=0&league_id=&hot_game=";

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
$temp = explode("parent.GameFT", $temp);

for ($i = 1; $i < count($temp); $i++) {
    $result[$i] = explode(",", $temp[$i]);
    var_dump($result[$i]);
}

echo "</iframe>";
echo "<br></br>";

$mysqlAction = new MysqlAction();

for ($i = 1; $i < count($temp); $i++) {
    for ($j = 1; $j <= 3; $j++) {
        if ($j % 3 == 1) {
            $time = strip_tags($result[$i][1]);
            $game = $result[$i][2];
            $gameDetail = $result[$i][5];
            $allWin = $result[$i][9];
            $allHandicap = $result[$i][14];
            $allBigSmall = $result[$i][15];
            $oddEven = $result[$i][18] . $result[$i][20];
            $halfWin = $result[$i][25];
            $halfHandicap = $result[$i][30];
            $halfBigSmall = $result[$i][31];

            $mysqlAction->mysqlInsert(
                    $time,
                    $game,
                    $gameDetail,
                    $allWin,
                    $allHandicap,
                    $allBigSmall,
                    $oddEven,
                    $halfWin,
                    $halfHandicap,
                    $halfBigSmall
                    );
        } elseif ($j % 3 == 2) {
            $time = strip_tags($result[$i][1]);
            $game = $result[$i][2];
            $gameDetail = $result[$i][6];
            $allWin = $result[$i][10];
            $allHandicap = $result[$i][13];
            $allBigSmall = $result[$i][16];
            $oddEven = $result[$i][19] . $result[$i][21];
            $halfWin = $result[$i][26];
            $halfHandicap = $result[$i][29];
            $halfBigSmall = $result[$i][32];

            $mysqlAction->mysqlInsert(
                    $time,
                    $game,
                    $gameDetail,
                    $allWin,
                    $allHandicap,
                    $allBigSmall,
                    $oddEven,
                    $halfWin,
                    $halfHandicap,
                    $halfBigSmall
                    );
        } else {
            $time = strip_tags($result[$i][1]);
            $game = $result[$i][2];
            $gameDetail = "和";
            $allWin = "";
            $allHandicap = "";
            $allBigSmall = $result[$i][17];
            $oddEven = "";
            $halfWin = "";
            $halfHandicap = "";
            $halfBigSmall = $result[$i][33];

            $mysqlAction->mysqlInsert(
                    $time,
                    $game,
                    $gameDetail,
                    $allWin,
                    $allHandicap,
                    $allBigSmall,
                    $oddEven,
                    $halfWin,
                    $halfHandicap,
                    $halfBigSmall
                    );
        }
    }

}