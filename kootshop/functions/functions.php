<?php
include_once('config.php');
include_once('_logs.php');
include_once('_database.php');
include_once('_files.php');
include_once('_comman.php');
include_once('_login.php');
include_once('_email.php');
include_once('_sms.php');
include_once('_lang.php');
include_once('_notification.php');
include_once('_api.php');
include_once('distance.php');
//$page_name="home";

// function size_name($size_id){
// 	$size="SELECT * FROM `sizes` WHERE size_id='$size_id'";
// 	$size1=db_select_query($size);
// 	if($size1){
// 		return $size1[0]['size'];
// 	}else{
// 		return "No size found";
// 	}
// }
// function subcategory_id($subcat_name){
// 	$subcategory="SELECT sub_cat_id FROM `subcategories` WHERE subcategory='$subcat_name'";
// 	$subcategory1=db_select_query($subcategory);
// 	if($subcategory1){
// 		return $subcategory1[0]['sub_cat_id'];
// 	}else{
// 		return 0;
// 	}
// }
// function subcategory_name($subcat_id){
// 	$subcategory="SELECT subcategory FROM `subcategories` WHERE sub_cat_id='$subcat_id'";
// 	$subcategory1=db_select_query($subcategory);
// 	if($subcategory1){
// 		return $subcategory1[0]['subcategory'];
// 	}else{
// 		return "No subcategory";
// 	}
// }
// function category_id($cat_name){
// 	$category="SELECT cat_id FROM `categories` WHERE name='$cat_name'";
// 	$category1=db_select_query($category);
// 	if($category1){
// 		return $category1[0]['cat_id'];
// 	}else{
// 		return 0;
// 	}
// }

// function category_name($cat_id){
// 	$category="SELECT name FROM `categories` WHERE cat_id='$cat_id'";
// 	$category1=db_select_query($category);
// 	if($category1){
// 		return $category1[0]['name'];
// 	}else{
// 		return "No category";
// 	}
// }

// $user_id=$name=$email=$phone=$state=$city=$locality=$image=$wallet_amount="";

// if(is_user_login()){
// 	$user_id=$_SESSION['login_id'];
// 	$user="SELECT * FROM `users` WHERE user_id='$user_id'";
// 	$user1=db_select_query($user)[0];
	
// 	$user_id=$user1['user_id'];
// 	$name=$user1['name'];
// 	$email=$user1['email'];
// 	$phone=$user1['phone'];
// 	$state=$user1['state'];
// 	if(!empty($state)){
// 	$state_qry="SELECT name FROM `us_states` WHERE id='$state'";
// 	$state_qry1=db_select_query($state_qry)[0];
// 	$state=$state_qry1['name'];
// 	}
// 	$city=$user1['city'];
// 	if(!empty($city)){
// 	$city_qry="SELECT name FROM `cities` WHERE id='$city'";
// 	$city_qry1=db_select_query($city_qry)[0];
// 	$city=$city_qry1['name'];
// 	}
// 	$locality=$user1['locality'];
// 	$image=$user1['image'];

// 	$wallet_amount=number_format((float)round($user1['wallet_amount'],2), 2, '.', ''); 
// }

// define("USER_ID",$user_id);
// define("USER_NAME",$name);
// define("USER_EMAIL",$email);
// define("USER_PHONE",$phone);
// define("USER_STATE",$state);
// define("USER_CITY",$city);
// define("USER_LOCALITY",$locality);
// define("USER_IMAGE",$image);
// define("USER_WALLET_AMOUNT",$wallet_amount);

// function time_elapsed_string($datetime, $full = false) {
//     $now = new DateTime;
//     $ago = new DateTime($datetime);
//     $diff = $now->diff($ago);

//     $diff->w = floor($diff->d / 7);
//     $diff->d -= $diff->w * 7;

//     $string = array(
//         'y' => 'year',
//         'm' => 'month',
//         'w' => 'week',
//         'd' => 'day',
//         'h' => 'hour',
//         'i' => 'minute',
//         's' => 'second',
//     );
//     foreach ($string as $k => &$v) {
//         if ($diff->$k) {
//             $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
//         } else {
//             unset($string[$k]);
//         }
//     }

//     if (!$full) $string = array_slice($string, 0, 1);
//     return $string ? implode(', ', $string) . ' ago' : 'just now';
// }

// function get_month_by_num($current_month){
// 	if($current_month==1){
// 	$month="jan";
// }elseif($current_month==2){
// 	$month="feb";
// }elseif($current_month==3){
// 	$month="mar";
// }elseif($current_month==4){
// 	$month="apr";
// }elseif($current_month==5){
// 	$month="may";
// }elseif($current_month==6){
// 	$month="june";
// }elseif($current_month==7){
// 	$month="july";
// }elseif($current_month==8){
// 	$month="aug";
// }elseif($current_month==9){
// 	$month="sept";
// }elseif($current_month==10){
// 	$month="oct";
// }elseif($current_month==11){
// 	$month="nov";
// }elseif($current_month==12){
// 	$month="decem";
// }else{
// 	$month="mar";
// }
// 	return $month;
// }

if(isset($_REQUEST['admin_login'])){
	unset($_REQUEST['admin_login']);
}
if(isset($_REQUEST['user_login'])){
	unset($_REQUEST['user_login']);
}
if(isset($_REQUEST['mfesecure_visit'])){
	unset($_REQUEST['mfesecure_visit']);
}
if(isset($_REQUEST['cpsession'])){
	unset($_REQUEST['cpsession']);
}
if(isset($_REQUEST['_tccl_visitor'])){
	unset($_REQUEST['_tccl_visitor']);
}
if(isset($_REQUEST['woocommerce_recently_viewed'])){
	unset($_REQUEST['woocommerce_recently_viewed']);
}
if(isset($_REQUEST['woocommerce_items_in_cart'])){
	unset($_REQUEST['woocommerce_items_in_cart']);
}
if(isset($_REQUEST['woocommerce_cart_hash'])){
	unset($_REQUEST['woocommerce_cart_hash']);
}
if(isset($_REQUEST['PHPSESSID'])){
	unset($_REQUEST['PHPSESSID']);
}
if(isset($_REQUEST['_tccl_visit'])){
	unset($_REQUEST['_tccl_visit']);
}
?>