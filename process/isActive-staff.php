<?php require_once ('../process/dbh.php');
require_once ('../session.php'); ?>
<?php 
$qry = mysqli_query($conn,"Select isActive from tbl_staff where ustaff_id='".$_POST['hfdid']."'");
$row=mysqli_fetch_assoc($qry);

if($row['isActive']=="Active"){
	$result = mysqli_query($conn,"UPDATE tbl_staff SET isActive='Deactive', reson = '".$_POST['reson']."' where ustaff_id='".$_POST['hfdid']."'") or die(mysqli_error($conn));
	 $_SESSION['status'] = "Deactive Successfully";
     $_SESSION['status_code'] = "success";
     header("Location:../view-staff.php");
}
else
{
	$result = mysqli_query($conn,"UPDATE tbl_staff SET isActive='Active', reson = '".$_POST['reson']."' where ustaff_id='".$_POST['hfdid']."'") or die(mysqli_error($conn));
	 $_SESSION['status'] = "Active Successfully";
     $_SESSION['status_code'] = "success";
     header("Location:../view-staff.php");
}

?>