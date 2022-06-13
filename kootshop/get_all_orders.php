<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

// $data_get=file_get_contents('php://input');
// $_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    	if(!isset($user_id)){
		throw new Exception("user_id is required");
	}
	
	 $get_data = db_select_query("select * from customers where id = '$user_id' ") ; 
	 if(count($get_data))
	 {
	      $get_orders = db_select_query("select orders.*, DATE_FORMAT(orders.date,'%d-%m-%Y') as date, transactions.transaction_id from orders 
     left join transactions on orders.order_id = transactions.order_id where orders.user_id = '$user_id' 
     group by orders.order_id order by id desc");
     
     if(count($get_orders))
     {
       	$json['result']=true;
	   $json['message']="Data found";
	   $json['data'] =  $get_orders ;
     }
     else
     {
         	$json['result']=false;
	   $json['message']="Data Not found";
     }
      
	 }
	 else
	 {
	     	$json['result']=false;
	   $json['message']="Customer Not found";
	 }
     
      
    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>