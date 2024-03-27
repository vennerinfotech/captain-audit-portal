<!-- [ Session ] start -->
<?php
require_once('dbh.php');
require_once('session.php');
//getting id of the data from url
$uid = $_GET['id'];
$sql = "UPDATE `tbl_complain` SET `status`='Accepted' WHERE `com_id` = '$uid'";

$result = mysqli_query($conn, $sql);
if ($result == true) {
	$_SESSION['status'] = "Request Accepted Successfully";
	$_SESSION['status_code'] = "success";
	header("Location:../view-request.php");
} else {
	$_SESSION['status'] = "Request Not Accepted";
	$_SESSION['status_code'] = "error";
	header("Location:../view-request.php");
}

//redirecting to the display page (index.php in our case)

?>