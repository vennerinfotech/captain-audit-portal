<?php
require_once ('process/dbh.php');
require_once ('session.php');

$sql="UPDATE project SET counter=1 WHERE counter=0 and u_id='".$_SESSION['id']."'";    
$result=mysqli_query($conn, $sql);
$arr=array("data"=>"yes");
echo json_encode($arr);
?>