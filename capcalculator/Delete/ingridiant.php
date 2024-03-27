<?php 

	include("../config.php");
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);

	$stId = $data['ingid'];
	$staddedby = $data['addedby'];

	$sql = "UPDATE ing_table SET `ing_isdeleted` = '1' WHERE `ing_id` = '$stId' and `added_by` = '$staddedby'";

	if(mysqli_query($conn, $sql))
	{
		echo json_encode(array('message' => 'Record Deleted Successfully.', 'status' => true));
	}
	else
	{
		echo json_encode(array('message' => 'Record Not Deleted', 'status' => false));
	}

	/*{
	    "ingid" : "5",
	    "ingname" : "Ingridiant3",
	    "ingqty" : "40",
	    "ingcost" : "30",
	    "ingunit" : "kg"
	}*/

?>