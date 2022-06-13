<?php
session_start();
require_once ('../process/dbh.php');

if($_POST['inlineRadioOptions'] == "admin")
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $usertoken = $_POST['usertoken'];
  $musertoken = $_GET['tkn'];

  $sql = "SELECT * from `tbl_users` WHERE u_email = '$email' AND u_password = '$password'";

  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $role = $row["u_role"];
      $name = $row["u_name"];
      $uid = $row["u_id"];
    }
  } 

  if(mysqli_num_rows($result) == 1){
    //echo ("logged in");
    // Storing username, useremail, role, id in session variable
    $_SESSION['useremail'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['role'] = $role;
    $_SESSION['id'] = $uid;
    if($musertoken == "")
    {
      mysqli_query($conn,"UPDATE tbl_users set u_token='$usertoken' WHERE u_email='$email' and u_name='$name' and u_role='$role' and u_id ='$uid'") or die(mysqli_error($conn));
    }
    else
    {
      mysqli_query($conn,"UPDATE tbl_users set u_mtoken='$musertoken' WHERE u_email='$email' and u_name='$name' and u_role='$role' and u_id ='$uid'") or die(mysqli_error($conn));
    }
    
    if($_SESSION['role']=="Admin"){
      header("Location:../userdashboard.php");
    }
    elseif ($_SESSION['role']=="Employee") {
      header("Location:../emp-dashboard.php");
    }else{
      header("Location:../emp-projectassign.php");
    }
  }
  else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Invalid Email or Password')
      window.location.href='javascript:history.go(-1)';
      </SCRIPT>");
  }
}
else
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $usertoken = $_POST['usertoken'];
  $musertoken = $_GET['tkn'];

  $sql = "SELECT * from `tbl_staff` WHERE email_id = '$email' AND password = '$password'";

  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $role = "staff";
      $name = $row["staffame"];
      $staffid = $row["ustaff_id"];
      $uid = $row["u_id"];
    }
  } 

  if(mysqli_num_rows($result) == 1){
    //echo ("logged in");
    // Storing username, useremail, role, id in session variable
    $_SESSION['useremail'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['role'] = $role;
    $_SESSION['staffid'] = $staffid;
    $_SESSION['id'] = $uid;
    
    header("Location:../staffview-attandence.php");
  }
  else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Invalid Email or Password')
      window.location.href='javascript:history.go(-1)';
      </SCRIPT>");
  }
}
?>