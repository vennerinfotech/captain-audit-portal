<?php
	require_once ('../process/dbh.php');
require_once ('../session.php');
	//$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$pid = $_GET['pid'];
	$id = $_POST['username'];
	//echo "$date";
	$sql = "UPDATE `project` SET `u_id`='$id' WHERE pid = '$pid';";
	$result = mysqli_query($conn , $sql);
	if($result==true){
	$_SESSION['status'] = " Your Data Successfully Updated";
    $_SESSION['status_code'] = "success";
	header("Location: ../emp-projectassign.php");
}
else
{ 
	$_SESSION['status'] = "Your Data Not Updated!";
    $_SESSION['status_code'] = "error";
	header("Location: ../emp-projectassign.php");
}

?>