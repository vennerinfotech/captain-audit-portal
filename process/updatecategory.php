<?php

require_once ('../process/dbh.php');
require_once ('../session.php');

$id = $_GET['id'];
$name = $_POST['catname'];

$sql = "UPDATE `tbl_category` SET cat_name = '$name' WHERE cat_id = '$id'";

$result = mysqli_query($conn, $sql);

if(($result) == 1){

    $_SESSION['status'] = "Your Data Updated Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: ../add-expcategory.php");
}
else
{
    $_SESSION['status'] = "Your Data Not Updated";
    $_SESSION['status_code'] = "error";
    header("Location: ../add-expcategory.php");
}

?>