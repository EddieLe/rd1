<?php
header("content-type: text/html; charset=utf-8");
require_once '../MyPDO.php';

function apiSearch()
{
    $game = $_POST['type'];
    $sql = "SELECT * FROM `game` WHERE `game` LIKE :game";
    $mypdo = new MyPDO();
    $pdo = $mypdo->pdoConnect;
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':game' => '%' . $game . '%']);
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);
    if (count($row) != 0) {
        $respose = [
            'status' => 'sucess',
            'data' => $row
        ];
    } else {
         $respose = [
            'status' => 'error',
            'data' => 'no conform'
        ];
    }
    echo json_encode($respose);
}

apiSearch();
