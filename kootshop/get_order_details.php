<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

// $data_get=file_get_contents('php://input');
// $_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    	if(!isset($order_id)){
		throw new Exception("order_id is required");
	}
	
$oid = $_GET['order_id'] ; 
$get_products = db_select_query("select * from orders where order_id = '$oid' ") ;

if(count($get_products))
{
$del_add_id = $get_products[0]['address_id'] ;
$get_del_address = db_select_query("select customers_delivery_address.* , areas.name as aname ,areas.delivery_charge, governorate.name as gname , areas.delivery_charge as del_chrg
from customers_delivery_address left join areas on customers_delivery_address.del_area_id = areas.id left join 
governorate on customers_delivery_address.del_governorate_id = governorate.id
where customers_delivery_address.id = '$del_add_id' ")[0];
$del_chrg = !empty($get_del_address['del_chrg'])?$get_del_address['del_chrg']:0 ;  

$data = [] ;

foreach($get_products as $key => $v)  
{ 
 $pid = $v['product_id'] ;
 $query = db_select_query("select * , CONCAT('".URL."admin/assets/uploaded/products/', thumbnail) AS thumbnail  from products where id = '$pid' ")[0] ;
 
 $v['orders_product_image'] = $query['thumbnail'] ;
 $v['orders_product_id'] = $query['product_id'] ;
 $v['orders_product_name'] = $query['product_name'] ;
 $v['orders_product_size'] = !empty($query['size'])?$query['size']:'' ; 
 $v['orders_product_color'] = !empty($query['colour'])?$query['colour']:'' ;
 $v['orders_product_quantity'] =  $v['quantity'] ;
 $v['orders_product_price'] = $query['price'] ;
 
     array_push($data , $v) ;              
                       
}
  
    //  $ship_del = [] ;
    // $all_data = [] ;
     $ship_del['name'] =  $get_del_address['name'] ;
     $ship_del['house_no'] = $get_del_address['house_no'] ;
     $ship_del['street'] = $get_del_address['street'] ;
     $ship_del['governorate'] = $get_del_address['gname'] ;
     $ship_del['area'] = $get_del_address['aname'] ;
     $ship_del['delivery_charge'] = $v['delivery_charge'] ;
     $ship_del['zip_code'] = $get_del_address['zip_code'] ;
     $ship_del['mobile'] =  $get_del_address['mobile'] ;

    //  $data['shipping_address'] = $ship_del ;
     // array_push($data , $ship_del) ;
     

            $json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $data ;
			$json['shipping_address'] = $ship_del ;
}
else
{
   $json['result']=false;
   $json['message']="Order not Found"; 
}

      
    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>