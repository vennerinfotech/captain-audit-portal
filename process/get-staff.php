<?php
include "dbh.php";

$departid = 0;

if (isset($_POST['depart'])) {
    $departid = mysqli_real_escape_string($conn, $_POST['depart']); // department id
}

$users_arr = array();

if ($departid > 0) {
    $sql = "SELECT `u_id`,`u_name` FROM `tbl_users` WHERE `u_outletid`='" . $departid . "' and `u_role` = 'Staff'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $userid = $row['u_id'];
        $name = $row['u_name'];

        $users_arr[] = array("id" => $userid, "name" => $name);
    }
}

// encoding array to json format
echo json_encode($users_arr);
