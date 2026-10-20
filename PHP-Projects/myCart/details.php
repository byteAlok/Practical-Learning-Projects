<?php 
    session_start();
    require "connection.php";
    require "navbar.php";

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
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid mt-4">
    <div class="row m-0 bg-light p-2 rounded shadow">
        
        <!-- Left Side: Images -->
        <div class="col-sm-5 d-flex flex-column align-items-center mt-2 mb-4">
            <img src="itemsImage\-original-imahaff2rbuykhcw.webp" class=" border rounded shadow mb-3" style="max-height: 400px; object-fit: contain;">
            <!-- Small Thumbnails (dummy) -->
            <div class="d-flex gap-2">
                <img src="images/college girl.jpg" width="60" class="rounded">
                <img src="images/college girl.jpg" width="60" class="rounded">
                <img src="images/college girl.jpg" width="60" class="rounded">
            </div>
            
        </div>

        <!-- Right Side: Details -->
        <div class="col-sm-7 mt-2 mb-4">
            <h4><?= $product['name'] ?></h4>
            <h3 class="text-primary">₹<?= number_format($product['price']) ?> </h3>
            <h6 class="">Availability - <?= $product['availability'] ?></h6>

            <hr>
            <h6>Highlights</h6>
            <ul>
                <?php foreach($product['highlights'] as $point): ?>
                    <li><?= $point ?></li>
                <?php endforeach; ?>
            </ul><hr/>
            <p><strong>Delivery Features</strong></p>
            <ul>
                <li>Availabile Cash on Delivery</li>
                <li>Emi option availabile</li>
                <li>Special price inclusive of coupon</li>
            </ul>
            <div class="mt-4 d-flex gap-3">
                <button class="btn btn-success btn-lg px-4">Add to Cart</button>
                <button class="btn btn-danger btn-lg px-4">Buy Now</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
