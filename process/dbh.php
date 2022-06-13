<?php


$servername = "localhost";
$dBUsername = "cap_audit";
$dbPassword = "@cap_audit123";
$dBName = "admin_cap_audit";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
    echo "Databese Connection Failed";
}

?>
