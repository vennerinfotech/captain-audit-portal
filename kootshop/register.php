<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
//include_once( dirname(__FILE__). DIRECTORY_SEPARATOR .'auth.php');
$json = array('result'=>false,'message'=>'something went wrong');
$requestData = array();
$data_get = file_get_contents('php://input');
if($data_get){
	$requestData  = json_decode($data_get,true);
}
$name = $requestData['name'];
$email = $requestData['email'];
$password = $requestData['password'];
$mobile = $requestData['mobile'];
$TokenID  = trim(str_replace(" ","",$requestData['TokenID']));

if (( !$email ) OR ( !$password )){
	$return = array('status' => false, 'message' => 'Email and Password can not be blank');
	http_response_code(203);
	echo json_encode($return);
	die();
}

try{
    	if(!isset($name) ||  !isset($email) ||  !isset($password) ||  !isset($mobile)){
		throw new Exception("name , email , password , mobile is required");
	}
      $save['name'] = strip_tags($name);
      $save['email'] = strip_tags($email);
      $save['password'] = password_hash(strip_tags($password), PASSWORD_DEFAULT);
      $save['mobile'] = strip_tags($mobile);
	  $save['TokenID'] = strip_tags($TokenID);
      $query = "SELECT * FROM customers WHERE email = '$email'";
      if(!count(db_select_query($query)))
      {
          $query1="SELECT * FROM customers WHERE mobile = '$mobile'";
          if(!count(db_select_query($query1)))
          {
            $data['table']='customers';
            $data['values']=$save;
            $data['primary_key']='id';			
            if($user_id = db_insert($data)) 
            {
				$emailData['name'] = $name;  
                $emailData['link'] = URL."verify_customer.php?email=$email&user_id=$user_id";
                @send_email($email,"Account Verification Email","../email/verification.php",$emailData);
                
                $get_data = db_select_query("select * from customers where id = '$user_id'") ;
				
				
				
                if(count($get_data))
                {
					$users = $get_data[0] ;
					foreach($users as $key => $user){
						if($user == Null){
							$user[$key] = "";
						}
					}
                 $json['result'] = true;
                 $json['data'] = $users; 
                 $json['message']='Customer Registered Successfully';    
                }
                
             }
             else{
                $json['result']=false;  
                $json['message']="Something went wrong";
                 
             }
          }else
          {
            $json['result']=false;  
            $json['message']="Mobile Number Already Existing";
            
          }
      }
      else
      {
        $json['result']=false;  
         $json['message']="Email Already Existing";
          
      }
     

    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>