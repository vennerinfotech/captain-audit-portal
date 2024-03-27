<?php
session_start();
require('dbh.php');

  $email = ($_POST['email'] != "") ? $_POST['email'] : "";
  $password = ($_POST['password'] != "") ? $_POST['password'] : "";
  $usertoken = ($_POST['usertoken'] != "") ? $_POST['usertoken'] : "";
  $musertoken = ($_GET['tkn'] != "") ? $_GET['tkn'] : "";

  $sql = "SELECT * from `tbl_users` WHERE `u_email` = '$email' AND `u_password` = '$password'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $_SESSION['useremail'] = $email;
      ($row['u_role'] != "") ? $_SESSION['role'] = $row['u_role'] : $_SESSION['role'] = "";
      ($row['u_outletid'] != "") ? $_SESSION['outlet_id'] = $row['u_outletid'] : $_SESSION['outlet_id'] = "";
      ($row['u_name'] != "") ? $_SESSION['name'] = $row['u_name'] : $_SESSION['name'] = "";
      ($row['u_id'] != "") ? $_SESSION['id'] = $row['u_id'] : $_SESSION['id'] = "";
      ($row['u_responsibility'] != "") ? $_SESSION['responsibiity'] = $row['u_responsibility'] : $_SESSION['responsibiity'] = "";
      ($row['u_primeobjectives'] != "") ? $_SESSION['status'] = $row['u_primeobjectives'] : $_SESSION['status'] = "Good Morning";
      ($row['u_routinetask'] != "") ? $_SESSION['routinetask'] = $row['u_routinetask'] : $_SESSION['routinetask'] = "";
      ($row['u_assignedoutlets'] != "") ? $_SESSION['assignedoutlets'] = $row['u_assignedoutlets'] : $_SESSION['assignedoutlets'] = "";
    }

    if ($musertoken == "") {
      mysqli_query($conn, "UPDATE tbl_users set u_token='$usertoken' WHERE u_email='$email'") or die(mysqli_error($conn));
    } else {
      mysqli_query($conn, "UPDATE tbl_users set u_mtoken='$musertoken' WHERE u_email='$email'") or die(mysqli_error($conn));
    }

    header("Location:../dashboard.php");
  } else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Invalid Email or Password')
      window.location.href='javascript:history.go(-1)';
      </SCRIPT>");
  }
