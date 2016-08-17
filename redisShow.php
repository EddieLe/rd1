<?php
function redisShow()
{
    $redis = new redis();
    $result = $redis->connect('127.0.0.1',6379) or die ("could net connect redis server");

    $game = $redis->GET('gameData');
    echo $game;

}
redisShow();
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <script type="text/javascript">
          setTimeout(function(){
            location.reload();
          },60000)
        </script>
    </body>
</html>