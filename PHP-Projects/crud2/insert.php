<?php 
    require "nav.php";
    require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row m-0 p-0">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 bg-light p-4 rounded">
            <h2 class="text-center text-success">Student Registration Form</h2>
            <form method="post" action="">
                <label>Enter Name</label>
                <input type="text" class="form-control mb-3 " name="fullname" placeholder="Your Full Name"/>
                <label>Enter Phone Number</label>
                <input type="text" class="form-control mb-3 " name="phone" placeholder="Your Phone Number"/>
                <label>Enter Email</label>
                <input type="text" class="form-control mb-3 " name="email" placeholder="Your Email"/>
                <label>Enter Address</label>
                <input type="text" class="form-control mb-3 " name="address" placeholder="Your Address"/>

                <input type="submit" class="form-control bg-success text-light" name="btn" value="Submit"/>

            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <?php 

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name = $_POST["fullname"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $address = $_POST["address"];

            $sql = "INSERT INTO `student` (`stu_name`, `stu_address`, `stu_phone`, `stu_email`) VALUES ('$name', '$address', '$phone', '$email');";

            $res = mysqli_query($connection, $sql);

            if ($res)
            {
                echo "Data Inserted Successfully!";
            }
            else
            {
                echo "Data Insertion Failed!";
            }
        } 

    ?>

</body>
</html>