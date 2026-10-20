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
        
        #image {
            border-radius: 50%;
            margin: 0px 2px 0px 16px;
        }

        .mycart {
            color: rgb(0, 98, 255) !important;
            font-weight: 700;
            font-size: 24px;
        }
        .search{
            border:1px solid rgb(180, 180, 180) !important;
        }
        
    </style>
</head>

<body>
    <div class="row m-0 p-0 sticky-top " style="z-index: 101;">
        <div class="col-sm-12 m-0 p-0 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand mx-4 py-1 fs-3 mycart" href="http://localhost/myCart/welcome.php">MyCart</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page" href="#">Home</a>
                            </li>
                            
                        </ul> -->
                        <form class="d-flex" style="margin: 5px 30px 5px 75px;">
                            <input class="form-control me-2 search" style="width: 500px;" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-primary " type="submit">Search</button>
                        </form>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-4">
                            <li class="nav-item ">
                                <a class="nav-link active" aria-current="page"
                                    href="<?php echo (isset($_SESSION['userName']) && !empty($_SESSION['userName'])) ? "http://localhost/myCart/user/userAccount.php" : "http://localhost/myCart/login.php"; ?>"> 

                                    <?php echo (isset($_SESSION['userFullname']) && !empty($_SESSION['userFullname'])) ? $_SESSION['userFullname'] : "Login"; ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="<?php echo (isset($_SESSION['userName']) && !empty($_SESSION['userName'])) ? "http://localhost/myCart/user/cart.php" : "http://localhost/myCart/login.php"; ?>">Add To Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="<?php echo (isset($_SESSION['userName']) && !empty($_SESSION['userName'])) ? "http://localhost/myCart/sellerRegister.php" : "http://localhost/myCart/login.php"; ?>">Become a Seller</a>
                            </li>
                            <!-- <li>
                            <a href="#" title="Login"><img src="images\college girl.jpg" alt="logo" width="35px" class="" id="image"/></a>
                            </li> -->

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="http://localhost/myCart/items.php">Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="http://localhost/myCart/details.php">Details</a>
                            </li>

                        </ul>
                        <a href="<?php echo (isset($_SESSION['userName']) && !empty($_SESSION['userName'])) ? "http://localhost/myCart/user/userAccount.php" : "http://localhost/myCart/login.php"; ?>" title="Login" style="text-decoration:none;">
                        
                        <img src="<?php echo (isset($_SESSION['userImage']) && !empty($_SESSION['userImage'])) ? '/myCart/upimg/'.$_SESSION['userImage'] : "/myCart/images/9187604.png"; ?>" alt="logo" width="35" height="35" id="image" />
                    
                        </a>

                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>