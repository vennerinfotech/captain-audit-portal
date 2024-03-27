<?php
    include("dbh.php");
    include("session.php");

    $json = array();
    $eventArray = array();
    $sqlQuery = "SELECT `pt_id` as `id`, `pname` as `title`, `startdate` as `start`, `duedate` as `end` FROM `tbl_personaltask` WHERE `status`= 'Due' and `u_id` = '".$_SESSION['id']."' ORDER BY `pt_id`";
    $result = mysqli_query($conn, $sqlQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    $sqlQuery = "SELECT `pid` as `id`, `pname` as `title`, `startdate` as `start`, `duedate` as `end` FROM `project` WHERE `status`= 'Due' and `u_id` = '".$_SESSION['id']."'  ORDER BY `pid`";
    $result = mysqli_query($conn, $sqlQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);

    mysqli_close($conn);
    echo json_encode($eventArray);
?>