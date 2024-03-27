<?php 
  require_once ('dbh.php');
  require_once ('session.php'); 

  if(isset($_POST["btnadd"]))
  {
    $result = mysqli_query($conn,"update project set u_id='".$_POST["txtselcat"]."',pname='".$_POST["txttsk"]."',startdate='".$_POST["txtmonth"]."',duedate='".$_POST["txtdat"]."', priority='".$_POST["projectpririty"]."', subdate='', status='".$_POST["substatus"]."', proof_info=concat(proof_info,'\n','".$_POST["prooftext"]."') where pid='".$_POST["hfadminid"]."'") or die(mysqli_error($conn));

     if($result)
    {
      /* echo "<script>window.location='view-royalty.php'</script>";*/
        $_SESSION['status'] = " Your Data Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: ../projectstatus.php");
    }
    else
    {
        $_SESSION['status'] = "Your Data Not Updated Successfully!";
        $_SESSION['status_code'] = "error";
        header("Location: ../projectstatus.php");
    }
  }
?>