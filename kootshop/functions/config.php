<?php
date_default_timezone_set('Asia/Kolkata');

define('DB_HOST', 'localhost');
define('DB_USER', 'kootshop_admin');
define('DB_PASS', '@Kootshop123');
define('DB', 'admin_kootshop');
define('DB_CHARSET', 'utf8');

session_start();


define('SENDER_EMAIL', 'info@kootshop.com');
define('SENDER_NAME', 'Kootshop.com');

error_reporting(-1);
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/');

// $app='http://kootshop.com/';
// define('SITE_URL', $app);
$URL = 'http://kootshop.com/';
define('URL', $URL);
define('SITE_LOGO', URL.'assets/images/icon/logo.png');

//paypal
define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPAL_ID', 'lokesh.laabhaa-buyer@gmail.com');


//domain for english/arabic conversion
 $domain = 'kootshop.com';
 define('DOMAIN', $domain);


?>
