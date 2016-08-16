<?php
require_once 'MyPDO.php';

class MysqlAction
{
    function mysqlInsert($time,
                        $game,
                        $gameDetail,
                        $allWin,
                        $allHandicap,
                        $allBigSmall,
                        $oddEven,
                        $halfWin,
                        $halfHandicap,
                        $halfBigSmall
                        )
    {
        $sql = "INSERT INTO `game`(`game`, `time`, `gameDetail`, `allWin`, `allHandicap`, `allBigSmall`, `oddEven`, `halfWin`, `halfHandicap`, `halfBigSmall`)
            VALUES (:game, :time, :gameDetail, :allWin, :allHandicap, :allBigSmall, :oddEven, :halfWin, :halfHandicap, :halfBigSmall)";
        $mypod = new MyPDO();
        $pod = $mypod->pdoConnect;
        $stmt = $pod->prepare($sql);
        $stmt->execute([
            ':game' => $game,
            ':time' => $time,
            ':gameDetail' => $gameDetail,
            ':allWin' => $allWin,
            ':allHandicap' => $allHandicap,
            ':allBigSmall' => $allBigSmall,
            ':oddEven' => $oddEven,
            ':halfWin' => $halfWin,
            ':halfHandicap' => $halfHandicap,
            ':halfBigSmall' => $halfBigSmall
            ]);
    }
}
// phpinfo();
