<?php
require "nav.php";
require "connection.php";
?>
<div class="row m-0 p-0">
    <div class="col-sm-2"></div>
    <div class="col-sm-8  mt-5">
        <table class="table table-primary table-striped mt-3">
            <tr class="bg-info">
                <th>User Id</th>
                <th>User Name</th>
                <th>User Phone</th>
                <th>User Email</th>
                <th>User Address</th>
                <th>User Photo</th>
                <th>Actions</th>
            </tr>
            <?php
        $sql="select * from user";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
       if($num>0){
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row["user_id"]."</td>
            <td>".$row["user_name"]."</td>
           <td>".$row["user_phone"]."</td>
           <td>".$row["user_email"]."</td>
           <td>".$row["user_address"]."</td>
           <!-- <td><img src=".'upimg/'.$row["user_photo"]." height='100px' width= '100px'></td> -->
           <td><img src='upimg/$row[user_photo]' height='100px' width= '100px'></td>
           
           <td>
                <button> Delete </button>
                <button> Update </button>
           </td>
           </tr>";
           
           
          
        }
       }
        
        ?>
        </table>
    </div>
    <div class="col-sm-2"></div>
</div>