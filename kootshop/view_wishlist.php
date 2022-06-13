<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    	if(!isset($user_id)){
		throw new Exception("user_id is required");
	}
	
	$get_user = db_select_query("select * from customers where id =  '$user_id' ");
	if(count($get_user))
	{
	    	$get_wishlist = db_select_query("select products_favoriate.* , products.* , products_favoriate.product_id as pid , CONCAT('".URL."admin/assets/uploaded/products/', products.thumbnail) AS image  from products left join products_favoriate on products_favoriate.product_id = products.id where products_favoriate.user_id = '$user_id' ") ;
             
   
             
     if(count($get_wishlist))
		{
		    $data = [] ;
		  
			foreach($get_wishlist as $k=>$v) {
			    
			$v['product_image'] = $v['image'] ;
			$v['product_name'] =  $v['product_name'];
			$v['product_price'] = $v['price'] ;
			$v['product_stock'] = $v['stock'] ;
			
		 
			     
			
			 array_push($data , $v) ;
			
			 }
			 
		    $json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $data ;
			
		}
		else
		{
			$json['result']=false;	
			$json['message']="Your Wishlist Is Empty";
		}
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