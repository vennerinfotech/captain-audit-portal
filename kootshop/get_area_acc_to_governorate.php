<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    
    if(!isset($governorate_id)){
		throw new Exception("governorate_id is required");
	}
     
     $get_all_areas = db_select_query("SELECT * FROM areas WHERE governorate_id = '$governorate_id' ") ;
     if($get_all_areas)
     {
        	$json['result']=true;
	      $json['message']="Date Found";
	      $json['data'] = $get_all_areas ;
     }
     else
     {
         	$json['result']=true;
	      $json['message']="Date Not Found";
	    
     }

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>