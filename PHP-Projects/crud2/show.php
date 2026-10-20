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
        <div class="col-sm-2"></div>
        <div class="col-sm-8 mt-4">
        <h2 class="text-center text-success bg-light">Student Table</h2>
            <table class="table table-success table-striped">
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Address</th>
                    <th>Student Phone</th>
                    <th>Student Email</th>
                </tr>
    <?php 
        $sql = "SELECT * FROM `student`";

        $res = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($res);

        if ($num > 0)
        {
            while ($row = mysqli_fetch_assoc($res))
            {
                // echo $row['emp_id'];
            echo   "<tr>
                    <td> {$row['stu_id']} </td>
                    <td> {$row['stu_name'] }</td>
                    <td> {$row['stu_address']} </td>
                    <td> {$row['stu_phone']} </td>
                    <td> {$row['stu_email']} </td>
                    </tr>";

            }
        }

    ?>

            </table>
        </div>
        <div class="col-sm-2"></div>

    </div>
</body>
</html>