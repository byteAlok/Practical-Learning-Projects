<?php
    session_start();
    require "connection.php";
    require "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #login {
            text-decoration: none;
        }
        #d-box{
            margin-top: 150px;
            display: flex;
            
        }
        .hh3{
            font-size: 48px;
            font-weight:600;
            
        }
        #ilogo{
            margin: auto;
            padding-right:10px ;
        }
        .pp{
            font-size: 16px;
            font-weight:500;
        }
    </style>

</head>

<body style="background-color: rgb(239, 239, 239);">
    <div class="row m-0 p-0">
        <div class="col-sm-2"></div>
        <div class="col-sm-7 mt-4">
            <div class="row m-0 p-0">
                <div class="col-sm-4 bg-primary">
                    <div id="d-box">
                    <img src="images\LQKtDUzA53.png" height="100" id="ilogo"/>
                    </div>
                    <h3 class="text-light text-center hh3">MyCart</h3>
                    <p class="text-light text-center pp">Register Your Account</p>
                    
                </div>
                <div class="col-sm-8 bg-light p-4">
                    <form method="post" class="p-2">
                        <label for="uname">UserName</label>
                        <input type="text" class="form-control mb-3" placeholder="UserName" name="username"
                            id="uname" required/>
                        <label for="email">Email</label>
                        <input type="text" class="form-control mb-3" placeholder="Email" name="email" id="email" required/>
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control mb-3" placeholder="Phone" name="phone" id="phone" required/>
                        <label for="pass">Password</label>
                        <input type="text" class="form-control mb-3" placeholder="Password" name="pass" id="pass" required/>
                        <label for="cpass">Confirm Password</label>
                        <input type="text" class="form-control mb-3" placeholder="Confirm Password" name="cpass"
                            id="cpass" required/>
                        <input type="submit" name="register" value="Register"
                            class="form-control bg-primary text-light" />
                    </form>
                        <button class="btn"><a href="http://localhost/myCart/login.php" id="login">Existing User? Log in</a></button>

                        <button class="btn"><a href="http://localhost/myCart/register.php" id="login">Refresh</a></button>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uName = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass == $cpass) {

    $sql = "INSERT INTO `user` (`user_name`, `user_email`, `user_phone`, `user_pass`) VALUES ('$uName', '$email', '$phone', '$pass');";

    $res = mysqli_query($connection, $sql);
    
    if ($res) {
        echo "Registration Successfull!";
    }
    else {
        echo "Registration Failed! : Try Again...";
    }
    }
    else{
        echo "Password Not Match! : Try Again...";

    }
}


?>
</html>