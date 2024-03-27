<?php require_once ('dbh.php');
require_once ('session.php'); ?>
<?php
if(isset($_POST["btnadd"]))
{
    $result = mysqli_query($conn,"update tbl_royalty set u_id='".$_POST["txtselcat"]."',s_date='".$_POST["txtdat"]."',e_date='".$_POST["txtdate"]."',month='".$_POST["txtmonth"]."',amount='".$_POST["txamount"]."' where royalty_id='".$_POST["hfadminid"]."'") or die(mysqli_error($conn));

     if($result)
    {
      /* echo "<script>window.location='view-royalty.php'</script>";*/
        $_SESSION['status'] = " Your Data Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: ../view-royalty.php");
    }
    else
    {
        $_SESSION['status'] = "Your Data Not Updated Successfully!";
        $_SESSION['status_code'] = "error";
        header("Location: ../view-royalty.php");
    }

}
?>