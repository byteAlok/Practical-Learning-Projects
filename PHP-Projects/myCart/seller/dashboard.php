<?php
    session_start();
    require "../connection.php";
    require "../navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        }
    </style>
</head>
<body>
    <div class="row m-0 p-0" style="background-color: rgb(240, 240, 240);">
        <div class="col-sm-2 py-3 bg-dark border-end border-4 border-primary box1">
            <a href="http://localhost/myCart/seller/sellerAccount.php">
                <img src="<?php echo isset($_SESSION['sellerImage']) ? '/myCart/sellerimage/'.$_SESSION['sellerImage'] :'/myCart/images/9187604.png'; ?>" id="imgg" height="36" width="36" style="border-radius: 50%;"/>
                <span class="text-light fs-3 px-2">Seller</span>
            </a >
            <div class="row m-0 p-0 border-top mt-3 mb-3 border-light"></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/dashboard.php" >Dashboard</a ></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/insert.php" >Upload Product</a ></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/show.php" >Show Product</a ></div>
            <div class="row m-0 p-0 mt-2 mb-2 rounded d"><a href="http://localhost/myCart/seller/order.php" >Orders</a ></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/user/userAccount.php" >User Account</a ></div>

        </div>

        <div class="col-sm" id="view" style="background:rgb(186, 222, 244);">
           Dashboard
        </div>
    </div>
</body>
</html>
