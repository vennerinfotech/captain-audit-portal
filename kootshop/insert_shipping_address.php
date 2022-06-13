<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    if(!isset($user_id) ||  !isset($name) ||  !isset($mobile) ||  !isset($house_no) ||  !isset($street) ||  !isset($del_governorate_id) ||  !isset($del_area_id) ||  !isset($zip_code)){
		throw new Exception("user_id ,name , mobile , house_no , street , del_governorate_id , del_area_id  , zip_code is required");
	}
        
            $data['table']='customers_delivery_address';
			$data['values']=$_REQUEST;
			if(db_insert($data))
			{
				$json['result']=true;	
				$json['message']="Shipping Address Added Successfully";
				 
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