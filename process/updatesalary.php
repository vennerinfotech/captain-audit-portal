<?php

require_once ('../process/dbh.php');
require_once ('../session.php'); 

if(isset($_POST["btnupd"]))
{
    $result = mysqli_query($conn,"UPDATE tbl_salary SET u_id = '".$_POST["sel_depart"]."', s_month = '".$_POST["salarymonth"]."', s_date = '".$_POST["salarydate"]."', s_basicsalary = '".$_POST["basicsalary"]."', s_advamount = '".$_POST["advance"]."', s_tdworked = '".$_POST["totalworkdays"]."', s_gsamount = '".$_POST["grosssalary"]."', s_adjamount = '".$_POST["adjustment"]."', s_insamount = '".$_POST["insentive"]."', s_tpamount = '".$_POST["totalamount"]."', s_paymethod = '".$_POST["pmethod"]."' WHERE s_id = '".$_POST["recid"]."'") or die(mysqli_error($conn)); 
    if($result==true)
    {
        
        $_SESSION['status'] = " Salary Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../view-salary.php");
       
    }
    else
    {
         $_SESSION['status'] = " Salary Not Updated Successfully";
        $_SESSION['status_code'] = "error";
        header("Location:../add-salary.php");
    }

}
?>