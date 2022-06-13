<?php
include_once('../functions/functions.php');

api_start(URL."api");
	api_tag_start('');
	
	
    	api_route('register.php',$params=array('name','email','password','mobile'),'customer registration with name, email , password and mobile');
		api_route('login.php',$params=array('email','password'),'customer login with email and password');
		api_route('get_profile.php',$params=array('id'),'customer get profile by passing primary id of it');
		api_route('change_password.php',$params=array('id','current_password','new_password','confirm_password'),'customer change password by passing primary id , current password , new password and confirm password of it') ;
		api_route('forgot_password.php',$params=array('email'),'customer forgot password by passing email id of it');
		api_route('get_all_banners.php',$params=array(),'get all home banners');
		api_route('get_all_categories_with_sub-categories.php',$params=array(),'get all categories along with their sub-categories');
		api_route('get_all_governorate.php',$params=array(),'get all governorate needed for customer profile section');
		api_route('get_area_acc_to_governorate.php',$params=array('governorate_id'),'get all areas by passing governorate primary id needed for customer profile section');
		api_route('get_shipping_address.php',$params=array('user_id'),'get shipping address of customer by passing primary id of it');
		api_route('update_profile.php',$params=array('id','name(o)','mobile(o)','email(o)','gender(o)','date_of_birth(o)','house_no(o)','street(o)','governorate_id(o)','area_id(o)','zip_code(o)'),'update customer profile by passing primary id of it and other optional parms as mentioned');
		api_route('insert_shipping_address.php',$params=array('name','mobile','house_no','street','del_governorate_id','del_area_id','zip_code'),'insert shipping address of the customer');
		api_route('update_shipping_address.php',$params=array('address_id', 'name(o)','mobile(o)','house_no(o)','street(o)','del_governorate_id(o)','del_area_id(o)','zip_code(o)'),'update shipping address of the customer by passing shipping address primary id and other optional parms as mentioned');
		api_route('get_all_new_products.php',$params=array(),'get all new products list needed for home page');
		api_route('get_all_featured_products.php',$params=array(),'get all featured products list needed for home page');
		api_route('get_all_best_seller_products.php',$params=array(),'get all best seller products list needed for home page');
		api_route('get_products_acc_to_category_sub-category_title.php',$params=array('category_id(o)' , 'sub_category_id(o)' , 'title(o)'),'get all products according to category (if passed category_id) or according to sub-category (if passed sub_category_id) or according to product name (if passed title i.e. product name) or simply get all products if not passed anything');
	    api_route('get_single_product_along_with_related_products.php',$params=array('product_id'),'get single product detail along with all available colors and sizes by passing product id and also get all related products');
		api_route('contact_us.php',$params=array('email','f_name','l_name','mobile','message'),'contact us by passing email , first name , last name , mobile , message');
		api_route('add-to-cart.php',$params=array('id'),'add to cart by passing product id (as id)');
		api_route('add_to_wishlist_remove_from_wishlist.php',$params=array('user_id','product_id'),'add to wishlist or remoce from wishlist by passing product id and user id');
	    api_route('view_cart.php',$params=array(),'view cart');	 
	    api_route('view_wishlist.php',$params=array('user_id'),'view wishlist by passing user id');
	    api_route('delete_from_cart.php',$params=array('product_id'),'delete from cart by passing product id');
	    api_route('remove_from_wishlist.php',$params=array('user_id' , 'product_id'),'remove from wishlist by passing user id and product id');
	    api_route('add_to_cart_from_wishlist.php',$params=array('user_id' , 'id'),'add to cart from wishlist by passing user id and product id (as id)');
		api_route('update_cart.php',$params=array('id', 'quantity'),'update the quantity of cart by passing product id (as id) and quantity');
		api_route('add_to_newsletter.php',$params=array('email'),'add to newsletter by passing email');
		api_route('order_place.php',$params=array('email'),' order place by passing address_id , product_id ([]) , quantity ([]) , price ([]) ,  payment_gateway , order_id , delivery_charge , total ,  user_id');
		api_route('get_all_orders.php',$params=array('user_id'),'get all orders list by passing user id');
		api_route('get_order_details.php',$params=array('order_id'),'get order detail by passing order_id');
// 		api_route('get_order_details.php',$params=array('order_id'),'get order detail by passing order_id');
// 		api_route('checkout.php',$params=array('user_id'),'get checkout details by passing user_id');
// 		api_route('buy_now_product.php',$params=array('user_id' , 'product_id'),'buy now product by passing user id and product id');
		
		
		
	
		
	api_tag_end('');
api_end(URL."/api");

?>