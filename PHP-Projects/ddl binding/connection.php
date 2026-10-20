<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "binding";

    $con = mysqli_connect($serverName, $userName, $password, $database);

    echo "Connected";

?>