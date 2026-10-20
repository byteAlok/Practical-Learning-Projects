<?php
require "nav.php";
require "connection.php";
?>

<div class="row m-0 p-0 mt-2">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 bg-light">
        <h1 class="text-center text-danger">Delete Data</h1>
        <form method="POST" action="">
            <input type="text" class="form-control" name="id" placeholder="Enter Your ID">
            <button type="submit" class="btn btn-danger mt-3 w-100">Delete</button>
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $id=$_POST["id"];
    // echo $id;

    $sql="delete from user where user_id = '$id'";

    $result=mysqli_query($con,$sql);

    if($result)
    {
        echo "data delete successfully!!";

    }
    else{
        echo "Data Deletion Failed!!";
    }
}

?>