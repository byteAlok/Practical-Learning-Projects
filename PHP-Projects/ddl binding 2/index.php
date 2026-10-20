<?php
    require "connection.php";
    $selected_state_id = isset($_POST['state']) ? (int)$_POST['state'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row m-0 p-0">
        <div class="col-sm-8">
    <form method="post">
        <select id="state" name="state" class="form-control">
            <option>Select State</option>
                <?php 
                    $sql = "SELECT * FROM `state`";
                    $res = mysqli_query($con, $sql);

                    $num = mysqli_num_rows($res);

                    if ($num > 0)
                    {
                        while ($row = mysqli_fetch_assoc($res))
                        {
                        $selected = ($row['id'] == $selected_state_id ) ? "selected" : "";
                        echo "<option value='$row[id]' $selected>$row[name]</option>";
                        }
                    }   
                
                ?>
        </select>
        <select class="form-control">
            <option>Select City</option>
        
            <?php
                            
                if ($selected_state_id > 0)
                {
                    
                    $sql3 = "SELECT * FROM `cities` WHERE `state_id` = '$selected_state_id'";
                    $res3 = mysqli_query($con, $sql3);
                    $num3 = mysqli_num_rows($res3);

                    if ($num3 > 0)
                    {
                        while ($row3 = mysqli_fetch_assoc($res3))
                        {
                        echo "<option>$row3[name]</option>";
                        }
                    }
                }
                else
                {
                    $sql2 = "SELECT * FROM `cities`";
                    // echo $selected;
                
                    $res2 = mysqli_query($con, $sql2);

                    $num2 = mysqli_num_rows($res2);
                    // echo $num2;
                    if ($num2 > 0)
                    {
                        while ($row2 = mysqli_fetch_assoc($res2))
                        {
                        echo "<option>$row2[name]</option>";
                        }
                    } 
                }




                

            ?>
        </select>
        <input type='submit'/>
    </form>
    <?php
        echo $selected_state_id;
    ?>
        </div>
    </div>
</body>
</html>