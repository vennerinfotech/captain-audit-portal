
<?php
require_once('dbh.php');
require_once('session.php');

$staffid = $_GET['edit'];
$addedBy =  $_POST['storeid'];
$staffName =  $_POST['staffName'];
$staffAddress =  $_POST['staffAddress'];
$staffJoindate =  $_POST['joiningDate'];
$staffSalary =  $_POST['staffSalary'];
$staffPosition =  $_POST['staffPostion'];
$stafEmail =  $_POST['staffEmail'];
$staffPassword =  $_POST['staffPassword'];
$staffContact =  $_POST['staffPhone'];

if (isset($_POST["btnupdate"])) {

  $result = mysqli_query($conn, "UPDATE `tbl_staff` SET `u_id`='$addedBy', `staffame`='$staffName', `staff_address`='$staffAddress', `st_joiningdate`='$staffJoindate', `st_salary`='$staffSalary', `st_position`='$staffPosition', `email_id`='$stafEmail', `password`='$staffPassword', `contact`='$staffContact' where `ustaff_id`='$staffid' ") or die(mysqli_error($conn));

  if ($result == true) {
    $_SESSION['status'] = "Your Data Updated Successfully";
    $_SESSION['status_code'] = "success";
    header("Location:../view-staff.php");
  } else {
    $_SESSION['status'] = "Your Data Not Updated!";
    $_SESSION['status_code'] = "error";
    header("Location:../view-staff.php");
  }
}
?>