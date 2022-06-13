<?php
	require_once ('process/dbh.php');
	//$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$pid = $_GET['pid'];
	$id = $_GET['uid'];
	$date = date('Y-m-d');
	//echo "$date";
	$sql = "UPDATE `project` SET `subdate`='$date',`status`='Submitted' WHERE pid = '$pid';";
	$result = mysqli_query($conn , $sql);
	header("Location: emp-projectassign.php");
?>