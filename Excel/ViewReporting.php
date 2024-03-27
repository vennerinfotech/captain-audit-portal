<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
		<th>No.</th>
		<th>Employee Name</th>
        <th>Outlet Name</th>
        <th>Date</th>
        <th>Task attended</th>
        <th>Task Pending/Postpone</th>
        <th>Challenges</th>
        <th>Waiting from</th>
        <th>Alarming task</th>
        <th>Routine task</th>
	</tr>';
	$counter=1;
	
	$startdate = isset($_GET['rdate']) ? $_GET['rdate']: "";
    $outlets = isset($_GET['oid']) ? $_GET['oid']: "";
    $employee = isset($_GET['uid']) ? $_GET['uid']: "";

    if($startdate != "" && $outlets != "" && $employee != ""){
        $stmt="SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' and `r_oid` = '$outlets' and `r_uid` = '$employee' ORDER BY `r_id` DESC";
    }elseif($startdate != "" && $outlets != "" && $employee == ""){
        $stmt="SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' and `r_oid` = '$outlets' ORDER BY `r_id` DESC";
    }elseif($startdate == "" && $outlets == "" && $employee != ""){
        $stmt="SELECT * FROM `tbl_reporting` where `r_uid` = '$employee' ORDER BY `r_id` DESC";
    }elseif($startdate == "" && $outlets != "" && $employee == ""){
        $stmt="SELECT * FROM `tbl_reporting` where `r_oid` = '$outlets' ORDER BY `r_id` DESC";
    }elseif($startdate != "" && $outlets == "" && $employee != ""){
        $stmt="SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' and `r_uid` = '$employee' ORDER BY `r_id` DESC";
    }elseif($startdate != "" && $outlets == "" && $employee == ""){
        $stmt="SELECT * FROM `tbl_reporting` where `r_date` = '$startdate' ORDER BY `r_id` DESC";
    }else{
        if($_SESSION['role']=='Admin'){
            $stmt="SELECT * FROM `tbl_reporting` ORDER BY `r_id` DESC";
        }else{
            $stmt="SELECT * FROM `tbl_reporting` where `r_uid` = '".$_SESSION['id']."' ORDER BY `r_id` DESC";
        }
    }

	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');
	while ($users = mysqli_fetch_assoc($result)) {
		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['r_uname'].'</td>
				<td>'.$users['r_outletname'].'</td>
				<td>'.$users['r_date'].'</td>
				<td>'.nl2br($users['r_attend']).'</td>
				<td>'.nl2br($users['r_ptask']).'</td>
				<td>'.nl2br($users['r_ctask']).'</td>
				<td>'.nl2br($users['r_wtask']).'</td>
				<td>'.nl2br($users['r_altask']).'</td>
				<td>'.str_replace(",","<br>",$users["r_routinetask"]).'</td>
			</tr>';
	}
	$html.='</table>';
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename='.$file.'.xls');
	echo $html;
?>

</table>