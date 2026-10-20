<?php
    require "nav.php";
    require "connection.php";
?>

<div class="row m-0 p-0">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 bg-light p-4">
        <h2 class="text-primary text-center">Login Form</h2>
        <form method="post" action="">
            <label>Name</label>
            <input type="text" name="username" class="form-control mb-2" placeholder="UserName" required/>
            <label>Password</label>
            <input type="text" name="pass" class="form-control mb-2" placeholder="Password" required/>
            
            <input type="submit" class="form-control bg-primary text-light mb-2" value="Login"/>

        </form>

    </div>
    <div class="col-sm-3"></div>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uName = $_POST["username"];
        $pass = $_POST["pass"];

        $sql = "SELECT * FROM `login` WHERE `login`.`user_name` = '$uName' AND `login`.`user_pass` = '$pass'";

        $res = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($res);

        if ($num > 0)
        {
            session_start();
            $_SESSION["name"] = "$uName";
            header("location: welcome.php");
            // exit; // Best practice: Stop script execution after redirection

        }
        else 
        {
            echo "login failed!";
        }



    }
?>