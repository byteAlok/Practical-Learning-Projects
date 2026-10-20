<?php
    session_start();
    require "connection.php";
    $msg = "";
    if (!isset($_SESSION['checkLogin']) || $_SESSION['checkLogin'] == false)
    {
            $_SESSION['userId'] = "";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $shop = $_POST['shop'];
        $add = $_POST['add'];

        $sql = "INSERT INTO `seller2` (`shopname`, `address`, `user_id`) VALUES ('$shop', '$add', '$_SESSION[userId]');";

        $res = mysqli_query($connection, $sql);
        
        if($res)
        {
            $check = "SELECT * FROM `seller2` WHERE `seller2`.`user_id` = '$_SESSION[userId]';";
            $res2 = mysqli_query($connection, $check);
            $num2 = mysqli_num_rows($res2);

            if ($num2 > 0 )
            {
                $row2 = mysqli_fetch_assoc($res2);
        
                $_SESSION['id'] = $row2['id'];
                $_SESSION['shopname'] = $row2['shopname'];
                $_SESSION['address'] = $row2['address'];
                $_SESSION['sellerImage'] = $row2['image'];

                header("location: seller/sellerAccount.php");
                exit();
            }
        }
    else
    {
        $msg = "Registration Failed";
    }
    }
?>
<?php 
    $check = "SELECT * FROM `seller2` WHERE `seller2`.`user_id` = '$_SESSION[userId]';";
    $res2 = mysqli_query($connection, $check);
    $num2 = mysqli_num_rows($res2);

    if ($num2 > 0 )
    {
        $row2 = mysqli_fetch_assoc($res2);
        
        $_SESSION['id'] = $row2['id'];
        $_SESSION['shopname'] = $row2['shopname'];
        $_SESSION['address'] = $row2['address'];
        $_SESSION['sellerImage'] = $row2['image'];

        header("location: seller/sellerAccount.php");
        exit();
    }
    else 
    {
        $_SESSION['id'] = "";
        $_SESSION['shopname'] = "";
        $_SESSION['address'] = "";
        $_SESSION['image'] = "";
        require 'navbar.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <style>
        #login {
            text-decoration: none;
        }
        #d-box{
            margin-top: 40px;
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

<body style='background-color: rgb(239, 239, 239);'>


    <div class='row m-0 p-0 text-center' id='msgBox'>
        <div class='col-sm-3'></div> 
        <div class='col-sm bg-light mt-4 p-4 rounded'>
            <h2 class='text-primary'>You have not any seller account</h2>
            <p class='fs-4 text-danger'>If you want to create your seller account</p>
            <span>Then Click! 👉</span>
            <button class='btn btn-primary' onclick='yes()'>Yes</button>
            <a href='http://localhost/myCart/welcome.php'><button class='btn btn-success'>Go Back to Home!</button></a>
            
        </div>
        <div class='col-sm-3'></div>
    </div>

    <div class='row m-0 p-0' >
            
        <div class='col-sm'></div>
        <div class='col-sm-7 mt-4' id='showBox'>
              
            <div class='row m-0 p-0'>
                <div class='col-sm-4 bg-primary'>
                    <div id='d-box'>
                    <img src='images\seller.webp' height='150' id='ilogo'/>
                    </div>
                    <h3 class='text-light text-center hh3'>MyCart</h3>
                    <p class='text-light text-center pp'>Register Seller Account</p>
                    
                </div>
                <div class='col-sm-8 bg-light p-4'>
                    <form method='post' class='p-2'>
                        
                        <label for='shop'>Shop Name</label>
                        <input type='text' class='form-control mt-2 mb-3' placeholder='Shop Name' name='shop'
                            id='shop' required/>
                        <label for='shop'>Shop Location</label>
                        <input type='text' class='form-control mt-2 mb-3' placeholder='Exact Location of Your Shop' name='add'
                            id='add' required/>
                        <input type='submit' name='register' value='Register'
                            class='form-control bg-primary text-light' />
                    </form>
                        <button class='btn'><a href='http://localhost/myCart/welcome.php' id='login'>Go Back!</a></button>
                        <button class='btn'><a href='http://localhost/myCart/sellerRegister.php' id='login'>Refresh</a></button>
                    
                </div>
            </div>
        </div>
        <div class='col-sm'></div>
    </div>
</body>

<script>
    document.getElementById('showBox').style.display = 'none';
    function yes(){
        var a = document.getElementById('showBox');
        var b = document.getElementById('msgBox');

        a.style.display = 'inline';
        b.style.display = 'none';
    }
</script>
<?php echo $msg; ?>
</html>

<?php } ?>