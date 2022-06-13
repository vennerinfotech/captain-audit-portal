<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

// $data_get=file_get_contents('php://input');
// $_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    	if(!isset($user_id) ||  !isset($product_id)){
		throw new Exception("user_id , product_id is required");
	}
     
      
      if(!count(db_select_query("SELECT * FROM products_favoriate WHERE product_id='$product_id' AND user_id = '$user_id' ")))
	{
		$data['table']='products_favoriate';	
		$data['values']= $_REQUEST;
		if(db_insert($data))
		{
			$json['result']=true;
			$json['message']="Successfully Added In Wishlist";
		}		
		else
		{
			$json['result']=false;
			$json['message']="Something went wrong! Please try again";
		}
	}else
	{
		$query="DELETE FROM products_favoriate WHERE product_id = '$product_id' AND AND user_id = '$user_id' " ;
	    if(db_delet_query($query))
	    {
	    	$json['result']=true;
			$json['message']="Successfully Removed From Wishlist";
	    }
	    else
		{
			$json['result']=false;
			$json['message']="Something went wrong! Please try again";
		}
	}
      

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>