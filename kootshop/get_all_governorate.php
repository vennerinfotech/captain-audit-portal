<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
     
     $get_all_governorate = db_select_query("select * from governorate") ;
     if($get_all_governorate)
     {
        	$json['result']=true;
	      $json['message']="Date Found";
	      $json['data'] = $get_all_governorate ;
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