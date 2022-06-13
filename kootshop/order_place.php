<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);
extract($_REQUEST);
try{
    	if(!isset($address_id) ||  !isset($payment_gateway) ||  !isset($user_id)
    	||  !isset($delivery_charge) ||  !isset($total) || !isset($user_id)){
		throw new Exception("address_id ,  payment_gateway  , delivery_charge , total ,  user_id is required");
	}
     
$dt=db_select_query("SELECT id FROM orders ORDER BY id DESC LIMIT 0,1");
if(count($dt))
{
  $ids=$dt[0]['id'];
  $order_id='ORD-00000'.++$ids;
}
else
{
  $order_id='ORD-000001';
}
   
    
    // $product_id  = $_REQUEST['product_id'];
    // $price  = $_REQUEST['price'];
    // $quantity  = $_REQUEST['quantity'];

    // unset($_REQUEST['product_id']);
    // unset($_REQUEST['price']);

      $productDetails  = json_decode($_REQUEST['productDetails'],true);


    unset($_REQUEST['productDetails']);
    foreach ($productDetails as $key => $v)
    {
        $seller = db_select_query("SELECT * FROM products WHERE id ='".$v['product_id']."'")[0]['seller_id'];
        $data[$seller][$key]['product_id'] = $v['product_id'];
        $data[$seller][$key]['quantity'] = $v['quantity'];
        $data[$seller][$key]['price'] = $v['price'];
     
    }

    foreach ($data as $keys => $values)
    {
        
      $submit_data['order_id'] = $order_id;
      $submit_data['user_id'] = $_REQUEST['user_id'] ;
      $submit_data['address_id'] = $_REQUEST['address_id'] ;
      $submit_data['payment_gateway'] = $_REQUEST['payment_gateway'] ;
      $submit_data['total'] = $_REQUEST['total'] ;
      $submit_data['delivery_charge'] = $_REQUEST['delivery_charge'] ;

      

        foreach ($values as  $value) 
        {
            $submit_data['product_id'] = $value['product_id'];
            $submit_data['price'] = $value['price'];
            $submit_data['quantity'] = $value['quantity'];
            
            $data_order['table']='orders';  
            $data_order['values']= $submit_data;

            $suc_ins = db_insert($data_order) ;
            
        } 
           if($suc_ins)

            {
                $json['result']=true;
                 $json['pay_type'] = $_REQUEST['payment_gateway'] ;
                $json['order_id'] = $order_id;
                $json['total'] = $_REQUEST['total'] +  $_REQUEST['delivery_charge']  ;
            }
            else
            {
                $json['result']=false;
                $json['message'] = "Order Has Not Been Placed" ;
             
            }

       
    }

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>