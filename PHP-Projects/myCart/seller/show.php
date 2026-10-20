<?php 
    session_start();
    require "../connection.php";

    $istock = $nostock = $notselect = "";

    if (isset($_POST['delBtn'])) {
        $delId = $_POST['deleteId'];
        $delSql = "DELETE FROM `product` WHERE `product`.`pid` = '$delId'";
        $delRes = mysqli_query($connection, $delSql);

        if ($delRes) {
            
        echo "<script> alert('Deletion Successfully!');
                    window.location.href = 'show.php';  </script>";
        } else {
            echo "<script> alert('Deletion Failed!');
                    window.location.href = 'show.php';  </script>";
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
        .box1>a,
        .d>a {
            text-decoration: none;
        }

        .d>a {
            background-color: transparent;
            color: white !important;
            font-size: 18px;
            border-radius: 5px;
            padding: 8px 0px 8px 15px;
            text-align: left;
            border: none;
        }

        .d>a:hover {
            background-color: rgb(0, 60, 255);
        }

        #imgg {
            margin: -12px 0px 0px 15px;
        }

        #card-img {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <div class="row m-0 p-0" style="background-color: rgb(240, 240, 240);">
        <div class="col-sm-2 py-3 bg-dark border-end border-4 border-primary box1">
            <a href="http://localhost/myCart/seller/sellerAccount.php">
                <img src="<?php echo isset($_SESSION['sellerImage']) ? '/myCart/sellerimage/'.$_SESSION['sellerImage'] :'/myCart/images/9187604.png'; ?>"
                    id="imgg" height="36" width="36" style="border-radius: 50%;" />
                <span class="text-light fs-3 px-2">Seller</span>
            </a>
            <div class="row m-0 p-0 border-top mt-3 mb-3 border-light"></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/dashboard.php">Dashboard</a>
            </div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/insert.php">Upload
                    Product</a></div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/seller/show.php">Show Product</a>
            </div>
            <div class="row m-0 p-0 mt-2 mb-2 rounded d"><a href="http://localhost/myCart/seller/order.php">Orders</a>
            </div>
            <div class="row m-0 p-0 mt-2 rounded d"><a href="http://localhost/myCart/user/userAccount.php">User
                    Account</a></div>

        </div>

        <div class="col-sm m-0 p-0" id="view">


            <div class="container">
                <div class="row mt-4">
    <?php 
        $sql = "SELECT * FROM `product` WHERE `product`.`seller_id` = '$_SESSION[id]'";
        $res = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($res);
        $i = 0;
        if ($num > 0)
        {
            while ($row = mysqli_fetch_assoc($res))
        {
            $i++;

            if ($row['pavaliable'] == "In Stock") $istock = "checked";
            elseif ($row['pavaliable'] == "Out of Stock") $nostock = "checked";
            elseif ($row['pavaliable'] == "Not Selected") $notselect = "checked";
            echo "
                <div class='col-12 col-md-6 col-lg-6 mb-2'>
                    <div class='card mb-3 bg-light' style='max-width: 100%; font-size: 1rem;'>
                        <div class='row g-0'>
                            <div class='col-md-4 d-flex align-items-center justify-content-center' style='height: 170px; background-color: rgb(237, 237, 237); padding: 4px;'>
                                <img src='../itemsImage/$row[pimg1]' 
                                     class='img-fluid rounded-start' 
                                     alt='...' 
                                     style='height: 100%; width: 100%; object-fit: contain;'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title mb-2' style='font-size: 1.25rem;'>$row[pname]</h5>
                                    <p class='card-text text-primary fw-bold mb-3' style='font-size: 1.1rem;'>₹$row[pprice]</p>
                                    
                                    <form method='post' class='d-flex flex-wrap gap-2'>
                                        <input type='text' class='form-control' value='$row[pid]' name='deleteId' hidden/>
                                        <input type='submit' class='btn btn-danger px-4 py-1' value='Delete' name='delBtn'/>
                                        <button type='button' class='btn btn-success px-4 py-1' data-bs-toggle='modal' data-bs-target='#exampleModal{$i}'>Update</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class='modal fade' id='exampleModal{$i}' tabindex='-1' aria-labelledby='exampleModalLabel{$i}' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel{$i}'>Update Item</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <!-- Update form content -->
                                
                                <form method='post' enctype='multipart/form-data'>
                                    <input type='text' class='form-control' value='$row[pid]' name='delId' hidden/>
                                    <label for='pnm'>Product Name</label>
                                    <input type='text' class='form-control' placeholder='Change Product Name' name='proname' value='$row[pname]' id='pnm'/>
                                    <label for='prc'>Price</label>
                                    <input type='number' class='form-control mb-2' placeholder='Change Product Price' name='proprice' value='$row[pprice]' id='prc'/>
                                    
                                    
                            <div class='form-control mb-2' id='available'>
                                <label for='available' class='me-4'>Availability : </label>
                            <label for='istock' class='me-4'>
                                <input type='radio' value='In Stock' name='available' id='istock' $istock/> In Stock
                            </label>

                            <label for='nostack' class='me-4'>
                                <input type='radio' value='Out of Stock' name='available' id='nostack' $nostock/>
                                Out of Stack
                            </label>
                            <label for='not'>
                                <input type='radio' value='Not Selected' name='available' id='not' $notselect hidden/>
                            </label>
                        </div>
                        <label for='detail'>Highlights</label>
                        <input type='text' value='$row[ph1]' class='form-control mt-1' name='hh1' placeholder='Enter Product - Feature/Specification/Description ' id='detail' required/>
                        <input type='text' value='$row[ph2]' class='form-control mt-1' name='hh2' placeholder='Enter Product - Feature/Specification/Description ' id='detail' required/>
                        <input type='text' value='$row[ph3]' class='form-control mt-1' name='hh3' placeholder='Enter Product - Feature/Specification/Description ' id='detail' required/>
                        <input type='text' value='$row[ph4]' class='form-control mt-1' name='hh4' placeholder='Enter Product - Feature/Specification/Description ' id='detail' required/>
                        <input type='text' value='$row[ph5]' class='form-control mt-1 mb-1' name='hh5' placeholder='Enter Product - Feature/Specification/Description ' id='detail' required/>

                        <label>Product Images</label><br>
                        <input type='file' name='image1' class='mt-1' id='image1'/>
                        <input type='file' name='image2' class='mt-1' id='image2'/>
                        <input type='file' name='image3' class='mt-1' id='image3'/>

                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' name='updateBtn' class='btn btn-primary'>Save changes</button>
                        </div>
            </form>

                            </div>
                            
                        </div>
                    </div>
                </div>
            ";
        }
        }
        ?>
                </div>
            </div>

        </div>

    </div>
    </div>
</body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateBtn']))
    {
        $did = $_POST['delId'];
        $name = $_POST['proname'];
        $price = $_POST['proprice'];
        $avail = $_POST['available'];

        $hh1 = $_POST['hh1'];
        $hh2 = $_POST['hh2'];
        $hh3 = $_POST['hh3'];
        $hh4 = $_POST['hh4'];
        $hh5 = $_POST['hh5'];

        $img1 = $_FILES['image1']['name'];
        $img2 = $_FILES['image2']['name'];
        $img3 = $_FILES['image3']['name'];

    if (!empty($_FILES['image1']['name']))
    {
        $temp1 = $_FILES['image1']['tmp_name'];
        $pFolder1 = $_SERVER['DOCUMENT_ROOT'].'/myCart/itemsImage/'.$img1;
        move_uploaded_file($temp1, $pFolder1);
    
        $updateSql_img1 = "UPDATE `product` SET `pimg1` = '$img1' WHERE `product`.`pid` = '$did';";
        $updRes1 = mysqli_query($connection, $updateSql_img1);
    }
    if (!empty($_FILES['image2']['name']))
    {
        $temp2 = $_FILES['image2']['tmp_name'];
        $pFolder2 = $_SERVER['DOCUMENT_ROOT'].'/myCart/itemsImage/'.$img2;
        move_uploaded_file($temp2, $pFolder2);

        $updateSql_img2 = "UPDATE `product` SET `pimg2` = '$img2' WHERE `product`.`pid` = '$did';";
        $updRes2 = mysqli_query($connection, $updateSql_img2);
    }
    if (!empty($_FILES['image3']['name']))
    {
        $temp3 = $_FILES['image3']['tmp_name'];
        $pFolder3 = $_SERVER['DOCUMENT_ROOT'].'/myCart/itemsImage/'.$img3;
        move_uploaded_file($temp3, $pFolder3);

        $updateSql_img3 = "UPDATE `product` SET `pimg3` = '$img3' WHERE `product`.`pid` = '$did';";
        $updRes3 = mysqli_query($connection, $updateSql_img3);
    }

        $updateSql = "UPDATE `product` SET `pname` = '$name', `pprice` = '$price', `pavaliable` = '$avail', `ph1` = '$hh1', `ph2` = '$hh2', `ph3` = '$hh3', `ph4` = '$hh4', `ph5` = '$hh5' WHERE `product`.`pid` = '$did';";

        $updRes = mysqli_query($connection, $updateSql);

        if ($updRes || $updateSql_img1 || $updateSql_img2 || $updateSql_img3)
        {
            echo "<script> alert('Updated Successfully!');
                    window.location.href = 'show.php';  </script>";
        }
    }


?>
</html>
