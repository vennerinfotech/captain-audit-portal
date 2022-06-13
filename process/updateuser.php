<?php

require_once ('../process/dbh.php');
require_once ('../session.php');

$id = $_GET['id'];
$name = $_POST['username'];
$address = $_POST['useraddress'];
$email = $_POST['useremail'];
$password = $_POST['userpassword'];
$gender = $_POST['usergender'];
$birthday =$_POST['userbirtdate'];
$contact = $_POST['usercontactno'];
$officeno = $_POST['officecontactno'];
$role = $_POST['userrole'];
$salary = $_POST['usersalary'];
$joindate = $_POST['joindate'];
//echo "$birthday";
$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png' , 'jpg' , 'jpeg');

if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'images/'.$filename;
    move_uploaded_file($filetemp, $destinationfile);

$sql = "UPDATE `tbl_users` SET u_name = '$name', u_email = '$email', u_password = '$password', u_role = '$role', u_birthday = '$birthday', u_gender = '$gender', u_contact = '$contact', u_officeno = '$officeno', u_address = '$address', u_salary = '$salary', u_pic = '$destinationfile', u_joindate = '$joindate' WHERE u_id = '$id'";

$result = mysqli_query($conn, $sql);

if(($result) == 1){

    $_SESSION['status'] = "Your Data Updated Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: ../show-user.php");
}

else
{
    $_SESSION['status'] = "Your Data Not Updated";
    $_SESSION['status_code'] = "error";
    header("Location: ../show-user.php");
}

}

else{

$sql = "UPDATE `tbl_users` SET u_name = '$name', u_email = '$email', u_password = '$password', u_role = '$role', u_birthday = '$birthday', u_gender = '$gender', u_contact = '$contact', u_officeno = '$officeno', u_address = '$address', u_salary = '$salary', u_joindate = '$joindate' WHERE u_id = '$id'";

$result = mysqli_query($conn, $sql);

if(($result) == 1){
    
    $_SESSION['status'] = "Your Data Updated Successfully";
    $_SESSION['status_code'] = "success";
    header("Location: ../show-user.php");
}

else{
     $_SESSION['status'] = "Your Data Not Updated";
    $_SESSION['status_code'] = "error";
    header("Location: ../show-user.php");
}
}
?>