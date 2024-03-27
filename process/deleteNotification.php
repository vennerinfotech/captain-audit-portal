<?php
require_once('dbh.php');
require_once('session.php');

$recordId = ($_GET['id'] != "" ? $_GET['id'] : "");
if ($recordId != 0 || $recordId != "") {
    $result = mysqli_query($conn, "DELETE FROM `user_notification` WHERE `n_id`='$recordId' ") or die(mysqli_error($conn));
    if ($result) {
        $_SESSION['status'] = " Your Data Deleted Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: ../view-notification.php");
    } else {
        $_SESSION['status'] = "Your Data Not Deleted !";
        $_SESSION['status_code'] = "error";
        header("Location: ../view-notification.php");
    }
} else {
    $_SESSION['status'] = "Kindly Select Record First!";
    $_SESSION['status_code'] = "error";
    header("Location: ../view-notification.php");
}
