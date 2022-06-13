<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
$object = file_get_contents("php://input");
$return = array('status' => false, 'message' => '');
/* $username = $_SERVER['HTTP_USERNAME'];
$password = $_SERVER['HTTP_PASSWORD']; */
//$username = $_SERVER['HTTP_USERNAME'];
//$password = $_SERVER['HTTP_PASSWORD'];
$tokenid = trim(str_replace(" ","",$object['TokenID'])); 

//echo '<pre>';print_r($_SERVER); echo'</pre>'; die(__FILE__.':Line NO :'.__LINE__);

if (( !$username ) OR ( !$password ) ){
	$return = array('status' => false, 'message' => 'Authentication failed, username and password can not be blank');
	http_response_code(203);
	echo json_encode($return);
	die();
}

$row = db_select_query("select * from authentication where username = '$username' and  password = '$password' ") ;
//$row = $this->db->get_where('authentication',array('username' => $username,'password' => $password))->row_array();
if(!$row){
	$return = array('status' => false, 'message' => 'Invalid Authentication username or password are not correct');
	http_response_code(203);
	echo json_encode($return);
	die();
}

?>