<?php
include "dbh.php";
require_once ('session.php');
  
  if(isset($_POST['status']) && isset($_POST['id']))
  {
	  date_default_timezone_set('Asia/Kolkata');
        $leaddate = date( 'Y-m-d H:i:s');
    $status = $_POST['status'];
	  echo $status;
    $id = $_POST['id'];
    $fname = $_POST['filename'];
    $res=mysqli_query($conn,"UPDATE tbl_lead SET lead_status = '$status', lead_date = '$leaddate' where lead_id='".$id."'");
    if($res){
      
      $result1 = mysqli_query($conn,"SELECT  * FROM tbl_users where u_id = '".$_SESSION['id']."'");
      $row1=mysqli_fetch_assoc($result1);

      $filename = "../Logfile/".$fname.".txt";
      $content = $row1['u_name']." ".$status." ".$date." "."\n";   
      $fp = fopen($filename,"a");
      fwrite($fp,$content);
      fclose($fp);

      echo "Status Updated Successfully";
    }
    else{
      echo "Status Not Updated Successfully";
    }
  }
?>