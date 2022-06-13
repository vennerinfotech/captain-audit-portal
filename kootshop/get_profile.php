<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    	if(!isset($id)){
		throw new Exception("id is required");
	}
     
      
     $user = db_select_query("SELECT customers.* , areas.name as area_name ,  governorate.name as governorate_name from customers
     left join governorate on customers.governorate_id = governorate.id
     left join areas on customers.area_id = areas.id WHERE customers.id = '$id' ");
      
		if(count($user))
		{
			$json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $user[0] ;
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