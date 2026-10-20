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
        <div class="col-sm-6 bg-light p-4">
            <h2 class="text-center text-success"> Login Form</h2>
            <form method="post" action="">

                <label>User Name</label>
                <input type="text" placeholder="UserName" name="username" class="form-control mb-2"/>
                <label>Password</label>
                <input type="text" name="pass" placeholder="Password" class="form-control mb-2"/>
   
                <input type="submit" value="Login" name="btn" class="form-control mb-2 bg-success text-light"/>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uname = $_POST["username"];
        $pass = $_POST["pass"];

        $sql = "SELECT * FROM `user` WHERE `user`.`user_name` = '$uname' AND `user`.`user_password` = '$pass'";

        $res = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($res);

        if ($num  > 0)
        {
        //    echo "Login Success";
           header("location: welcome.php");
        }
        else 
        {
            echo "Invalid Username or Password!";
        }




    }

?>
</html>