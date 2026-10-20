<?php
    require "nav.php";
    require "connection.php";
?>

<div class="row m-0 p-0">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 bg-light p-4">
        <h2 class="text-success text-center">Registration Form</h2>
        <form method="post" action="">
            <label>Name</label>
            <input type="text" name="uname" class="form-control mb-2" placeholder="UserName" required/>
            <label>Phone</label>
            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" required/>
            <label>Password</label>
            <input type="text" name="pass" class="form-control mb-2" placeholder="Password" required/>
            <label>Confirm Password</label>
            <input type="text" name="cpass" class="form-control mb-2" placeholder="Confirm Password" required/>
            <input type="submit" class="form-control bg-success text-light mb-2" value="Register"/>

        </form>

    </div>
    <div class="col-sm-3"></div>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uName = $_POST["uname"];
        $phone = $_POST["phone"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];

        if ($pass == $cpass)
        {
            $sql = "INSERT INTO `login` (`user_name`, `user_phone`, `user_pass`, `user_cpass`) VALUES ('$uName', '$phone', '$pass', '$cpass');";
            
            $res = mysqli_query($connection, $sql);
            if ($res)
            {
                echo "Registration Succcessfull!";
            }
            else 
            {
                echo "Registration Failed!";
            }
        }
        else 
        {
            echo "Registration Failed! => Password Mismatch!";
        }



    }
?>  