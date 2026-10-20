<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "country";

    $con = mysqli_connect($serverName, $userName, $password, $database);
    echo "connected";
?>