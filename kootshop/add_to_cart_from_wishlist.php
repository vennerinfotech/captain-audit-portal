<?php
header('Content-Type: application/json');
include_once('../functions/functions.php') ;

$id="";
$quantity =1; 
$json = array();
extract($_REQUEST);



 if(!isset($user_id) || !isset($id)){
		throw new Exception("user_id , id is required");
	}
	
    $query  = db_select_query("select stock from products where id  =  '$id'")[0] ;
     if($query['stock'] != 0)
     {
       if(isset($_COOKIE['p_cards']))
	{
		$new_id['id']= $id;
		$new_id['quantity']= $quantity;
		$old_ids = (array)json_decode($_COOKIE['p_cards']);
		
		$add_this = false;
		$match = false;
		foreach($old_ids as $value)
		{
			$value = (array)$value;
			if($value['id'] == $id)
			{
				$match = true;	
			}
		}	
		if($match == false)
		{
			array_push($old_ids,$new_id);
			$new_id = json_encode($old_ids);
	  		setcookie("p_cards",$new_id, time()+3600);
	  	  $query="DELETE FROM products_favoriate WHERE product_id='$id' AND user_id = '$user_id'" ;
	  	  
	 	if(db_delet_query($query))
	    {
 		$json['result']= true;
 		$json['message'] = "Successfully Added In Cart";

	    }
		}
		else{
			$json['result']= false;
	 		$json['message'] = "Already In Cart";

		}
	}
	else
	{
		$new_id[0]['id']= $id;
		$new_id[0]['quantity']= $quantity;
  		setcookie("p_cards",json_encode($new_id), time()+3600);

  	   
  		 $query="DELETE FROM products_favoriate WHERE product_id='$id' AND user_id = '$user_id' ";
	    if(db_delet_query($query))
	    {
 		$json['result']= true;
 		$json['message'] = "Successfully Added In Cart";

	    }

	}
     }
     else
    {
        $json['result']= false;
 	   $json['message'] = "Product Is Out Of Stock";  
 	   
    }

	

echo json_encode($json);
?>