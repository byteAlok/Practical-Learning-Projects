<?php
    require "connection.php";
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
<body class="bg-light">
    <div class="row m-0 p-0">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 bg-info border rounded">
            <h2 class="text-center text-dark mt-2 mb-2">State & City Selection</h2>
            <select class="form-control mb-4">
                <option>Select Your State</option>
                <?php 
                    $sql = "SELECT * FROM `state`";
                    $res = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($res);

                    if ($num > 0)
                    {
                        while ($row = mysqli_fetch_assoc($res))
                        {
                            $selected = ($row['id'] == $selected_state_id ?  : );
                        }
                    }
                
                ?>
            </select>

            <select class="form-control mb-4">
                <option>Select Your City</option>
                <?php 
                    $sql = "SELECT * FROM `city`";
                    $res = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($res);

                    if ($num > 0)
                    {
                        while ($row = mysqli_fetch_assoc($res))
                        {
                            echo "
                                <option> $row[city_name] </option>
                            
                            ";
                        }
                    }
                
                ?> 
            </select>

        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
</html>