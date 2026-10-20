<?php
    require "nav.php";
    require "connection.php";
?>

<div class="row m-0 p-0">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 mt-4 p-4 bg-light">
        <h2 class="text-center text-success">Registration Form</h2>
        <form method="post" action="">
            <label>Enrollment ID</label>
            <input type="text" name="sid" placeholder="Enrollment ID" class="form-control mb-2" required/>
            <label>Name</label>
            <input type="text" name="sname" placeholder="Your Full Name" class="form-control mb-2" required/>
            <label>Father Name</label>
            <input type="text" name="fname" placeholder="Your Father Name" class="form-control mb-2" required/>
            <label>Course</label>
            <input type="text" name="course" placeholder="Course Name" class="form-control mb-2" required/>

            <input type="submit" value="Submit" class="form-control mb-2 text-light bg-success"/>

        </form>
    </div>
    <div class="col-sm-3"></div>
</div>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sid = $_POST['sid'];
        $sname = $_POST['sname'];
        $fname = $_POST['fname'];
        $course = $_POST['course'];

        $find = "SELECT * FROM `student` WHERE `student`.`stu_id` = '$sid'";
        $res = mysqli_query($con, $find);
        $checkDB = mysqli_num_rows($res);

        // echo $checkDB;

        if ($checkDB == false)
        {
            $sql = "INSERT INTO `student` (`stu_id`, `stu_name`, `stu_fname`, `stu_course`) VALUES ('$sid',     '$sname', '$fname', '$course');";

            $res = mysqli_query($con, $sql);

            if ($res)
            {
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol></svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>Registration Successfull!</div></div>';
            }
            else 
            {
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol></svg></div>
            <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>Registration Failed!</div></div>';
            }
        }
        else 
        {
            echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol></svg></div>
            <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>Registration Failed : Enrollment ID already exist!</div></div>';
        }


    }

?>