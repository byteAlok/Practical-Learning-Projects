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
        <div class="col-sm-6 bg-light p-4 mt-2 mb-2 border rounded">
            <h1 class="text-center text-success">Find Your Data</h1>
            <form method="post" action="">
                <input class="form-control" name="id" placeholder="Enter Your ID" required/>
                <input type="submit" value="Find Data " class="form-control mt-2 mb-2 bg-success text-light"
                    name="btn2" />

            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <?php
        if (isset($_POST['btn2']))
        {
            $id = $_POST['id'];
        
            $sql = "SELECT * FROM `student` WHERE emp_id = $id";

            $res = mysqli_query($connection, $sql);

            $num = mysqli_num_rows($res);
            // echo $num;
            if ($num > 0)
            {
                $row = mysqli_fetch_assoc($res)

    ?>

    <div class="row m-0 p-0">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 bg-light border rounded mt-4 ">
            <h1 class="text-center mt-4" style="color: teal;"> Updation Form</h1>
            <form method="post" action="">
                <input type="hidden" value="<?php echo $row['stu_id'] ?>" name="form_id" placeholder="Form ID"
                    class="form-control mb-2" />
                <label>Enter Name</label>
                <input type="text" value="<?php echo $row['stu_name'] ?>" name="fullname" placeholder="Your Full Name"
                    class="form-control mb-2" />
                <label>Enter Address</label>
                <input type="text" value="<?php echo $row['stu_address'] ?>" name="address" placeholder="Your Address"
                    class="form-control mb-2" />
                <label>Enter Phone</label>
                <input type="text" value="<?php echo $row['stu_phone'] ?>" name="phone" placeholder="Your Phone Number"
                    class="form-control mb-2" />
                <label>Enter Email</label>
                <input type="text" value="<?php echo $row['stu_email'] ?>" name="email" placeholder="Your Email"
                    class="form-control mb-2" />
                <input type="submit" class="form-control text-light mt-2 mb-4" value="Update"
                    style="background-color: teal;" name="btn" />
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <?php
       }    
    }
    
    ?>

    <?php
        if (isset($_POST['btn']))
        {
            $myid = $_POST['form_id'];
            $name = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
             
            $sql = "UPDATE `student` SET `stu_name` = '$name', `stu_address` = '$address', `stu_phone` = '$phone', `stu_email` = '$email,' WHERE `student`.`stu_id` = $myid;";

            $res = mysqli_query($connection, $sql);

            if ($res == true)
            {
                echo '<div class="alert alert-success text-center" role="alert">Data Updated Successfully!</div>';
            }
            else 
            {
                echo '<div class="alert alert-danger text-center" role="alert">Data Updation Failed!</div>';
            }
        }
    ?>
</body>

</html>