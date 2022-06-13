<?php 
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);
	$name = $data['sname'];
	$age = $data['sage'];
	$city = $data['scity'];

	include "../process/dbh.php";

	$sql = "INSERT INTO students (sname, sage, scity) VALUES ('$name', '$age', '$city')";

	if(mysqli_query($conn, $sql))
	{
		echo json_encode(array('message' => 'Record Inserted Successfully.', 'status' => true));
	}
	else
	{
		echo json_encode(array('message' => 'Record Not Inserted', 'status' => false));
	}
	
?>