<?php
	require_once ('process/dbh.php');
	require_once ('process/session.php');
	//$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$pid = $_GET['pid'];
	$id = $_GET['uid'];
	$date = date('Y-m-d');
	//echo "$date";
	$sql = "UPDATE `tbl_personaltask` SET `subdate`='$date',`status`='Submitted' WHERE pt_id = '$pid' and u_id='$id';";
	$result = mysqli_query($conn , $sql);

	if($result==true){

	$_SESSION['status'] = " Task Submitted Successfully";
    $_SESSION['status_code'] = "success";
	header("Location: personaltask.php");
}
else
{ 
	$_SESSION['status'] = "Task Not Submitted Successfully";
    $_SESSION['status_code'] = "error";
	header("Location: personaltask.php");
}
	
?>