<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);
extract($_REQUEST);
try{
    	if(!isset($email) ||  !isset($password)){
		throw new Exception("email , password is required");
	}
     
      $query="SELECT * FROM customers WHERE  email='$email' ";
    if(!count(db_select_query($query))){
		throw new Exception("Invalid Email");
	}

	$password_hash = db_select_query($query)[0]['password']; 
	if(!password_verify($password, $password_hash)) 
	{
		throw new Exception("Invalid Password");
	}

	 $query.= "and email_verification = 1" ;

	if(!count(db_select_query($query))){
		throw new Exception("Email is not verified");
	}

    $USER = db_select_query($query)[0];
   
	$json['result']=true;
	$json['data']  = $USER ;
	$json['message']="Login Successfully";

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>