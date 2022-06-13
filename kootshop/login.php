<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
//include_once( dirname(__FILE__). DIRECTORY_SEPARATOR .'auth.php');

$json=array('result'=>false,'message'=>'something went wrong');

$data_get = array();
$data_getJson = file_get_contents('php://input');
if($data_getJson){
	$data_get = json_decode($data_getJson, true);
} 
$email = $data_get['email'];
$password = $data_get['password'];
$TokenID  = trim(str_replace(" ","",$data_get['TokenID']));

if (( !$email ) OR ( !$password ) ){
	$return = array('status' => false, 'message' => 'Username and password can not be blank');
	http_response_code(203);
	echo json_encode($return);
	die();
}

try{
    	if(!isset($email) ||  !isset($password)){
		throw new Exception("email , password is required");
	}
     
    $query = "SELECT * FROM customers WHERE  email='$email' ";
	
	
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
	
	$sql = "UPDATE customers SET TokenID='".$TokenID."' WHERE email='".$email."'";
	if(db_update_query($sql))
	{
		echo '';
	}
	$USER = db_select_query($query)[0]; 
	foreach($USER as $key => $USE){
		if($USE == Null){
			$USER[$key] = "";
		}
	}
	$json['result']=true;
	$json['data']  = $USER ;
	$json['message']="Login Successfully";
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>