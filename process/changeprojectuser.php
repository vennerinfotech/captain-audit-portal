<?php
	require_once ('dbh.php');
	require_once ('session.php');
	//$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$pid = $_GET['pid'];
	$username = $_POST['username'];
	$substatus = $_POST['substatus'];
	$prooftext = $_POST['prooftext'];
	//echo "$date";
	$sql = "UPDATE `project` SET `u_id`='$username', `status`='$substatus', `proof_info`='$prooftext', `subdate`='' WHERE pid = '$pid';";
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