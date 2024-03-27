<?php

$servername = "localhost";
$dBUsername = "calculator_admin";
$dbPassword = "@Calculator123";
$dBName = "admin_calculator";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Databese Connection Failed";
}

?>
