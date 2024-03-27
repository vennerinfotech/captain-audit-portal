<?php
require_once('dbh.php');
require_once('session.php');
if (isset($_POST["btnadd"])) {
    $userRole = ($_POST['txtRole'] != "" ? $_POST['txtRole'] : "" );
    $notification = ($_POST['txtNotification'] != "" ? $_POST['txtNotification'] : "" );
    $result = mysqli_query($conn, "INSERT INTO `user_notification`(`n_title`, `n_role`) values ('$notification', '$userRole')") or die(mysqli_error($conn));
    if ($result == true) {
        $_SESSION['status'] = "Notification Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../view-notification.php");
    } else {
        $_SESSION['status'] = "Notification Not Added !";
        $_SESSION['status_code'] = "error";
        header("Location:../add-notification.php");
    }
}
