<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $database = "Registration";

    $connection = mysqli_connect($serverName, $userName, $password, $database);
    echo "Database connected successfully!";

?>