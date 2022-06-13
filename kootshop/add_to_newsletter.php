<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    	if(!isset($email)){
		throw new Exception("email is required");
	}
     
      
     $save['email']= strip_tags($_REQUEST['email']);
       
       $qry = db_select_query("select * from newsletter where email = '$email' ") ;
       if(count($qry))
       {
         throw new Exception("Email Already Subscribed") ;  
       }
       
  
       $data['table']='newsletter';
       $data['primary_key']='id';
       $data['values']=$save;

       if(db_insert($data)){
       
        $json['result']=true;
        $json['message']='Subscribed Successfully';
                  
       }else{
     
      $json['result']=false;
      $json['message']='Something went wrong';

       }
    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>