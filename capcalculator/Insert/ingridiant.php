<?php 

	include("../config.php");
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);
	$stIngname = $data['ingname'];
	$stIngqty = $data['ingqty'];
	$stIngcost = $data['ingcost'];
	$stIngunit = $data['ingunit'];
	$staddedby = $data['addedby'];

	$sql = "INSERT INTO ing_table(`ing_name`, `ing_qty`, `ing_cost`, `ing_unit`, `ing_isdeleted`, `added_by`) VALUES('$stIngname', '$stIngqty', '$stIngcost', '$stIngunit', '0', '$staddedby')";

	if(mysqli_query($conn, $sql))
	{
		echo json_encode(array('message' => 'Record Inserted Successfully.', 'status' => true));
	}
	else
	{
		echo json_encode(array('message' => 'Record Not Inserted', 'status' => false));
	}
?>