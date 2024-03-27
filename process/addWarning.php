<?php

require_once('dbh.php');
require_once('session.php');
date_default_timezone_set('Asia/Kolkata');
$empployeeDetail = ($_POST['txtEmployee'] != "") ? $_POST['txtEmployee'] : 0;
$warnigDetail = ($_POST['txtWarning'] != "") ? $_POST['txtWarning'] : "";
$detail = explode("_", $empployeeDetail);
$empId = $detail[0];
$empName = $detail[1];
$date = date('Y-m-d\TH:i');


if (isset($_POST["btnadd"])) {

    $result = mysqli_query($conn, "INSERT INTO `tbl_warning` (`w_warning`, `w_uid`, `w_uname`, `created_at`) values ('$warnigDetail', '$empId', '$empName', '$date')") or die(mysqli_error($conn));
    if ($result == true) {
        $_SESSION['status'] = "Warning Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../view-warning.php");
    } else {
        $_SESSION['status'] = "Warning Not Added!";
        $_SESSION['status_code'] = "error";
        header("Location:../add-warning.php");
    }
}
