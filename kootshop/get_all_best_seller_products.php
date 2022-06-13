<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
     
   $get_best_seller_products =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail , CONCAT('".URL."admin/assets/uploaded/products/', cover_image) AS cover_image
             FROM products WHERE best_seller = 'Enabled' ") ; 
     if($get_best_seller_products)
     {
        	$json['result']=true;
	      $json['message']="Date Found";
	      $json['data'] = $get_best_seller_products ;
     }
     else
     {
         	$json['result']=false;
	      $json['message']="Date Not Found";
	    
     }

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>