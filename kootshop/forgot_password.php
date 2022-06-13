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
     
      
     $user = db_select_query("SELECT * FROM customers where email = '$email' ");
        if(!count($user)){
        	throw new Exception("Email Not Found");
        }
       

	    $save['randam_str'] = md5($email);
        $inv['table']="customers"; 
        $inv['values']=$save; 
        $inv['where']['id']=$user[0]['id']; 
        db_update($inv);


        $password_link = $URL."reset_password.php?s=".md5($email);
        $emailData['name'] = $user[0]['name'];   
        $emailData['email'] = $user[0]['email'] ;
        $emailData['link'] =  $password_link ;  
        $send =  send_email($user[0]['email'],"Reset Password Email","../email/reset_password.php",$emailData);


		if($send)
		{
			$json['result']=true;	
			$json['message']="Password Reset Link Has Been Mailed";
		}
		else
		{
			$json['result']=false;	
			$json['message']="Password Has Not Been Mailed";
		}


    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>