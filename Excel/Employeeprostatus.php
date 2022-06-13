<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
		<td>No.</td>
		<td>Employee Name</td>
		<td>Project Name</td>
		<td>Start Date</td>
		<td>End Date</td>
		<td>Priority</td>
		<td>Submited Date</td>
		<td>Total Days</td>
		<td>Status</td>
	</tr>';
	$counter=1;
	$stmt = "SELECT * from `project`,`tbl_users` where  `project`.u_id = `tbl_users`.u_id order by subdate desc";
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');

	while ($users = mysqli_fetch_assoc($result)) {
		 $date1_ts = strtotime($users['duedate']);
            $date2_ts = strtotime($users['subdate']);
            $diff = $date2_ts - $date1_ts;
            
            if($users['subdate']==""){
            	$dateDiff = '-';
            }else{
            	$dateDiff =  round($diff / 86400);
            }
		$html.='<tr>
			<td>'.$counter++.'</td>
			<td>'.$users['u_name'].'</td>
			<td>'.$users['pname'].'</td>
			<td>'.$users['startdate'].'</td>
			<td>'.$users['duedate'].'</td>
			<td>'.$users['priority'].'</td>
			<td>'.$users['subdate'].'</td>
			<td>'.$dateDiff.'</td>
			<td>'.$users['status'].'</td>
		</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>