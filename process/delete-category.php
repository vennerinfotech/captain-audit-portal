<?php
//including the database connection file
include("dbh.php");
include("../session.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM tbl_category WHERE cat_id = '$id'");

if($result==true){
	$_SESSION['status'] = "Deleted Successfully";
    $_SESSION['status_code'] = "success";
	header("Location:../add-expcategory.php");
}
else
{ 
	$_SESSION['status'] = "Not Deleted Successfully";
    $_SESSION['status_code'] = "error";
	header("Location:../add-expcategory.php");
}

//redirecting to the display page (index.php in our case)
?>