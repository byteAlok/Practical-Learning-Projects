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
</head>
<?php
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $database = "company";

        $connection = mysqli_connect($serverName, $userName, $password, $database);
        // echo "Database Connected Successfully!";
 

    ?>

<body>
    <div class="row m-0 p-0">
        <div class="col-sm-12 m-0 p-0 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">CRUD</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="http://localhost/crud/insert.php">Create</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="http://localhost/crud/show.php">Read</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="http://localhost/crud/update.php">Update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="http://localhost/crud/delete.php">Delete</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>

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
        
            $sql = "SELECT * FROM `employee` WHERE emp_id = $id";

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
                <input type="hidden" value="<?php echo $row['emp_id'] ?>" name="form_id" placeholder="Form ID"
                    class="form-control mb-2" />
                <label>Enter Name</label>
                <input type="text" value="<?php echo $row['emp_name'] ?>" name="fullname" placeholder="Your Full Name"
                    class="form-control mb-2" />
                <label>Enter Email</label>
                <input type="text" value="<?php echo $row['emp_email'] ?>" name="email" placeholder="Your Email"
                    class="form-control mb-2" />
                <label>Enter Phone</label>
                <input type="text" value="<?php echo $row['emp_phone'] ?>" name="phone" placeholder="Your Phone Number"
                    class="form-control mb-2" />
                <label>Enter Address</label>
                <input type="text" value="<?php echo $row['emp_address'] ?>" name="address" placeholder="Your Address"
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
             
            $sql = "UPDATE `employee` SET `emp_name` = '$name', `emp_phone` = '$phone', `emp_address` = '$address', `emp_email` = '$email' WHERE `employee`.`emp_id` = $myid;";

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