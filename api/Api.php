<?php
require_once '../MyPDO.php';

function api()
{
    $sql = "SELECT * FROM `game`";
    $mypdo = new MyPDO();
    $pdo = $mypdo->pdoConnect;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);

    $respose = [
        'status' => 'sucess',
        'data' => $row
    ];

    echo json_encode($respose);
}

api();