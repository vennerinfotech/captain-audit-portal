<?php
//including the database connection file
include("process/dbh.php");
include("process/session.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM tbl_users WHERE u_id=$id");

if($result==true){
	$_SESSION['status'] = "Deleted Successfully";
    $_SESSION['status_code'] = "success";
	header("Location:show-user.php");
}
else
{ 
	$_SESSION['status'] = "Not Deleted Successfully";
    $_SESSION['status_code'] = "error";
	header("Location:show-user.php");
}

//redirecting to the display page (index.php in our case)
?>
