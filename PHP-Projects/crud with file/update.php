<?php
require "nav.php";
require "connection.php";
?>
<div class="row m-0 p-0 mt-2">
  <div class="col-sm-3"></div>
  <div class="col-sm-6 bg-light">
    <h1 class="text-center ">Find Data</h1>
    <form method="POST" action="">
      <input type="text" class="form-control" name="id" placeholder="Enter Your ID">
      <button type="submit" class="btn btn-danger mt-3 w-100" name="btn">Click</button>
    </form>
  </div>
  <div class="col-sm-3"></div>
</div>
<?php 
if(isset($_POST["btn"]))
{
    $id=$_POST["id"];
    echo $id;
    $sql="Select * from user where user_id = '$id'";
    $result=mysqli_query($con,$sql);
     while($row=mysqli_fetch_assoc($result)){

   
?>

<div class="row m-0 p-0">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
    <h1 class=text-center>Insert data</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" class="form-control" name="id" value="<?php echo $row['user_id'] ?>" >
      <label>Username</label>
      <input type="text" name="name" id="" class="form-control" value="<?php echo $row['user_name'] ?>">
      <label>UserEmail</label>
      <input type="text" name="mail" id="" class="form-control" value="<?php echo $row['user_email'] ?>">
      <label>UserPhone</label>
      <input type="text" name="phone" id="" class="form-control" value="<?php echo $row['user_phone'] ?>">
      <label>UserAddress</label>
      <input type="text" name="add" id="" class="form-control" value="<?php echo $row['user_address'] ?>">
      <label>Userphoto</label>
      <input type="file" name="image" id="" class="form-control">
      <img src="upimg/<?php echo $row['user_photo'] ?>" height='50px'>
      <input type="submit" value="insert" class="btn btn-primary w-100 mt-2 " name="btn1">
    </form>
  </div>
  <div class="col-sm-3"></div>
</div>

<?php
  }
}
?>

<?php
if(isset($_POST["btn1"]))
{
  $id=$_POST["id"];
  $name=$_POST["name"];
  $add=$_POST["add"];
  $phone=$_POST["phone"];
  $Email=$_POST["mail"];

   $filename=$_FILES['image']['name'];
  $tmp=$_FILES['image']['tmp_name'];
  $folder="upimg/".$filename;

  if(move_uploaded_file($tmp,$folder))
  {
  $sql="UPDATE `user` SET `user_name` = '$name', `user_phone` = '$phone', `user_address` = '$add', `user_photo` = '$filename' WHERE `user`.`user_id` = $id;";
  $res=mysqli_query($con,$sql);

  if($res==true)
  {
    echo "Data is update Successfully!!";
  }
  else
  {
    echo "Data is not update";
  }
}
echo $id;
}


?>