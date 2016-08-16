<?php
header("content-type: text/html; charset=utf-8");
require_once 'MyPDO.php';

function apiSearch()
{
    if (isset($_POST['type']))
    {
        $game = $_POST['type'];

        $sql = "SELECT * FROM game WHERE game LIKE '%' || :game || '%' limit 10";
        $mypod = new MyPDO();
        $pod = $mypod->pdoConnect;
        $stmt = $pod->prepare($sql);
        $stmt->execute([':game' => $game]);
        $row = $stmt->fetchall(PDO::FETCH_ASSOC);

        $respose = [
            'status' => 'sucess',
            'data' => $row
        ];
    } else {
         $respose = [
            'status' => 'error',
            'data' => 'error'
        ];
    }
    echo json_encode($respose);
}

apiSearch();