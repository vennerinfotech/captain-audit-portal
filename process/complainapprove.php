<!-- [ Session ] start -->
<?php require_once ('../process/dbh.php');
require_once ('../session.php');
//getting id of the data from url
$uid = $_GET['id'];
$sid = $_GET['token'];

$sql = "UPDATE `tbl_complain` SET `status`='Accepted' WHERE `u_id` = '$uid' and `com_id` = '$sid'";

$result = mysqli_query($conn, $sql);
if($result==true){
	$_SESSION['status'] = "Complain Accepted Successfully";
    $_SESSION['status_code'] = "success";
	header("Location:../view-complain.php");
}
else
{ 
	$_SESSION['status'] = "Complain Not Accepted";
    $_SESSION['status_code'] = "error";
	header("Location:../view-complain.php");
}

//redirecting to the display page (index.php in our case)

?>