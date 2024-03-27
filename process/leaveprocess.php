<!-- [ Session ] start -->
    <?php require_once ('dbh.php');
    require_once ('session.php');

//getting id of the data from url
$id = $_SESSION['id'];
$reason = $_POST['leavereason'];

$start = $_POST['leavestartdate'];
//echo "$reason";
$end = $_POST['leaveenddate'];

date_default_timezone_set('Asia/Kolkata');

$sql = "INSERT INTO `tbl_userleave`(`ul_uid`, `ul_startdate`, `ul_enddate`,	`ul_datetime`, `ul_reason`, `ul_status`) VALUES ('$id','$start','$end','".date( 'Y-m-d H:i:s')."','$reason','Pending')";

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