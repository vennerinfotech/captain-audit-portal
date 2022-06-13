<?php 
include_once('../functions/functions.php');
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    
     $banners =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/banners/', image) AS image 
             FROM banners WHERE title = 'Home Top Banner' and status = 'Enabled' ") ;
      
		if(count($banners))
		{
			$json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $banners ;
		}
		else
		{
			$json['result']=false;	
			$json['message']="Banners Not Found";
		}
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>