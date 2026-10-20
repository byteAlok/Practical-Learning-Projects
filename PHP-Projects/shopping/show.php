<?php
    require "asset/nav.php";
    require "asset/connection.php";
?>

<div class="row m-0 p-0">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <div class="row m-0 p-2">
            <?php 
                $sql = "SELECT * FROM `cart`";

                $res = mysqli_query($con, $sql);
                $num = mysqli_num_rows($res);

                // echo $num;
                if ($num > 0)
                {
                    while ($row = mysqli_fetch_assoc($res))
                    {
                        echo " 
                                <div class='card' style='width: 18rem;'>
                                <img src='upimg/$row[pro_image]' height='250' class='card-img-top' alt='$row[pro_name]'>
                                <div class='card-body'>
                                <h5 class='card-title'>Name : $row[pro_name]</h5>
                                <p class='card-text'> Price : $row[pro_price] </p>
                                <p class='card-text'>Description : $row[pro_des]</p>
                                <a href='#' class='btn btn-primary'>Buy Now</a>
                                <a href='#' class='btn btn-primary'>Add to cart</a>
                                </div></div> ";

                    }
                }
            

            ?>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>