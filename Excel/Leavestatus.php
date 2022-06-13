<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
		<td>No.</td>
		<td>Start Date</td>
		<td>End Date</td>
		<td>Total Days</td>
		<td>Reson</td>
		<td>Status</td>
	</tr>';
	$counter=1;
	$id = $_SESSION['id'];
	$stmt = "Select * From tbl_users, tbl_userleave Where tbl_users.u_id = $id and tbl_userleave.ul_uid = $id order by tbl_userleave.ul_id";
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');

	while ($users = mysqli_fetch_assoc($result)) {
		$date1_ts = strtotime($users['ul_startdate']);
            $date2_ts = strtotime($users['ul_enddate']);
            $diff = $date2_ts - $date1_ts;
            $dateDiff =  round($diff / 86400);
		$html.='<tr>
			<td>'.$counter++.'</td>
			<td>'.$users['ul_startdate'].'</td>
			<td>'.$users['ul_enddate'].'</td>
			<td>'.$dateDiff.'</td>
			<td>'.$users['ul_reason'].'</td>
			<td>'.$users['ul_status'].'</td>
		</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>