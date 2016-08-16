<?php
    // $redis = new Redis();
    // $redis->connect('127.0.0.1',6379) or die ("could net connect redis server");
    // $query = "SELECT * FROM `game` limit 8";
    // //为了简单一点，这里就读取了8条数据
    // for ($key = 1; $key < 9; $key++)
    // {
    //         if (!$redis->get($key))
    //         {
    //                 $connect = mysql_connect('127.0.0.1','root','123456');
    //                 mysql_select_db(mytest);
    //                 $result = mysql_query($query);
    //                 //如果没有找到$key,就将该查询sql的结果缓存到redis
    //                 while ($row = mysql_fetch_assoc($result))
    //                 {
    //                         $redis->set($row['id'],$row['name']);
    //                 }
    //                 $myserver = 'mysql';
    //                 break;
    //         }
    //         else
    //         {
    //                 $myserver = "redis";
    //                 $data[$key] = $redis->get($key);
    //         }
    // }

    // echo $myserver;
    // echo "<br>";
    // for ($key = 1; $key < 9; $key++)
    // {
    //         echo "number is <b><font color=#FF0000>$key</font></b>";

    //         echo "<br>";

    //         echo "name is <b><font color=#FF0000>$data[$key]</font></b>";

    //         echo "<br>";
    // }
    echo date('h:i:s');
while (true) {
    set_time_limit(5); //reset execute time limit, greater than sleep time.
    sleep(3);
    echo date('h:i:s');
}
?>