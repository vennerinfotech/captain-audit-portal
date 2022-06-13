<?php
//including the database connection file
include("process/dbh.php");
include("session.php");

//getting id of the data from url
$id = $_GET['id'];
$token = $_GET['token'];

//deleting the row from table
$result = mysqli_query($conn, "UPDATE `tbl_userleave` SET `ul_status`='Cancelled' WHERE ul_uid = $id AND ul_id = $token;");
if($result==true){
	$_SESSION['status'] = " Leave Canceled Successfully";
    $_SESSION['status_code'] = "success";
	header("Location:emp-leaveapprove.php");
}
else
{ 
	$_SESSION['status'] = "Leave Canceled";
    $_SESSION['status_code'] = "error";
	header("Location:emp-leaveapprove.php");
}

//redirecting to the display page (index.php in our case)

?>