<?php 

	include("../config.php");
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);
	$stRecipeid = $data['recipeid'];
	$stRecipename = $data['recipename'];
	$stRecipeyield = $data['recipeyield'];
	$staddedby = $data['addedby'];
	$stRecipeinglist = json_encode($data['recipeinglist']);

	$sql = "UPDATE recipe_table SET `recipe_name` = '$stRecipename', `recipe_yield` = '$stRecipeyield', `recipe_ing` = '$stRecipeinglist' WHERE `recipe_id` = '$stRecipeid' and `added_by` = '$staddedby'";

	if(mysqli_query($conn, $sql))
	{
		echo json_encode(array('message' => 'Record Updated Successfully.', 'status' => true));
	}
	else
	{
		echo json_encode(array('message' => 'Record Not Updated', 'status' => false));
	}

	/*{
	    "recipeingno" : "230190581",
	    "recipename" : "RecipeFi",
	    "recipeyield" : "6",
	    "recipeinglist":[    
	        { 
	        	"ingname": "ingfirst123",
	         	"ingqty": "12",
	          	"ingcost": "30",
	          	"ingunit": "g", 
	          	"ingid": "1", 
	          	"ingoriginalqty": "333",
	          	"inglatestunit": "kg"
	        },
	        { 
	        	"ingname": "ingsecond123",
	         	"ingqty": "12",
	          	"ingcost": "30",
	          	"ingunit": "g", 
	          	"ingid": "2", 
	          	"ingoriginalqty": "230",
	          	"inglatestunit": "kg"
	        }    
	    ]
	}*/
?>