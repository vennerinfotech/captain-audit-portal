<?php

require_once ('dbh.php');
require_once ('session.php'); 

if(isset($_POST["btnadd"]))
{
    $fdate = rand();
    date_default_timezone_set('Asia/Kolkata');
    $result = mysqli_query($conn,"insert into tbl_lead (lead_status, lead_tags, lead_source, lead_assigned, lead_name, lead_city, lead_phoneno, lead_address, lead_description, lead_filename, lead_date) values ('".$_POST["leadstatus"]."', 'New', '".$_POST["source"]."', '".$_POST["assigned"]."', '".$_POST["name"]."', '".$_POST["city"]."', '".$_POST["phoneno"]."', '".$_POST["address"]."', '".$_POST["description"]."', '$fdate', '".date('Y-m-d')."')") or die(mysqli_error($conn));

    if($result==true)
    {
        $result1 = mysqli_query($conn,"SELECT  * FROM tbl_users where u_id = '".$_POST['assigned']."'");
        $row1=mysqli_fetch_assoc($result1);
        
        $filename = "../Logfile/".$fdate.".txt";
        $content = $row1['u_name']." ".$_POST['leadstatus']." ".date('Y-m-d')." "."\n";   
        $fp = fopen($filename,"a");
        fwrite($fp,$content);
        fclose($fp);

        $_SESSION['status'] = " Lead Added Successfully";
        $_SESSION['status_code'] = "success";
        header("Location:../add-lead.php");
       
    }
    else
    {
         $_SESSION['status'] = " Lead Not Added Successfully";
        $_SESSION['status_code'] = "error";
        header("Location:../add-lead.php");
    }

}
?>