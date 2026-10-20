<?php
    session_start();
    require "navbar.php";
    require "connection.php";

    $product = [
        'name' => 'OPPO K13 5G',
        'price' => 19999,
        'availability' => 'In Stock',
        
        'image1' => 'images/oppo-k13.jpg',
        'image2' => 'images/oppo-k13.jpg',
        'image3' => 'images/oppo-k13.jpg',        

        'highlights' => [
            "7000mAh 5-Years Durable Battery",
            "80W SUPERVOOC Charger",
            "Snapdragon 6 Gen 4",
            "7.9L+ AnTuTu Score",
            "Vapour Cooling Chamber"
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #product-name:hover{
            color: blue;
        }
    </style>
</head>

<body style="background-color: rgb(237, 237, 237);">
    <div class="container-fluid">
        <div class="row m-0 p-0 shadow">
            <div class="col-sm-2 p-2 sticky-top bg-light rounded" style="z-index: 0; top: 75px; margin:10px 5px 10px 0px; height:100vh;">
                <h5 class="mt-2 mx-3">Filters</h5>
                <hr />
                <form method="post">
                    <label class="px-2" for="sel">Sort By :</label>
                    <select class="form-control mt-2" id="sel">
                        <option>Popularity</option>
                        <option>Relevance</option>
                        <option>Price : Low to High</option>
                        <option>Price : High to Low</option>
                    </select>
                    <hr>
                    <label class="px-2" for="prc">Price :</label>
                    <input type="number" class="form-control" min="0" placeholder="Enter Maximum Price in Rs." />
                    <hr>

                    <label class="px-2 mb-1" for="cot">Category :</label>
                    <select class="form-control mt-2" id="cot">
                        <option>Tech Product</option>
                        <option>Accessories</option>
                        <option>Mobile Phones</option>
                        <option>Laptop</option>
                        <option>TV</option>
                    </select>
                    <hr />
                    <label class="px-2 mb-1" for="br">Brand :</label>
                    <select class="form-control mt-2" id="br">
                        <option>Apple</option>
                        <option>Xiaomi</option>
                        <option>Oppo</option>
                        <option>Vivo</option>
                        <option>IQOO</option>
                        <option>Realme</option>
                        <option>Samsung</option>
                        <option>LAVA</option>
                        <option>Motorola</option>
                        <option>Infinix</option>
                    </select>
                    <hr />
                    <label class="px-2 mb-1" for="ctr">Customer Ratings :</label>
                    <select class="form-control mt-2 px-3" id="ctr">
                        <option>5⭐ </option>
                        <option>4⭐ </option>
                        <option>3⭐ </option>
                        <option>2⭐ </option>
                        <option>1⭐ </option>
                    </select>
                </form>
            </div>
            <div class="col-sm bg-light rounded" style="margin:10px 0px 10px 5px;">
            
    <?php

    for ($i = 0; $i < 10; $i++)
    {
        echo ' 
        <!-- ---------------Product Show Box ------------------------------------->
                <div class="row mt-2 mb-2 px-2 border-bottom">
                    <div class="col-sm-3 py-2" style="width:240px; height:240px;">
                        <img src="itemsImage\-original-imahaff2rbuykhcw.webp" class=" border rounded shadow"
                            style="width:auto; height:auto; max-height: 100%; max-width:100%; object-fit: contain;">
                    </div>
                    <div class="col-sm-6 py-3 mb-4">
                        <h5 class="hover-text-primary" id="product-name">Realme P3 5G (Space Silver, 256 GB) (8 GB RAM)</h5>
                        <hr />
                        <ul>
                            <li>7000mAh 5-Years Durable Battery</li>
                            <li>80W SUPERVOOC Charger</li>
                            <li>Snapdragon 6 Gen 4</li>
                            <li>7.9L+ AnTuTu Score</li>
                            <li>Vapour Cooling Chamber</li>
                        </ul>
                    </div>
                    <div class="col-sm-3 p-3 mb-4">
                        <h4 class="px-2">₹18,499</h4>
                        <ul>
                            <li class="text-success">In Stock</li>
                            <li>Offers Availabile</li>
                            <li>Fast Delivery</li>
                            <ul>
                    </div>
                </div>
        <!-- --------------------------------------------------------------------------- -->
    ';}
    ?>

            </div>
        </div>
    </div>
</body>

</html>