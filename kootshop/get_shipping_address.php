<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    	if(!isset($user_id)){
		throw new Exception("user_id is required");
	}
     
       $user = db_select_query("select * from customers where id = '$user_id' ") ;
       if(count($user))
       {
          $address = db_select_query("SELECT customers_delivery_address.* , areas.name as area_name ,areas.delivery_charge ,  governorate.name as governorate_name from customers_delivery_address
     left join governorate on customers_delivery_address.del_governorate_id = governorate.id
     left join areas on customers_delivery_address.del_area_id = areas.id WHERE customers_delivery_address.user_id = '$user_id' ") ;
     
    
		if(count($address))
		{
			$json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $address ;
		}
		else
		{
			$json['result']=false;	
			$json['message']="Shipping Address Not Found";
		}   
       } 
       else
       {
           	$json['result']=false;	
			$json['message']="Customer Not Found";
       }
      
    


    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>