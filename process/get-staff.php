<?php
include "../process/dbh.php";

$departid = 0;

if(isset($_POST['depart'])){
   $departid = mysqli_real_escape_string($conn,$_POST['depart']); // department id
}

$users_arr = array();

if($departid > 0){
    $sql = "SELECT `ustaff_id`,`staffame` FROM `tbl_staff` WHERE `u_id`='".$departid."' and isActive='Active'";

    $result = mysqli_query($conn,$sql);
    
    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['ustaff_id'];
        $name = $row['staffame'];
    
        $users_arr[] = array("id" => $userid, "name" => $name);
    }
}

// encoding array to json format
echo json_encode($users_arr);