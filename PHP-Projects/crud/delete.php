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
        <div class="col-sm-6 border rounded mt-4">
            <h1 class="text-center mt-4" style="color: red;">Data Deletion Form</h1>
            <form method="post" action="">
                <label>Enter ID or Name</label>
                <input type="text" name="fullname" placeholder="Your only FullName or ID" class="form-control mb-2" />
                <input type="submit" class="form-control bg-danger mt-2 mb-4 text-light " value="Delete" />
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$database = "Company";

$connection = mysqli_connect( $serverName, $userName, $password, $database );
// echo "Database Connected Successfully!";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["fullname"];

    $sqlQuery = "DELETE FROM `employee` WHERE `employee`.`emp_name` = '$name' OR `employee`.`emp_id` = '$name'";
    
    $res = mysqli_query($connection, $sqlQuery);
    

    if ($res)
    {

        echo '<div class="alert alert-danger text-center" role="alert">Data Deleted Successfully!</div>';
    }
    else
    {
        echo '<div class="alert alert-danger text-center" role="alert">Data Deletion Failed!</div>';
    }
}







?>

</html>