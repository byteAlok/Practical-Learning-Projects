<?php 
    require "nav.php";
    require "connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row m-0 p-0">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 bg-light p-4 rounded">
            <h2 class="text-center text-danger">Data Deletion Form</h2>
            <form method="post" action="">
                <input type="text" class="form-control mb-3 " name="id" placeholder="Your ID" required/>

                <input type="submit" class="form-control bg-danger text-light" name="btn" value="Delete"/>

            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <?php 

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $sid = $_POST["id"];

            $check = "SELECT * FROM `student` WHERE `student`.`stu_id` = $sid";
            $res = mysqli_query($connection, $check);
            $data = mysqli_num_rows($res);

            if ( $data > 0)
            {
                $del = "DELETE FROM `student` WHERE `student`.`stu_id` = $sid";
                $res2 = mysqli_query($connection, $del);
                echo '<div class="alert alert-success text-center" role="alert">Data Deleted Successfully!</div>';
            }
            else
            {
                echo '<div class="alert alert-danger text-center" role="alert">Data Deletion Failed!</div>';

            }


        }
