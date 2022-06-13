<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
		<td>No.</td>
		<td>Name</td>
		<td>Amount</td>
		<td>Start Date</td>
		<td>End Date</td>
		<td>Royalty Month</td>
		<td>Submited Date</td>
		<td>Total Days</td>
		<td>Status</td>
	</tr>';
	$counter=1;
	$id = $_SESSION['id'];
	$stmt = "SELECT * FROM `tbl_royalty`, `tbl_users` where `tbl_royalty`.u_id = `tbl_users`.u_id ";
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');

	while ($users = mysqli_fetch_assoc($result)) {
		$date1_ts = strtotime($users['e_date']);
            $date2_ts = strtotime($users['sdate']);
            $diff = $date2_ts - $date1_ts;
            
            if($users["sdate"]==""){
            	$dateDiff =  "";
            }
           	else
            {
                $dateDiff =  round($diff / 86400);
            }
		$html.='<tr>
			<td>'.$counter++.'</td>
			<td>'.$users['u_name'].'</td>
			<td>'.$users['amount'].'</td>
			<td>'.$users['s_date'].'</td>
			<td>'.$users['e_date'].'</td>
			<td>'.$users['month'].'</td>
			<td>'.$users['sdate'].'</td>
			<td>'.$dateDiff.'</td>
			<td>'.$users['stuts'].'</td>
		</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>