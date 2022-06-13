<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    	if(!isset($product_id)){
		throw new Exception("product_id is required");
	}
	
	if(isset($_COOKIE['p_cards']))
	{	
		$data = (array)json_decode($_COOKIE['p_cards'],true);
		$update_value = 'notmatch';
		foreach($data as $key=>$value)
		{
			if($value['id'] == $product_id)
			{
				$update_value = $key; 
				break;
			}
		} 
		if($update_value != 'notmatch' || $update_value >= 0)
		{
			 unset($data[$update_value]); 
		}

		setcookie("p_cards",json_encode($data), time()+3600);
	}

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>