<?php
    require "nav.php";
    require "connection.php";
?>

<div class="row m-0 p-0">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 bg-light p-4">
        <h2 class="text-center text-success">Registration Form</h2>

        <form method="post" action="" enctype="multipart/form-data">
            <label>Name</label>
            <input type="text" name="fullname" class="form-control mb-2" placeholder="Your Full Name" required/>
            <label>Email</label>
            <input type="text" name="email" class="form-control mb-2" placeholder="Your Email" required/>
            <label>Phone</label>
            <input type="text" name="phone" class="form-control mb-2" placeholder="Your Phone Number" required/>
            <label>Address</label>
            <input type="text" name="address" class="form-control mb-2" placeholder="Your Address" required/>
            <label>Image</label>
            <input type="file" name="image" class="form-control mb-2" required/>

            <input type="submit" value="Submit" class="form-control mb-2 text-light bg-success"/>
        </form>
            
    </div>
    <div class="col-sm-3"></div>
</div>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $fileName = $_FILES["image"]["name"];
        $temp = $_FILES["image"]["tmp_name"];

        $folder = "upimg/".$fileName;

        // $res = move_uploaded_file($temp, $folder);

        echo "FileName :  $fileName <br>";
        echo "Temp : $temp <br>";
        echo "Folder : $folder <br>";
        // echo "Res $res";w

        if (move_uploaded_file($temp, $folder))
        {
            $sql = "INSERT INTO `user` (`user_name`, `user_email`, `user_phone`, `user_address`, `user_photo`) VALUES ('$name', '$email', '$phone', '$address', '$fileName');";

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


        
    }

?>