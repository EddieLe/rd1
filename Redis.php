<?php
require_once 'MyPDO.php';

function redisCache()
{
// while (true) {
    $sql = "SELECT * FROM `game` limit 180";
    $mypdo = new MyPDO();
    $pdo = $mypdo->pdoConnect;

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);

    $redis = new redis();
    $result = $redis->connect('127.0.0.1',6379) or die ("could net connect redis server");

    for ($i = 0; $i < count($row); $i++) {
        $redis->LPUSH('user_id', $row['id']);//(integer) 1
        $redis->SET('user_game_' . $row[$i][id], $row[$i]['game']);
        $redis->SET('user_time_' . $row[$i][id], $row[$i]['time']);
        $redis->SET('user_gameDetail_' . $row[$i][id], $row[$i]['gameDetail']);
        $redis->SET('user_allWin_' . $row[$i][id], $row[$i]['allWin']);
        $redis->SET('user_allHandicap_' . $row[$i][id], $row[$i]['allHandicap']);
        $redis->SET('user_allBigSmall_' . $row[$i][id], $row[$i]['allBigSmall']);
        $redis->SET('user_oddEven_' . $row[$i][id], $row[$i]['oddEven']);
        $redis->SET('user_halfWin_' . $row[$i][id], $row[$i]['halfWin']);
        $redis->SET('user_halfHandicap_' . $row[$i][id], $row[$i]['halfHandicap']);
        $redis->SET('user_halfBigSmall_' . $row[$i][id], $row[$i]['halfBigSmall']);
    }
    for ($i = 0; $i < count($row); $i++) {
        $game[$i] = [$redis->GET('user_game_' . $row[$i][id]),
        $redis->GET('user_time_' . $row[$i][id]),
        $redis->GET('user_gameDetail_' . $row[$i][id]),
        $redis->GET('user_allWin_' . $row[$i][id]),
        $redis->GET('user_allHandicap_' . $row[$i][id]),
        $redis->GET('user_allBigSmall_' . $row[$i][id]),
        $redis->GET('user_oddEven_' . $row[$i][id]),
        $redis->GET('user_halfWin_' . $row[$i][id]),
        $redis->GET('user_halfHandicap_' . $row[$i][id]),
        $redis->GET('user_halfBigSmall_' . $row[$i][id])];
        echo json_encode($game) . "<br>";
    }
    // sleep(5);
    // }
}

redisCache();
