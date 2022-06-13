<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    
if(!empty($_GET['category_id']))
{
 $cat_id = $_GET['category_id'] ;
 $get_products =  db_select_query("SELECT * , CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail , CONCAT('".URL."admin/assets/uploaded/products/', cover_image) AS cover_image
             FROM products  where category_id = '$cat_id' order by id desc " ) ; 
 
}
else if(!empty($_GET['sub_category_id']))
{
    
  $sub_cat_id = $_GET['sub_category_id'] ;
 $get_products =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail , CONCAT('".URL."admin/assets/uploaded/products/', cover_image) AS cover_image
             FROM products where sub_category_id = '$sub_cat_id' order by id desc ") ;   
}
else if(!empty($_GET['title']))
{
    
  $title = $_GET['title'] ;
 $get_products =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail , CONCAT('".URL."admin/assets/uploaded/products/', cover_image) AS cover_image
             FROM products where product_name LIKE '%$title%' order by id desc ") ;   
}
else
{
    
  $get_products =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail , CONCAT('".URL."admin/assets/uploaded/products/', cover_image) AS cover_image
             FROM products order by id desc ") ;  
}

     if($get_products)
     {
        	$json['result']=true;
	      $json['message']="Date Found";
	      $json['data'] = $get_products ;
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