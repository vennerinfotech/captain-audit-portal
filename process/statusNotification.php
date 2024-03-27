<?php
require_once('dbh.php');
require_once('session.php');

$status = ($_GET['status'] != "0" ? "0" : "1");
$recordId = ($_GET['id'] != "" ? $_GET['id'] : 0);

if ($recordId != 0 || $recordId != "") {
    $result = mysqli_query($conn, "UPDATE `user_notification` set `n_status`='$status' WHERE `n_id`='$recordId' ") or die(mysqli_error($conn));
    if ($result) {
        $_SESSION['status'] = " Your Data Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: ../view-notification.php");
    } else {
        $_SESSION['status'] = "Your Data Not Updated Successfully!";
        $_SESSION['status_code'] = "error";
        header("Location: ../update-notification.php?id=" . $recordId);
    }
} else {
    $_SESSION['status'] = "Kindly Select Record First!";
    $_SESSION['status_code'] = "error";
    header("Location: ../view-notification.php");
}
