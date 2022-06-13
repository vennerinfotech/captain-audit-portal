<?php

require_once ('../process/dbh.php');
require_once ('../session.php'); 

if(isset($_POST["btnupd"]))
{
    $result = mysqli_query($conn,"UPDATE tbl_advance SET u_id = '".$_POST["sel_depart"]."', adv_date = '".$_POST["advdate"]."', adv_amount = '".$_POST["advamount"]."', adv_description = '".$_POST["advdescription"]."' where adv_id = '".$_POST['recid']."'") or die(mysqli_error($conn)); 
    if($result==true)
    {
        
        $_SESSION['status'] = " Advance Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../view-advance.php");
       
    }
    else
    {
         $_SESSION['status'] = " Advance Not Updated Successfully";
        $_SESSION['status_code'] = "error";
        header("Location:../add-advance.php");
    }

}
?>