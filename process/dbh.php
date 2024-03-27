<?php


$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "admin_project_audit";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
    echo "Databese Connection Failed";
}

?>
