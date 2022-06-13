<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);

extract($_REQUEST);
try{
    	if(!isset($id)) {
		throw new Exception("id is required");
	}
	
	
	
      $query="SELECT * FROM customers WHERE email = '{$_REQUEST['email']}' AND id != '{$_REQUEST['id']}' ";
  if(!count(db_select_query($query)))
  {
      $query1="SELECT * FROM customers WHERE mobile = '{$_REQUEST['mobile']}' AND id != '{$_REQUEST['id']}'";
      if(!count(db_select_query($query1)))
      {
			$file = array();
			if(!empty($_FILES['image']['name'])){
				$file['files']=$_FILES['image'];
				$file['destination']='../assets/uploaded/user_image';
				$_REQUEST['image']=upload_file($file);
			}

			
			$data['table']='customers';
			$data['values']=$_REQUEST;
			$data['where']['id']=$_REQUEST['id'];
			if(db_update($data))
			{
			    $get_data = db_select_query("select * from customers where id = {$_REQUEST['id']} ") ;
			    if(count($get_data))
			    {
			      $json['result']=true;
			      $json['data'] = $get_data[0] ; 
				  $json['message']="Profile Updated Successfully";  
			    }
				
				 
			}
			else
			{
				$json['result']=false;	
				$json['message']="You have not updated anything";
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