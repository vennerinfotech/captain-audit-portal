<?php


$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "admin_restaurantpos2";

$connpos = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$connpos){
    echo "Databese Connection Failed";
}

?>
