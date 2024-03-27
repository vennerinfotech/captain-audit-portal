<?php

require_once('dbh.php');
require_once('session.php');

$recordId = ($_POST['recordId'] != "") ? $_POST['recordId'] : "";
$warningResponse = ($_POST['txtResponse'] != "") ? $_POST['txtResponse'] : "";
$UpdatedDate = ($_POST['updatedDate'] != "") ? $_POST['updatedDate'] : "";

if (isset($_POST["btnupdate"])) {

    $result = mysqli_query($conn, "UPDATE `tbl_warning` SET `w_notes`='$warningResponse', `updated_at`='$UpdatedDate' WHERE `w_id`='$recordId'") or die(mysqli_error($conn));
    if ($result == true) {
        $_SESSION['status'] = "Warning Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../view-warning.php");
    } else {
        $_SESSION['status'] = "Warning Not Added!";
        $_SESSION['status_code'] = "error";
        header("Location:../view-warning.php");
    }
}
