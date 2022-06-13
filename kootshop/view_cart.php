<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
     
      
$currency_of_cart ="";
$grandTotal1 = 0.0;
$total1 = 0;

$cart_product = array();
if(isset($_COOKIE['p_cards']))
{
  $cart_product = (array)json_decode($_COOKIE['p_cards'], true); 
}

$recently = array();
if(isset($_COOKIE['recently']))
{
  $recently = (array)json_decode($_COOKIE['recently'], true); 
}

 if(count($cart_product))
{
    $data = [] ;
         
    foreach ($cart_product as $key => $cart_p) 
      { 
           $query_cart_product = db_select_query("SELECT * ,CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail FROM products
                                                                     WHERE products.id = '{$cart_p['id']}'");
           if(count($query_cart_product))
            {
              $cart_itm = $query_cart_product[0]; 
              $cart_p['product_id'] = $cart_p['id'] ;
              $cart_p['product_image'] = $cart_itm['thumbnail'] ;
              $cart_p['product_name'] = $cart_itm['product_name'] ;
              $cart_p['product_price'] = $cart_itm['price'];
              $cart_p['product_quantity'] = $cart_p['quantity'] ;
              $cart_p['product_total'] = $cart_p['quantity'] * $cart_itm['price'] ;
              
            } 
        array_push($data , $cart_p) ;
      }  
      
            $json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $data ;
      
    
}
else
{
  	$json['result']=false;	
	$json['message']="Your Cart Is Empty";
}


    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>