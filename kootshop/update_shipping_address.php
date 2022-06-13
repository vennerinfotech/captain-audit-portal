<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    	if(!isset($address_id)){
		throw new Exception("address_id is required");
	}
	
	
                $del_id = $_REQUEST['address_id'] ;
                unset($_REQUEST['address_id']) ;
            
                $data['table']='customers_delivery_address';
		    	$data['values']=$_REQUEST;
		    	$data['where']['id']=$del_id ;
		    	
			if(db_update($data))
			{
			     $get_data = db_select_query("select * from customers_delivery_address where id = {$_REQUEST['address_id']} ") ;
			    if(count($get_data))
			    {
			      $json['result']=true;
			      $json['data'] = $get_data[0] ; 
				  $json['message']="Shipping Address Updated Successfully";  
			    }
				
				
				 
			}
			else
			{
				$json['result']=false;	
				$json['message']="You have not updated anything.";
			
			} 
            
           
     
     

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>