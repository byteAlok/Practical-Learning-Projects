<?php
    session_start();
    require "../connection.php";
        $msg = "";
        if (isset($_SESSION['sellerImage']) && empty($_SESSION['sellerImage'])) 
        {
            $_SESSION['sellerImage'] = "";
        }
 

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
        $shop = $_POST['shop'];
        $add = $_POST['add'];

        $fileName = $_FILES['image']['name'];

        if ($fileName != "")
        {
            $temp = $_FILES['image']['tmp_name'];
            $folder = $_SERVER['DOCUMENT_ROOT']."/myCart/sellerimage/".$fileName;
            move_uploaded_file($temp, $folder);
            $_SESSION['sellerImage'] = $fileName;
        }

        $sql = "UPDATE `seller2` SET `shopname` = '$shop', `address` = '$add', `image` = '$_SESSION[sellerImage]' WHERE `seller2`.`id` = '$_SESSION[id]';";
        $res = mysqli_query($connection, $sql);
        
        if($res)
        {
            $_SESSION['shopname'] = $shop;
            $_SESSION['address'] = $add;
            $msg = "<div class='alert alert-primary' role='alert'>Account Updated Successfully!</div>";
        }
        else{
            $msg = "<div class='alert alert-danger' role='alert'>Account Updation Failed!</div>";
        }


        }

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
        #update {
            border: 0px;
            padding: 5px 10px;
            width: 150px;
            border-radius: 8px;
            margin: 0px 5px;
        }
        label , input {
            border: none !important;
            background-color: transparent !important;
        }
    </style>
</head>
<body>
    <div class="row m-0 p-0" style="background-color: rgb(240, 240, 240);">
        <div class="col-sm-2 py-3 bg-dark border-end border-4 border-primary box1">
            <a href="http://localhost/myCart/seller/sellerAccount.php">
                <img src="<?php echo isset($_SESSION['sellerImage']) ? '/myCart/sellerimage/'.$_SESSION['sellerImage'] :'/myCart/images/9187604.png'; ?>" id="imgg" height="36" width="36" style="border-radius: 50%;"/>
                <span class="text-light fs-3 px-2">Seller</span>
            </a>
            <div class="row m-0 p-0 border-top mt-3 mb-3 border-light"></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/dashboard.php" >Dashboard</a ></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/insert.php" >Upload Product</a ></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/show.php" >Show Product</a ></div>
            <div class="row m-0 p-0 mt-2 mb-2 rounded d"><a href="http://localhost/myCart/seller/order.php" >Orders</a ></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/user/userAccount.php" >User Account</a ></div>
        </div>

        <div class="col-sm" id="view" style="background:rgb(186, 222, 244);">
           

        
    <div class="row m-0 p-0">

        <h2 class="text-center mt-4 mb-3">Seller Account</h2>
        <div class="col-sm-1 m-0 p-0"></div>
        <div class="col-sm m-0 p-0">

            <form method="post" class="mb-4" enctype="multipart/form-data">
                <div class="row m-0 p-0">

                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 text-center mb-2">
                        <img src="<?php echo isset($_SESSION['sellerImage']) ? '/myCart/sellerimage/'.$_SESSION['sellerImage'] :'/myCart/images/9187604.png'; ?>" height="200" width="200" style="border-radius: 50%; margin:10px 0px;" />
                        <input type="file" name="image"/>
                    </div>
                    <div class="col-sm-4 text-center">
                        <?php echo $msg; ?>
                    </div>
                </div>

                <div class="row m-0 p-0">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2 bg-light text-center rounded mx-2">

                        <label class="form-control mt-4 " for="shop">Shop Name</label>
                        <label class="form-control mt-3 " for="add"> Shop Location</label>

                    </div>
                    <div class="col-sm-6 bg-light rounded">
                        
                        <input type="text" value="<?php echo isset($_SESSION['shopname'])? $_SESSION['shopname'] : '' ?>" class="form-control mt-4" name="shop" placeholder="Shop Name" id="shop" />
                        <input type="text" value="<?php echo $_SESSION['address']?? '' ?>" class="form-control mt-3 mb-3" placeholder="Exact Location of Your Shop" name="add"
                            id="add" required/>
                        <input type="submit" value="Update" class="bg-primary text-light mt-2 mb-4" id="update" />
                    </div>
                    <div class="col-sm-2"></div>
                </div>


            </form>
        </div>
        <div class="col-sm-1"></div>
    
        
    </div>

        </div>

    </div>
</body>
</html>
