<?php
    session_start();
    require "../connection.php";
    require "../navbar.php";
    $msg = "";

    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_SESSION['id']) && isset($_SESSION['userId']))
    {
        $pName = $_POST['proname'];
        $pPrice = $_POST['proprice'];
        $pAvail = $_POST['available'];

        $ph1 = $_POST['hh1'];
        $ph2 = $_POST['hh2'];
        $ph3 = $_POST['hh3'];
        $ph4 = $_POST['hh4'];
        $ph5 = $_POST['hh5'];

        $pFile1 = $_FILES['image1']['name'];
        $pFile2 = $_FILES['image2']['name'];
        $pFile3 = $_FILES['image3']['name'];

        $temp1 = $_FILES['image1']['tmp_name'];
        $temp2 = $_FILES['image2']['tmp_name'];
        $temp3 = $_FILES['image3']['tmp_name'];

        $pFolder1 = $_SERVER['DOCUMENT_ROOT'].'/myCart/itemsImage/'.$pFile1;
        $pFolder2 = $_SERVER['DOCUMENT_ROOT'].'/myCart/itemsImage/'.$pFile2;
        $pFolder3 = $_SERVER['DOCUMENT_ROOT'].'/myCart/itemsImage/'.$pFile3;

        move_uploaded_file($temp1, $pFolder1);
        move_uploaded_file($temp2, $pFolder2);
        move_uploaded_file($temp3, $pFolder3);

        $sql = "INSERT INTO `product` (`pname`, `pprice`, `pavaliable`, `ph1`, `ph2`, `ph3`, `ph4`, `ph5`, `pimg1`, `pimg2`, `pimg3`, `seller_id`) VALUES ('$pName', '$pPrice', '$pAvail', '$ph1', '$ph2', '$ph3', '$ph4', '$ph5', '$pFile1', '$pFile2', '$pFile3', '$_SESSION[id]');";
        
        $res = mysqli_query( $connection, $sql);

        if ($res)
        {
            $msg = "<div class='alert alert-primary m-0 p-3 text-center' role='alert'>Product Uploaded Successfully!</div>";
        }
    }
    else if (!isset($_SESSION['id']) || !isset($_SESSION['userId']))
    {
        $msg = "<div class='alert alert-danger m-0 p-3 text-center' role='alert'>Unauthorized access! - First Login!</div>";
    }
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
        input, label, #available{
            border: none !important;
            background:transparent !important;
            font-size: 17px !important;
        }
        .bboxx{
            background-color: rgba(255, 255, 255, 0.639);
            box-shadow: 0px 0px 3px rgb(23, 0, 117);

        }
    </style>
</head>
<body>
    <div class="row m-0 p-0" style="background-color: rgb(240, 240, 240);">
        <div class="col-sm-2 py-3 bg-dark border-end border-4 border-primary box1" style="z-index: 100;">
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

        <div class="col-sm m-0 p-0" id="view" style="background: radial-gradient(rgb(171, 255, 175), rgb(169, 169, 255));">
        <?php echo $msg; ?>

        <div class="row m-0 p-0">

        <h2 class="text-center mt-4 mb-3">Upload Your Product</h2>
        <div class="col-sm-1 m-0 p-0"></div>
        
        <div class="col-sm m-0 p-0">

            <form method="post" class="mb-4" enctype="multipart/form-data">
                <div class="row m-0 p-0 mb-4 mt-2">
                    <div class="col-sm"></div>
                    <div class="col-sm-3 text-center py-3 mx-1 rounded bboxx">
                        <img src="/myCart/images/texture (3).jpg" alt="Preview" id="preview1" height="225" width="225" style="border-radius:3px; margin:10px 0px;" />
                        <h6>Product Image : 1</h6>
                    </div>
                    <div class="col-sm-3 text-center py-3 mx-1 rounded bboxx">
                        <img src="/myCart/images/texture (3).jpg" alt="Preview" id="preview2" height="225" width="225" style="border-radius:3px; margin:10px 0px;" />
                        <h6>Product Image : 2</h6>
                    </div>
                    <div class="col-sm-3 text-center py-3 mx-1 rounded bboxx">
                        <img src="/myCart/images/texture (3).jpg" alt="Preview" id="preview3" height="225" width="225" style="border-radius:3px; margin:10px 0px;" />
                        <h6>Product Image : 3</h6>
                    </div>
                    <div class="col-sm text-center">
                        <a href="http://localhost/myCart/seller/insert.php" class="btn bg-primary text-light">Refresh!</a>
                    </div>
                </div>

                <div class="row m-0 p-0">
                    <h4 class="text-center mb-3">1 : Introduce Your Product</h4>
                    <div class="col-sm"></div>
                    <div class="col-sm-2 text-center rounded mx-2 bboxx">
                        <label class="form-control mt-4 " for="proname">Product Name</label>
                        <label class="form-control mt-4 " for="proprice">Price</label>
                        <label class="form-control mt-4 " for="available">Availability</label>

                    </div>
                    <div class="col-sm-7 rounded bboxx">
                        
                        <input type="text" class="form-control mt-4 " name="proname" placeholder="Enter Product Name" id="proname" required/>
                        <input type="text" class="form-control mt-4 mb-3 " placeholder="Product Price in Rs." name="proprice" id="proprice" required/>

                        <div class="form-control mt-4 mb-4" id="available">
                            <label for="istock" class="me-4">
                                <input type="radio" value="In Stock" name="available" id="istock"/> In Stock
                            </label>

                            <label for="nostack" class="me-4">
                                <input type="radio" value="Out of Stock" name="available" id="nostack"/>
                                Out of Stack
                            </label>
                            <label for="not">
                                <input type="radio" value="Not Selected" name="available" id="not" checked hidden/>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm"></div>
                </div>


                <div class="row mt-3 mx-0 p-0">
                    <h4 class="text-center mb-3">2 : Product Highlights</h4>
                    <div class="col-sm"></div>
                    <div class="col-sm-2 text-center rounded mx-2 bboxx">

                        <label class="form-control mt-4 " for="detail1">Highlights 1</label>
                        <label class="form-control mt-4 " for="detail2">Highlights 2</label>
                        <label class="form-control mt-4 " for="detail3">Highlights 3</label>
                        <label class="form-control mt-4 " for="detail4">Highlights 4</label>
                        <label class="form-control mt-4 mb-4" for="detail5">Highlights 5</label>

                    </div>
                    <div class="col-sm-7 rounded bboxx">
                        
                        <input type="text" class="form-control mt-4" name="hh1" placeholder="Enter Product - Feature/Specification/Description " id="detail1" required/>
                        <input type="text" class="form-control mt-4" name="hh2" placeholder="Enter Product - Feature/Specification/Description " id="detail2" required/>
                        <input type="text" class="form-control mt-4" name="hh3" placeholder="Enter Product - Feature/Specification/Description " id="detail3" required/>
                        <input type="text" class="form-control mt-4" name="hh4" placeholder="Enter Product - Feature/Specification/Description " id="detail4" required/>
                        <input type="text" class="form-control mt-4" name="hh5" placeholder="Enter Product - Feature/Specification/Description " id="detail5" required/>

                    </div>
                    <div class="col-sm"></div>
                        
                </div>


                <div class="row mt-3 p-0 mx-0">
                    <h4 class="text-center mb-3">3 : Product Images</h4>
                    <div class="col-sm"></div>
                    <div class="col-sm-2 text-center rounded mx-2 bboxx">

                        <label class="form-control mt-4 " for="image1">Image 1</label>
                        <label class="form-control mt-4 " for="image2">Image 2</label>
                        <label class="form-control mt-4 " for="image3">Image 3</label>

                    </div>
                    <div class="col-sm-7 rounded bboxx">
                        

                        <input type="file" name="image1" class="form-control mt-4" id="image1" accept="image/*" onchange="preImage(event, 'preview1')" required/>
                        <input type="file" name="image2" class="form-control mt-4" id="image2" accept="image/*" onchange="preImage(event, 'preview2')" required/>
                        <input type="file" name="image3" class="form-control mt-4" id="image3" accept="image/*" onchange="preImage(event, 'preview3')" required/>

                        <input type="submit" value="Upload" class="btn bg-primary text-light mt-3 mb-3 px-4" id="upload" name="sBtn"/>
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
<script>
    function preImage(event, preId)
    {
        const fileInput = event.target;
        const img = document.getElementById(preId);

        if (fileInput.files && fileInput.files[0])
        {
            const reader = new FileReader();

            reader.onload = function(e) 
            {
                img.src = e.target.result;
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
</html>
