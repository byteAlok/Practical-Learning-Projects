<?php
    require "asset/nav.php";
    require "asset/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row m-0 p-0 ">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 bg-light p-4 mt-4">
            <h2 class="text-center text-success">Form</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control mb-2" placeholder="Product Name"/>
                <label>Product Price</label>
                <input type="text" name="price" class="form-control mb-2" placeholder="Product Price"/>
                <label>Product Description</label>
                <input type="text" name="des" class="form-control mb-2" placeholder="Product Description"/>
                <label>Product Cost</label>
                <input type="text" name="cost" class="form-control mb-2" placeholder="Product Cost"/>
                <label>Product Image</label>
                <input type="file" name="image" class="form-control mb-2" />

                <input type="submit" class="form-control bg-success text-light mb-2" value="Submit"/>

            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $pName = $_POST['name'];
        $price = $_POST['price'];
        $des = $_POST['des'];
        $cost = $_POST['cost'];

        $fileName = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];   
        $folder = "upimg/".$fileName;

        if (move_uploaded_file($temp, $folder))
        {
            $sql = "INSERT INTO `cart` (`pro_name`, `pro_price`, `pro_des`, `pro_cost`, `pro_image`) VALUES ('$pName', '$price', '$des', '$cost', '$fileName');";

            $res = mysqli_query($con, $sql);

            if ($res)
            {
                echo "Data Inserted Successfully!";
            }
        }
    }

?>
</html>
