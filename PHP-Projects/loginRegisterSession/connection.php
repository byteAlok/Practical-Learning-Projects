<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "register";

    $connection = mysqli_connect($serverName, $userName, $password, $database);
    echo "Database connected";

?>