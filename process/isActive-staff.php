<?php

require_once('dbh.php');
require_once('session.php');

$staffId = $_POST['staffId'];
$staffStatus = $_POST['selStatus'];
$staffReson = $_POST['staffReson'];
echo $staffId;
echo $staffStatus;
echo $staffReson;
$sql = "UPDATE `tbl_users` SET `u_status`= concat(`u_status`,'\n','$staffStatus'), `u_reson`= concat(`u_reson`,'\n','$staffReson') where `u_id`='$staffId'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$_SESSION['status'] = "Status Change Successfully";
$_SESSION['status_code'] = "success";
header("Location:../view-staff.php");