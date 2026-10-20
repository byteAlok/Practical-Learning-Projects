<?php

    require "nav.php";
    require "connection.php";
    echo " - Register";

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
            <h2 class="text-center text-success"> Registration Form</h2>
            <form method="post" action="">

                <label>User Name</label>
                <input type="text" placeholder="UserName" name="username" class="form-control mb-2" required/>
                <label>Email</label>
                <input type="text" name="email" placeholder="Email" class="form-control mb-2" required/>
                <label>Password</label>
                <input type="text" name="pass" placeholder="Password" class="form-control mb-2" required/>
                <label>Confirm Password</label>
                <input type="text" name="cpass" placeholder="Confirm Password" class="form-control mb-2" required/>

                <input type="submit" value="Register" name="btn" class="form-control mb-2 bg-success text-light"/>
                
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
<?php   
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uname = $_POST["username"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
    
    // echo "$uname, $email, $pass, $cpass";
    if ($pass == $cpass)
    {
        $sql = "INSERT INTO `user` (`user_name`, `user_email`, `user_password`, `user_cpassword`) VALUES ('$uname', '$email', '$pass', '$cpass');";

        $res = mysqli_query($connection, $sql);

        if ($res)
        {
            echo "Registration Successful!";
        }
        else
        {
            echo "Registration Failed!";
        }
    }
    else
        {
            echo "Password missmatch!";
        }



    }

?>
</html>