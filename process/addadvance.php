<?php

require_once ('dbh.php');
require_once ('session.php'); 

if(isset($_POST["btnadd"]))
{
    date_default_timezone_set('Asia/Kolkata');
    $result = mysqli_query($conn,"insert into tbl_advance (u_id, adv_date, adv_amount, adv_description) values ('".$_POST["sel_depart"]."', '".$_POST["advdate"]."', '".$_POST["advamount"]."', '".$_POST["advdescription"]."')") or die(mysqli_error($conn)); 

    if($result==true)
    {
        
        $_SESSION['status'] = " Advance Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../add-salary.php");
       
    }
    else
    {
         $_SESSION['status'] = " Advance Not Added Successfully";
        $_SESSION['status_code'] = "error";
        header("Location:../add-salary.php");
    }

}
?>