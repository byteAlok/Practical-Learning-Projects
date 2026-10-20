<?php
session_start();
$_SESSION['checkLogin'] = false;

require "connection.php";

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uName = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `user` WHERE `user`.`user_name` = '$uName' AND `user`.`user_pass` = '$pass'";
    $res = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($res);

    if ($num > 0) 
        {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['userId'] = $row['user_id'];
        $_SESSION['userName'] = $row['user_name'];
        $_SESSION['userEmail'] = $row['user_email'];
        $_SESSION['userPhone'] = $row['user_phone'];
        $_SESSION['userPass'] = $row['user_pass'];
        $_SESSION['userFullname'] = $row['user_fullname'];
        $_SESSION['userGender'] = $row['user_gender'];
        $_SESSION['userCity'] = $row['user_city'];
        $_SESSION['userPin'] = $row['user_pin'];
        $_SESSION['userState'] = $row['user_state'];
        $_SESSION['userImage'] = $row['user_image'];

        $_SESSION['checkLogin'] = true;

        header("Location:details.php");
        exit;
    } else {
        $error = "UserName or Password is Wrong!";
    }
}
?>

<?php
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
            margin-top: 50px;
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
                    <p class="text-light text-center pp">Login Your Account</p>
                    
                </div>
                <div class="col-sm-8 bg-light p-4">
                    <form method="post" class="p-2">
                        <label for="uname">UserName</label>
                        <input type="text" class="form-control mb-3" placeholder="UserName" name="username"
                            id="uname" required/>
                        <label for="pass">Password</label>
                        <input type="text" class="form-control mb-3" placeholder="Password" name="pass" id="pass" required/>
        
                        <input type="submit" name="login" value="Login"
                            class="form-control bg-primary text-light" />
                    </form>
                        <button class="btn"><a href="http://localhost/myCart/register.php" id="login">New User? Create Your Account</a></button>
                        <button class="btn"><a href="http://localhost/myCart/login.php" id="login">Refresh</a></button>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
<?php
    echo $error;
?>
</html>