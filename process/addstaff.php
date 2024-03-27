<?php

require_once('dbh.php');
require_once('session.php');

if (isset($_POST["btnadd"])) {
    if ($_SESSION['role'] != "Store") {
        $result = mysqli_query($conn, "INSERT INTO `tbl_staff` (`u_id`, `staffame`, `staff_address`, `email_id`, `password`, `contact`, `status`, `st_joiningdate`, `st_salary`, `st_position`) values ('" . $_POST['storeid'] . "', '" . $_POST["staffName"] . "', '" . $_POST["staffAddress"] . "', '" . $_POST["staffEmail"] . "', '" . $_POST["staffPassword"] . "', '" . $_POST["staffPhone"] . "', 'Active', '" . $_POST["joiningDate"] . "', '" . $_POST["staffSalary"] . "', '" . $_POST["staffPostion"] . "')") or die(mysqli_error($conn));
    } else {
        $result = mysqli_query($conn, "INSERT INTO `tbl_staff` (`u_id`, `staffame`, `staff_address`, `email_id`, `password`, `contact`, `status`, `st_joiningdate`, `st_salary`, `st_position`) values ('" . $_SESSION['id'] . "', '" . $_POST["staffName"] . "', '" . $_POST["staffAddress"] . "', '" . $_POST["staffEmail"] . "', '" . $_POST["staffPassword"] . "', '" . $_POST["staffPhone"] . "', 'Active', '" . $_POST["joiningDate"] . "', '" . $_POST["staffSalary"] . "', '" . $_POST["staffPostion"] . "')") or die(mysqli_error($conn));
    }

    if ($result == true) {
        $_SESSION['status'] = "Your Staff Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../add-staff.php");
    } else {
        $_SESSION['status'] = "Your Staff Not Added!";
        $_SESSION['status_code'] = "error";
        header("Location:../add-staff.php");
    }
}
