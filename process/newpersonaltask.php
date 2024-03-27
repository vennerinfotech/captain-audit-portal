<?php
require_once ('dbh.php');
require_once ('session.php');

$pname = addslashes($_POST['taskname']);
$eid =  $_SESSION['id'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$priority = $_POST['projetpriority'];

$sql = "INSERT INTO `tbl_personaltask`(`u_id`, `pname`, `startdate` , `duedate`, `priority` , `status`) VALUES ('$eid', '$pname', '$startdate', '$enddate', '$priority' , 'Due')";
$result = mysqli_query($conn, $sql);

if(($result) == 1){
    
    $_SESSION['status'] = "Added Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: ../personaltask.php");
}

else{
     $_SESSION['status'] = "Not Added Successfully";
    $_SESSION['status_code'] = "error";
    header("Location: ../personaltask.php");
}
