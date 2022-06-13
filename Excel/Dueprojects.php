<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
		<td>No.</td>
		<td>Project Name</td>
		<td>Start Date</td>
		<td>End Date</td>
		<td>Status</td>
	</tr>';
	$counter=1;
    $id = $_SESSION['id'];
	$stmt = "SELECT * FROM `project` WHERE u_id = $id and status = 'Due'";
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');

	while ($users = mysqli_fetch_assoc($result)) {
		$html.='<tr>
			<td>'.$counter++.'</td>
			<td>'.$users['pname'].'</td>
			<td>'.$users['startdate'].'</td>
			<td>'.$users['duedate'].'</td>
			<td>'.$users['status'].'</td>
		</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>