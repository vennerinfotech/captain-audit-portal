<?php
include("../process/dbh.php");
include("../process/session.php");
$html='<table>
	<tr>
		<td>No.</td>
		<td>User Name</td>
		<td>Purpose</td>
		<td>Note</td>
		<td>Date</td>
		<td>Status</td>
	</tr>';
	$counter=1;
	$id = $_SESSION['id'];
	if($_SESSION['role']=="Admin")
        {
            $stmt="SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id = `tbl_users`.u_id";
        }
        elseif ($_SESSION['role']=="Store") 
        {
            $stmt="SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id ='".$_SESSION['id']."'  AND `tbl_complain`.u_id =`tbl_users`.u_id ";
        }
        else
        {
            return;
        }
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');
	while ($users = mysqli_fetch_assoc($result)) {
		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['u_name'].'</td>
				<td>'.$users['selectpur'].'</td>
				<td>'.$users['note'].'</td>
				<td>'.$users['created_at'].'</td>
				<td>'.$users['status'].'</td>
			</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>