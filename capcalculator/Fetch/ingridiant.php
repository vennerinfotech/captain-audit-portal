<?php 

	include("../config.php");
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);
	
	$staddedby = $data['addedby'];

	$sql = "SELECT * FROM ing_table WHERE `ing_isdeleted` = '0' and `added_by` = '$staddedby'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)
	{
		$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($output);
	}
	else
	{
		echo json_encode(array('message' => 'Record Not Found', 'status' => false));
	}

	/*{
	    "ingname" : "aaa",
	    "ingqty" : "bbb",
	    "ingcost" : "ccc",
	    "ingunit" : "ddd"
	}*/

?>