<?php
require_once 'MyPDO.php';

function redisCache()
{
    ignore_user_abort(true);

    while (true) {
        $sql = "SELECT * FROM `game` limit 180";
        $mypdo = new MyPDO();
        $pdo = $mypdo->pdoConnect;

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchall(PDO::FETCH_ASSOC);

        $redis = new redis();
        $result = $redis->connect('127.0.0.1',6379) or die ("could net connect redis server");
        //寫入redis
        $redis->set('gameData', json_encode($row));

    sleep(60);
    }
}

redisCache();
