<?php
header("content-type: text/html; charset=utf-8");
require_once 'MysqlAction.php';

//背景執行
ignore_user_abort(true);

while (true) {
    $url = "http://www.228365365.com/sports.php";
    $url1 = "http://www.228365365.com/app/member/FT_browse/body_var.php?uid=test00&rtype=r&langx=zh-cn&mtype=3&page_no=0&league_id=&hot_game=undefined";
    $url2 = "http://www.228365365.com/app/member/FT_future/body_var.php?uid=test00&rtype=r&langx=zh-cn&mtype=3&page_no=0&league_id=&hot_game=";
    //讀取cookie寫入檔案
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_HEADER,false);
    curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__."/cookie.txt");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    $temp = curl_exec($ch);
    //使用檔案cookie進去iframe.php
    curl_setopt($ch,CURLOPT_URL,$url2);
    curl_setopt($ch,CURLOPT_HEADER,false);
    curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__."/cookie.txt");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

    $temp = curl_exec($ch);
    curl_close($ch);

    //移除倒回首頁判斷式
    substr("$temp", 100);
    $temp = explode("parent.GameFT", $temp);

    //比賽撈出資料
    for ($i = 1; $i < count($temp); $i++) {
        $result[$i] = explode(",", $temp[$i]);
    }
    //使用PDO寫入資料庫
    $mysqlAction = new MysqlAction();
    $mysqlAction->mysqlDelete();

    for ($i = 1; $i < count($temp); $i++) {
        for ($j = 1; $j <= 3; $j++) {
            if ($j % 3 == 1) {
                $time = strip_tags($result[$i][1]);
                $game = $result[$i][2];
                $gameDetail = $result[$i][5];
                $allHandicap = $result[$i][9];
                $allBigSmall = $result[$i][14];
                $allWin = $result[$i][15];
                $oddEven = $result[$i][18] . $result[$i][20];
                $halfHandicap = $result[$i][25];
                $halfBigSmall = $result[$i][30];
                $halfWin = $result[$i][31];

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
                $allHandicap = $result[$i][10];
                $allBigSmall = $result[$i][13];
                $allWin = $result[$i][16];
                $oddEven = $result[$i][19] . $result[$i][21];
                $halfHandicap = $result[$i][26];
                $halfBigSmall = $result[$i][29];
                $halfWin = $result[$i][32];

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
                $allHandicap = "";
                $allBigSmall = "";
                $allWin = $result[$i][17];
                $oddEven = "";
                $halfHandicap = "";
                $halfBigSmall = "";
                $halfWin = $result[$i][33];

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
sleep(60);
}

