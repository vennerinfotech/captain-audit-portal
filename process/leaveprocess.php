<!-- [ Session ] start -->
    <?php require_once ('../process/dbh.php');
    require_once ('../session.php');

//getting id of the data from url
$id = $_SESSION['id'];
$reason = $_POST['leavereason'];

$start = $_POST['leavestartdate'];
//echo "$reason";
$end = $_POST['leaveenddate'];

$sql = "INSERT INTO `tbl_userleave`(`ul_uid`, `ul_startdate`, `ul_enddate`, `ul_reason`, `ul_status`) VALUES ('$id','$start','$end','$reason','Pending')";

$result = mysqli_query($conn, $sql);
if($result==true){
    $_SESSION['status'] = "Your Leave Submitted Successfully";
    $_SESSION['status_code'] = "success";
    header("Location:../emp-applyleave.php");
}
else
{ 
    $_SESSION['status'] = "Your Leave Not Submitted!";
    $_SESSION['status_code'] = "error";
    header("Location:../emp-applyleave.php");
}

//redirecting to the display page (index.php in our case)

?>