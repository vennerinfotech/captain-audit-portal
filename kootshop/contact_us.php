<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    	if(!isset($email) ||  !isset($f_name) ||  !isset($l_name) ||  !isset($mobile) ||  !isset($message)){
		throw new Exception("email , f_name , l_name , mobile , message is required");
	}
     
      
      $save['email']= strip_tags($_REQUEST['email']);
        $save['f_name']= strip_tags($_REQUEST['f_name']);
        $save['l_name']= strip_tags($_REQUEST['l_name']);
         $save['mobile']= strip_tags($_REQUEST['mobile']);
          $save['message']= strip_tags($_REQUEST['message']);
       
     
       $data['table']='contact_us';
       $data['primary_key']='id';
       $data['values']=$save;

       if(db_insert($data)){
          $email = "kootshop@outlook.com" ;
          $emailData['name'] =  $save['f_name'].' '. $save['l_name'] ;  
          $emailData['email'] =  $save['email'] ;
          $emailData['mobile'] =  $save['mobile'] ;
          $emailData['message'] =  $save['message'] ;
          @send_email($email,"New Message Received","../email/contact_us.php",$emailData);
               
        
        $json['result']=true;
        $json['message']='Sent Successfully';
                  
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