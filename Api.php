<?php
require_once 'MyPDO.php';

function api()
{
    if (isset($_POST['type']) && $_POST['type'] == "all")
    {
        $sql = "SELECT * FROM game limit 10";
        $mypod = new MyPDO();
        $pod = $mypod->pdoConnect;
        $stmt = $pod->prepare($sql);
        $stmt->execute();
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

api();