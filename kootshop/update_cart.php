<?php
header('Content-Type: application/json');
include_once('../functions/functions.php') ;

extract($_REQUEST);


 if(!isset($id) || !isset($quantity)){
		throw new Exception("id , quantity is required");
	}
	
	if($quantity > 0)
      {
	
    
$data = json_decode($_COOKIE['p_cards'] ,true);
foreach($data as $key => $value)
{	
	$newData[$key]['id'] = $value['id'];
	$newData[$key]['quantity'] = $value['quantity'];
	if($value['id'] == $id)
	{
		$newData[$key]['quantity'] = $quantity;  
	}
}
  
setcookie("p_cards",json_encode($newData), time()+3600);

 }	

echo json_encode($json);
?>