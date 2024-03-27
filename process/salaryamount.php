<?php
include "dbh.php";

$users_arr = array();
$hsal = 0;
$msal = 0;

/*if(isset($_POST['depart'])){
   $departid = mysqli_real_escape_string($conn,$_POST['depart']); // department id
}*/
/*
if(isset($_POST['month']) || isset($_POST['depart'])){*/
  // peramitors
  /*$did = "41";
  $month = "2021-11";*/

  $did = $_POST['depart'];
  $month = $_POST['month'];

  //Getting the Salary of the selected User
  $sql1 = "SELECT `u_salary` FROM `tbl_users` WHERE `u_id`='".$did."'";
  $result1 = mysqli_query($conn,$sql1);
  $row1 = mysqli_fetch_assoc($result1);

//Geting the current time stamp and month
  $startDate = "$month"."-"."01";
  $endDate = date("Y-m-t", strtotime("$month"."-"."01"));
  $workingDays = 0;
  $startTimestamp = strtotime($startDate);
  $endTimestamp = strtotime($endDate);
  $timestamp = strtotime($month);
  $m = date("m", $timestamp);
  
  //Geting the current month working days 
  for($i=$startTimestamp; $i<=$endTimestamp; $i = $i+(60*60*24) ){
    if(date("N",$i) <= 6) $workingDays = $workingDays + 1;
  }

  date_default_timezone_set('Asia/Kolkata');
  
  //Query to getting the Paying Salary Amonut
  $result2=mysqli_query($conn,"SELECT * FROM `tbl_dayselfi` where u_id = '$did' and MONTH(udate) = '$m'") or die(mysqli_error($conn));

    $count = 0;
    $cnt = 0;
    while($row2=mysqli_fetch_assoc($result2))
    {
      $Hours = round((strtotime($row2['udate']) - strtotime($row2['cdate']))/3600, 1);
      $dsal = round($row1['u_salary']/$workingDays, 1);
      if($Hours >= 5){
          $count += $dsal;
      }
      else
      {
        $count += ($dsal/2);
      }
      $cnt++;
    } 

    $sql4 = "SELECT sum(s_advamount) as amount FROM `tbl_salary` WHERE `u_id`='".$did."'";
    $result4 = mysqli_query($conn,$sql4);
    $row4 = mysqli_fetch_assoc($result4);

    //Getting the Pending Paying salary amount
    date_default_timezone_set('Asia/Kolkata');
    $sql3 = "SELECT sum(adv_amount) as amount FROM `tbl_advance` WHERE `u_id`='".$did."' and MONTH(adv_date) = '$m'";
    $result3 = mysqli_query($conn,$sql3);
    $row3 = mysqli_fetch_assoc($result3);

    if($row3['amount'] != "" && $row4['amount'] != ""){
      $userid = $row3['amount'] - $row4['amount'];
    }
    else{
      $userid = 0;
    }
    

    $users_arr =  array($row1['u_salary'],$userid,round($count, 0),$cnt);

  // encoding array to json format
  echo json_encode($users_arr);
/*}*/