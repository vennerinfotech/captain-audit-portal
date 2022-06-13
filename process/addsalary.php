<?php

require_once ('../process/dbh.php');
require_once ('../session.php'); 

if(isset($_POST["btnadd"]))
{
    date_default_timezone_set('Asia/Kolkata');
    $result = mysqli_query($conn,"insert into tbl_salary (u_id, s_month, s_date, s_basicsalary, s_advamount, s_tdworked, s_gsamount, s_adjamount, s_insamount, s_tpamount, s_paymethod) values ('".$_POST["sel_depart"]."', '".$_POST["salarymonth"]."', '".$_POST["salarydate"]."', '".$_POST["basicsalary"]."', '".$_POST["advance"]."', '".$_POST["totalworkdays"]."', '".$_POST["grosssalary"]."', '".$_POST["adjustment"]."', '".$_POST["insentive"]."', '".$_POST["totalamount"]."', '".$_POST["pmethod"]."')") or die(mysqli_error($conn)); 
    if($result==true)
    {
        
        $_SESSION['status'] = " Payment Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../add-salary.php");
       
    }
    else
    {
         $_SESSION['status'] = " Payment Not Added Successfully";
        $_SESSION['status_code'] = "error";
        header("Location:../add-salary.php");
    }

}
?>