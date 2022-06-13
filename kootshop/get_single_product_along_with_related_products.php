<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    	if(!isset($product_id)){
		throw new Exception("product_id is required");
	}
	
	$id = $_GET['product_id'] ;
    
     $get_product =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail , CONCAT('".URL."admin/assets/uploaded/products/', cover_image) AS cover_image
             FROM products where id = '$id' ") ;
             
   
             
     if(count($get_product))
		{
		    $data = [] ;
		  
			foreach($get_product as $k=>$v) {
		    $cat_id = !empty($v['category_id'])?$v['category_id']:0 ;
		    $sku_id =  !empty($v['sku_id'])?$v['sku_id']:"" ;
            $related_products =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail , CONCAT('".URL."admin/assets/uploaded/products/', cover_image) AS cover_image
            FROM products where category_id = '$cat_id' ") ; 
            $get_colour = db_select_query("select colour , id from products where  sku_id = '$sku_id' group by colour ") ;
            $get_size = db_select_query("select DISTINCT(size) from products where sku_id = '$sku_id' ") ;
            if(count($related_products)) 
            {
               $v['related_products'] = $related_products ;
            }
          else
          {
              $v['related_products'] = [] ; 
          }
             
            if(count($get_colour) > 1) {
              $v['all_avl_colors']  = $get_colour ;     
            } else { 
             $v['all_avl_colors']  = "No more colors to show" ;
            } 
            
        
         if(count($get_size) > 1) {
          $v['all_avl_sizes']  = $get_size ;
          }  else { 
         $v['all_avl_sizes'] = "No more sizes to show" ;
       } 
			     
			
			 array_push($data , $v) ;
			
			 }
			 
		    $json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $data ;
			
		}
		else
		{
			$json['result']=false;	
			$json['message']="Product Not Found";
		}


    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>