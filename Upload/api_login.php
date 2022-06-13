<?php 
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);
	$stemail = $data['email'];
	$stpassword = $data['password'];

	include "../process/dbh.php";

	$sql = "SELECT * FROM tbl_users WHERE u_email = '$stemail' and u_password = '$stpassword'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)
	{
		echo json_encode(array('message' => 'Login Sucessfully', 'status' => true));
	}
	else
	{
		echo json_encode(array('message' => 'Please check your email id or password', 'status' => false));
	}
	
?>