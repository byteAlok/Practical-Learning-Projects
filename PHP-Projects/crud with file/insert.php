<?php
  require "nav.php";
  require "connection.php";
?>

<div class="row m-0 p-0">
  <div class="col-sm-3"></div>

  <div class="col-sm-6 bg-light">
    <h1 class="text-center text-primary">Insert Data</h1>
    <form action="" method="post" enctype="multipart/form-data">

      <label for="username">UserName</label>
      <input type="text" name="name" id="username" class="form-control mb-2" placeholder="Your UserName">

      <label for="email">UserEmail</label>
      <input type="text" name="mail" id="email" class="form-control mb-2" placeholder="Your Email">

      <label for="phone">UserPhone</label>
      <input type="text" name="phone" id="phone" class="form-control mb-2" placeholder="Your Phone">

      <label for="address">UserAddress</label>
      <input type="text" name="add" id="address" class="form-control mb-2" placeholder="Your Address">

      <label for="pics">UserPhoto</label>
      <input type="file" name="image" id="pics" class="form-control mb-2">

      <input type="submit" value="Insert" class="btn btn-primary w-100 mt-2">

    </form>
  </div>

  <div class="col-sm-3"></div>
</div>


<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $name = $_POST["name"];
    $Email = $_POST["mail"];
    $phone = $_POST["phone"];
    $add = $_POST["add"];

    $filename=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    $folder="upimg/".$filename;

    if($res = move_uploaded_file($tmp,$folder))
    {
      $sql="INSERT INTO `user` ( `user_name`, `user_email`, `user_phone`, `user_address`, `user_photo`) VALUES ( '$name', '$Email', '$phone', '$add', '$filename');";

      $res = mysqli_query($con,$sql);

      if($res == true)
      {
        echo "data insert successfully";
      }
      else
      {
        echo "data not insert successfully";
      }
    }
  }
?>