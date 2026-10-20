<?php
    session_start();
    $msg = "";
    if (!isset($_SESSION['checkLogin']) || $_SESSION['checkLogin'] == false)
    {
        $keys = ['userId','userName','userEmail','userPhone','userPass','userFullname','userGender','userCity','userPin','userState','userImage'];

        foreach ($keys as $key) 
        {
            $_SESSION[$key] = "";
        }

    }
    require "../connection.php";

    if (isset($_POST['logoutBtn']))
        {
            $_SESSION['checkLogin'] = false;
            $keys = ['userId','userName','userEmail','userPhone','userPass','userFullname','userGender','userCity','userPin','userState','userImage'];

            foreach ($keys as $key) 
            {
                unset($_SESSION[$key]); 
            }
            session_destroy();
            header("location: ../welcome.php");
            exit;
        }
    require "../navbar.php";
    $userid = $_SESSION['userId'];

    // if ($_SESSION['userImage'] == "") 
    // {
    //     $_SESSION['userImage'] = "/myCart/images/9187604.png";
    // }
    
    $male = "";
    $female = "";
    $notp = "";
    $none = "";

    if ($_SESSION['userGender'] == "Male"){ $male = "checked"; }
    else if ($_SESSION['userGender'] == "Female"){ $female = "checked"; }
    else if ($_SESSION['userGender'] == "Not prefer to say"){ $notp = "checked"; }
    else {$none = "checked";}

    if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $fname = $_POST['fname'];
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['pass'];
            $gender = $_POST['gender'];
            $city = $_POST['city'];
            $pin = $_POST['pin'];
            $state = $_POST['state'];

        $_SESSION['userName'] = $uname;
        $_SESSION['userEmail'] = $email;
        $_SESSION['userPhone'] = $phone;
        $_SESSION['userPass'] = $pass;
        $_SESSION['userFullname'] = $fname;
        $_SESSION['userGender'] = $gender;
        $_SESSION['userCity'] = $city;
        $_SESSION['userPin'] = $pin;
        $_SESSION['userState'] = $state;

    if ($_SESSION['userGender'] == "Male"){ $male = "checked"; }
    else if ($_SESSION['userGender'] == "Female"){ $female = "checked"; }
    else if ($_SESSION['userGender'] == "Not prefer to say"){ $notp = "checked"; }
    else {$none = "checked";}

            $fileName = $_FILES['image']['name'];

            if ($fileName != "")
            {
                $temp = $_FILES['image']['tmp_name'];
                $folder = $_SERVER['DOCUMENT_ROOT']."/myCart/upimg/".$fileName;
                move_uploaded_file($temp, $folder);
                $_SESSION['userImage'] = $fileName;   
            }
            
              
            $sql = "UPDATE `user` SET `user_name` = '$uname', `user_email` = '$email', `user_phone` = '$phone', `user_pass` = '$pass', `user_fullname` = '$fname', `user_gender` = '$gender', `user_city` = '$city', `user_pin` = '$pin', `user_state` = '$state', `user_image` = '$_SESSION[userImage]' WHERE `user`.`user_id` = '$userid';";

            $res = mysqli_query($connection, $sql);
            
            if($res)
            {  
                $msg = "<div class='alert alert-primary' role='alert'>Account Updated Successfully!</div>";
            }
            else {
                $msg = "<div class='alert alert-primary' role='alert'>Account Updation Failed!</div>";
            }
        }  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .box1>a, .d>a{
            text-decoration:none;
        }
        .d >a {
            background-color: transparent;
            color: white !important;
            font-size: 18px;
            border-radius: 5px;
            padding: 8px 0px 8px 15px;
            text-align: left;
            border: none;
        }
        
        .d > a:hover {
            background-color: rgb(0, 60, 255);
        }
        #imgg {
            margin: -12px 0px 0px 15px;
            border-radius: 50%;
        }


        #update,
        #logout {
            border: 0px;
            padding: 5px 10px;
            width: 150px;
            border-radius: 8px;
            margin: 0px 5px;
        }

        label,
        input {
            border: none !important;
            background-color: transparent !important;
        }

    </style>
</head>

<body style="background:rgb(186, 222, 244);">
    <div class="row m-0 p-0" style="background-color: rgb(240, 240, 240);">
        <div class="col-sm-2 py-3 bg-dark border-end border-4 border-primary box1">
            <a href="http://localhost/myCart/user/userAccount.php">
                <img src="<?php echo (isset($_SESSION['userImage']) && !empty($_SESSION['userImage'])) ? '/myCart/upimg/'.$_SESSION['userImage'] : "/myCart/images/9187604.png"; ?>" id="imgg" height="36" width="36"/>
                <span class="text-light fs-2 px-2">Account</span>
            </a >
            <div class="row m-0 p-0 border-top mt-3 mb-3 border-light"></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/user/cart.php" >Add to Cart</a ></div>
            <div class="row m-0 p-0 mt-2 mb-2 rounded d"><a href="http://localhost/myCart/user/userorder.php" >Your Orders</a ></div>
            <div class="row m-0 p-0 mt-2 mb-2 rounded d"><a href="http://localhost/myCart/sellerRegister.php" >Seller Account</a ></div>

        </div>

        <div class="col-sm" id="view" style="background:rgb(186, 222, 244);">
           
        <div class="row m-0 p-0 ">

        <h2 class="text-center mt-4 mb-3">User Account</h2>
        <div class="col-sm-1 m-0 p-0"></div>
        <div class="col-sm-10 m-0 p-0">

            <form method="post" class="mb-4" enctype="multipart/form-data">
                <div class="row m-0 p-0">

                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 text-center mb-2">
                        <img src="<?php echo (isset($_SESSION['userImage']) && !empty($_SESSION['userImage'])) ? "/myCart/upimg/".$_SESSION['userImage'] : "/myCart/images/9187604.png"; ?>" height="200" width="200"
                            style="border-radius: 50%; margin:10px 0px;" />
                        <input type="file" name="image"/>
                    </div>
                    <div class="col-sm-4 text-center">
                        <?php echo $msg;?>
                    </div>
                </div>

                <div class="row m-0 p-0">
                    <div class="col-sm"></div>
                    <div class="col-sm-2 bg-light text-center mx-2 rounded">

                        <label class="form-control mt-4 " for="fname">Your Full Name</label>
                        <label class="form-control mt-4 " for="user">Your User Name</label>
                        <label class="form-control mt-4 " for="email"> Email ID</label>
                        <label class="form-control mt-4 " for="phone"> Phone Number</label>
                        <label class="form-control mt-4 " for="pass"> Password</label>
                        <label class="form-control mt-4 " for="gender">Gender</label>
                        <label class="form-control mt-4 " for="city">City</label>
                        <label class="form-control mt-4 " for="pin">Pincode</label>
                        <label class="form-control mt-4 " for="state">State</label>


                    </div>
                    <div class="col-sm-6 bg-light rounded">

                        <input type="text" value="<?php echo $_SESSION['userFullname']; ?>" class="form-control mt-4"
                            name="fname" placeholder="Full Name" id="fname" />

                        <input type="text" value="<?php echo $_SESSION['userName']; ?>" class="form-control mt-4"
                            name="uname" placeholder="User Name" id="user" />

                        <input type="text" value="<?php echo $_SESSION['userEmail']; ?>" class="form-control mt-4"
                            name="email" placeholder="Email ID" id="email" />

                        <input type="text" value="<?php echo $_SESSION['userPhone']; ?>" class="form-control mt-4"
                            name="phone" placeholder="Phone Number" id="phone" />

                        <input type="text" value="<?php echo $_SESSION['userPass']; ?>" class="form-control mt-4"
                            name="pass" placeholder="Password" id="pass" />

                        <div class=" mt-4 mb-4" id="gender">
                            <label for="male" class="me-3">
                                <input type="radio" value="Male" name="gender" id="male" <?php echo $male ?>/> Male
                            </label>

                            <label for="female" class="me-3">
                                <input type="radio" value="Female" name="gender" id="female" <?php echo $female ?>/>
                                Female
                            </label>

                            <label for="none">
                                <input type="radio" value="Not prefer to say" name="gender" id="none" <?php echo $notp
                                    ?>/> Prefer not to
                                say
                            </label>
                            <label for="not">
                                <input type="radio" value="Not Selected" name="gender" id="not" <?php echo $none; ?>
                                hidden/>
                            </label>
                        </div>

                        <input type="text" value="<?php echo $_SESSION['userCity']; ?>" class="form-control mt-4"
                            name="city" placeholder="City" id="city" />

                        <input type="text" value="<?php echo $_SESSION['userPin']; ?>" class="form-control mt-4"
                            name="pin" placeholder="Pincode" id="pin" />

                        <input type="text" value="<?php echo $_SESSION['userState']; ?>" class="form-control mt-4"
                            name="state" placeholder="State" id="state" />

                        <input type="submit" value="Update" class="bg-primary text-light mt-4 mb-4" id="update" />
                        <input type="submit" value="Logout" name="logoutBtn" class="bg-danger text-light mt-4 mb-4"
                            id="logout" />

                    </div>
                    <div class="col-sm"></div>
                </div>


            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>

        </div>
    </div>

</body>

</html>