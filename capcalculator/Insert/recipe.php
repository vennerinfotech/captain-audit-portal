<?php 

	include("../config.php");
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);
	$stRecipename = $data['recipename'];
	$stRecipeyield = $data['recipeyield'];
	$staddedby = $data['addedby'];
	$strecipeing = json_encode($data['recipeinglist']);

	$sql = "INSERT INTO recipe_table (`recipe_name`, `recipe_yield`, `recipe_ing`, `recipe_isdeleted`, `added_by`) VALUES ('$stRecipename', '$stRecipeyield', '$strecipeing', '0', '$staddedby')";

	if(mysqli_query($conn, $sql))
	{
		echo json_encode(array('message' => 'Record Inserted Successfully.', 'status' => true));
	}
	else
	{
		echo json_encode(array('message' => 'Record Not Inserted', 'status' => false));
	}

	/*{
	    "recipename" : "aaa",
	    "recipeyield" : "bbb",
	    "recipeinglist" : [
	    	"ingname" : "ingname",
	    	"ingqty" : "ingqty",
	    	"ingcost" : "ingcost",
	    	"ingunit" : "ingunit",
	    	"ingid" : "ingid",
	    	"ingoriginalqty" : "ingoriginalqty",
	    	"inglatestunit" : "inglatestunit"
	    ]
	}*/
?>