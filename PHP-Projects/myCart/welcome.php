<?php
    session_start();
    require "navbar.php";
    require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
            margin-left: 5px;
            margin-bottom: -5px;
        }
    </style>
</head>

<body style="background-color: rgb(239, 239, 239);">

    <div class="row m-0 p-0">
        <div class="col-sm-12 mt-2 mb-2">
            <div class="row bg-light m-1 p-4">
        <div class="col-sm-1"></div>
 
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1">
            <img src="images\LQKtDUzA53.png" height="75" id="ilogo"/>
            <p class="text-dark pp ">Grocery</p>

        </div>
        <div class="col-sm-1"></div>
        </div>  
        </div>
    </div>

    <div class="row m-0 p-0">
        <div class="col-sm-12">
            
            <!-- <h2>Welcome on MyCart</h2> -->
            <div id="carouselExampleIndicators" class="carousel slide m-1" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images\pics.png" class="d-block w-100" height="275" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images\texture (1).jpg" class="d-block w-100" height="275" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images\texture (3).jpg" class="d-block w-100" height="275" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" title="Previous Slide" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" title="Next Slide" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="col-sm-12">
            <h2 class="text-center mt-4"><?php echo (isset($_SESSION['userFullname']) && !empty($_SESSION['userFullname'])) ? "Welcome to the MyCart : <span class='text-primary'>".$_SESSION['userFullname']."</span>" : ""; ?></h2>
        </div>
    </div>
</body>

</html>