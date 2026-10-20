<?php
    require "nav.php";
    require "connection.php";
?>

<div class="row m-0 p-0">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 p-4">
        <h2 class="text-center text-danger">Deletion Form</h2>
        <form method="post" action="">
            <input type="text" name="id" placeholder="Enter Your ID" class="form-control"/>
            <input type="submit" value="Delete" class="form-control bg-danger text-light mt-2 mb-2"/>
        </form>
    </div>
    <div class="col-sm-3"></div>

</div>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    
    $id = $_POST['id'];

    $check = "SELECT * FROM `user` WHERE `user`.`user_id` = $id";
    $res = mysqli_query($connection, $check);
    $data = mysqli_num_rows($res);

    if ( $data > 0)
    {
        $del = "DELETE FROM `user` WHERE `user`.`user_id` = $id";
        $res2 = mysqli_query($connection, $del);
        echo '<div class="alert alert-success text-center" role="alert">Data Deleted Successfully!</div>';
    }
    else
    {
        echo '<div class="alert alert-danger text-center" role="alert">Data Deletion Failed!</div>';

    }



    }

?>