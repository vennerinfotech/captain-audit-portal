<?php
require_once('dbh.php');
require_once('session.php');
//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$userId = $_POST['selectedEmployee'];
$outlet = $_POST['outletId'];
$taskName = $_POST['TaskName'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
//echo "$date";
// echo $userId;
// echo $outlet;
$sql = " INSERT INTO `project`(`u_id`, `pname`, `startdate` , `duedate`, `status`, `outlet_id`, `assige_by`) 
        VALUES ('$userId', '$taskName', '$startDate', '$endDate', 'Due', '$outlet', '".$_SESSION['id']."')";
$result = mysqli_query($conn, $sql);

if ($result == true) {
    $_SESSION['status'] = " Your Data Successfully Updated";
    $_SESSION['status_code'] = "success";
    header("Location: ../view-request.php");
} else {
    $_SESSION['status'] = "Your Data Not Updated!";
    $_SESSION['status_code'] = "error";
    header("Location: ../view-request.php");
}
