<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
include_once('../functions/functions.php');
$json=array('result'=>false,'message'=>'something went wrong');

/*$data_get=file_get_contents('php://input');
$_REQUEST = json_decode($data_get,true);*/
extract($_REQUEST);
try{
    
     $categories =  db_select_query("SELECT *,CONCAT('".URL."admin/assets/uploaded/categories/', cat_image) AS image FROM categories ") ;
     if(count($categories))
		{
		    $data = [] ;
		  
			foreach($categories as $k=>$v) {
			$cat_id = $v['id'] ;
            $sub_categories = db_select_query("select *  from sub_categories where category_id = '$cat_id' ") ; 
            if(count($sub_categories)) 
            {
               $v['sub_categories'] = $sub_categories ;
            }
          else
          {
              $v['sub_categories'] = [] ; 
          }
			     
			
			 array_push($data , $v) ;
			
			 }
			 
		    $json['result']=true;	
			$json['message']="Data Found";
			$json['data'] = $data ;
			
		}
		else
		{
			$json['result']=false;	
			$json['message']="Categories Not Found";
		}


    
	
}catch(Exception $e){
	$json['result']=false;
	$json['message']=$e->getMessage();
}

echo json_encode($json);	
?>