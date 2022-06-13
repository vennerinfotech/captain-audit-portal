<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
//include_once( dirname(__FILE__). DIRECTORY_SEPARATOR .'auth.php');
$json = array('result'=>false,'message'=>'something went wrong');
$getDataJson = array();
$data_get = file_get_contents('php://input');
if($data_get){	
   $getDataJson = json_decode($data_get,true);
}
$id = "1231";
$current_password = "123456789";
$new_password = "321654987";
$confirm_password = "321654987";

try{
    	if(!isset($id , $current_password , $new_password , $confirm_password )){
		throw new Exception("id , current_password , new_password , confirm_password  is required");
	}
	
	$query="SELECT * FROM customers WHERE id = '$id' ";
	if(count(db_select_query($query)))
	{
		
	  	$password_hash = db_select_query($query)[0]['password']; 	

		// $query .="AND password = '$current_password'";
		
	if(password_verify("$current_password", $password_hash)) 
		{
			
			if($new_password !=""){
				
				if( $new_password == $confirm_password ){
					
				$password = password_hash($new_password, PASSWORD_DEFAULT);
				
				unset($new_password);
				unset($confirm_password);
				unset($current_password);
				
				$sql = "UPDATE customers SET password ='".$password."' WHERE id='".$id."'";

				$data['table'] = "customers";
				$data['values'] =  $password;
				$data['where']['id'] = $id; */

				if(db_update_query($sql)){
					$json['result']=true;	
					$json['message']="Password Changed Successfully";
				}else{
					$json['result']=false;	
					$json['message']="Something went wrong";
				}

				}else
					{
						$json['result']=false;	
						$json['message']="New Password and Confirm password does not match";
					}
				
			}else{
				$json['result']=false;	
				$json['message']="Your password not match";
			}

		}
		else
		{
			$json['result']=false;	
			$json['message']="Invalid Current Password";
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