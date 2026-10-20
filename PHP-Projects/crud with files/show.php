<?php
    require "nav.php";
    require "connection.php";
?>

<div class="row m-0 p-0 ">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h2 class="text-center text-success bg-light">Database Table</h2>
        <table class="table table-success table-striped">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th>User Address</th>
                <th>User Photo</th>
                <th>Actions</th>
            </tr>
            <?php

            $sql = "SELECT * FROM `user`";
            $result = mysqli_query($connection, $sql);
            $num = mysqli_num_rows($result);

            if ($num > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo " <tr>
                                <td>$row[user_id]</td>
                                <td>{$row['user_name']}</td>
                                <td>{$row['user_email']}</td>
                                <td>{$row['user_phone']}</td>
                                <td>{$row['user_address']}</td>
                                <td><img src='upimg/$row[user_photo]' height=60 /></td>
                                <td>
                                <form method='post' action=''>
                                    <input type='text' name='uid' value='$row[user_id]' />
                                    <input type='submit' name='deleteBtn' value='Delete'/>

                                    <!-- Button trigger modal -->
                                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Update</button>
                                </form> 
                                </td>
                            </tr>";
                }
            }

        ?>

        </table>

    </div>
    <div class="col-sm-2"></div>
</div>

<!-- Modal -->
<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h2 class='modal-title ' id='exampleModalLabel'>Updation Form</h2>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        
        <form method="post" action="" enctype="multipart/form-data">
            <label>User ID</label>
            <input type="text" value="<?php echo "$row[user_id]" ?>" name="userid" class="form-control"/>
            <label>Name</label>
            <input type="text" value="<?php echo "$row[user_name]" ?>" name="Uname" class="form-control mb-2" placeholder="Your Full Name" required/>
            <label>Email</label>
            <input type="text" value="<?php echo "$row[user_email]" ?>" name="Uemail" class="form-control mb-2" placeholder="Your Email" required/>
            <label>Phone</label>
            <input type="text" value="<?php echo "$row[user_phone]" ?>" name="Uphone" class="form-control mb-2" placeholder="Your Phone Number" required/>
            <label>Address</label>
            <input type="text" value="<?php echo "$row[user_address]" ?>" name="Uaddress" class="form-control mb-2" placeholder="Your Address" required/>
            <label>Image</label>
            <input type="file" name="Uimage" class="form-control mb-2" required/>
            <img src='upimg/<?php "$row[user_photo]" ?>' height=60 />

            <input type="submit" name="updateBtn" value="Submit" class="form-control mb-2 text-light bg-success"/>
        </form>

      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary'>Save changes</button>
      </div>
    </div>
  </div>
</div>




<?php

    if (isset($_POST['deleteBtn']))
    {
    
    $id = $_POST['uid'];

    $sql = "DELETE FROM `user` WHERE `user`.`user_id` = $id";
    $res = mysqli_query($connection, $sql);
    // $data = mysqli_num_rows($res);

    if ( $res)
    {
        echo '<div class="alert alert-success text-center" role="alert">Data Deleted Successfully!</div>';
    }
    else
    {
        echo '<div class="alert alert-danger text-center" role="alert">Data Deletion Failed!</div>';

    }
    }
?>

<?php
    if (isset($_POST['updateBtn']))
    {
        $upid = $_POST['userid'];

        $sql = "SELECT * FROM `user` WHERE `user`.`user_id` = '$upid'";


        $upid = $_POST['userid'];
        $upName = $_POST['Uname'];
        $upEmail = $_POST['Uemail'];
        $upPhone = $_POST['Uphone'];
        $upAddress = $_POST['Uaddress'];

        $sql_hffjffj2 = "INSERT INTO `user` (`user_name`, `user_email`, `user_phone`, `user_address`, `user_photo`) VALUES ('$upName', '$upEmail', '$upPhone', '$upAddress', 'texture (2).jpg');";
    }

?>