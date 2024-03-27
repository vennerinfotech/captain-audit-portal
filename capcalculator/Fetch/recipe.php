<?php 

	include("../config.php");
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization');

	$data = json_decode(file_get_contents("php://input"), true);
	
	$staddedby = $data['addedby'];

	$sqlrecipe = "SELECT * FROM recipe_table WHERE recipe_isdeleted = '0' and `added_by` = '$staddedby'";
	$resultrecipe = mysqli_query($conn, $sqlrecipe);

	if(mysqli_num_rows($resultrecipe) > 0)
	{
		while($output = mysqli_fetch_assoc($resultrecipe)){
            
			$cars = json_decode($output["recipe_ing"], true);
            $res[] = array("recipeid" => $output["recipe_id"], "recipename" => $output["recipe_name"], "recipeyield" => $output["recipe_yield"], "addedby" => $output["added_by"], 'recipeinglist' => $cars);
            $cars = null;
		}

            echo json_encode($res);
		
	}
	else
	{
		echo json_encode(array('message' => 'Record Not Inserted', 'status' => false));
	}
?>