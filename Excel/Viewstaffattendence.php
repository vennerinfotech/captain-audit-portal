<?php
include("../process/dbh.php");
include("../session.php");
if($_SESSION['role']=='Admin'){
	$html='<table>
	<tr>
		<td>No.</td>
		<td>Store Name</td>
		<td>Staff Name</td>
		<td>In - Date / Time</td>
		<td>Out - Date / Time</td>
		<td>Working Hours</td>
	</tr>';
}else{
	$html='<table>
	<tr>
		<td>No.</td>
		<td>Staff Name</td>
		<td>In - Date / Time</td>
		<td>Out - Date / Time</td>
		<td>Working Hours</td>
	</tr>';
}

	$counter=1;
	$id = $_SESSION['id'];
	if($_SESSION['role']=='Admin'){
        	$stmt="SELECT * FROM `tbl_ststaffattendence`, `tbl_users`, `tbl_staff`where `tbl_ststaffattendence`.store_id = `tbl_users`.u_id";
        }else{
            $stmt="SELECT * FROM `tbl_ststaffattendence`, `tbl_users`, `tbl_staff` where `tbl_ststaffattendence`.store_id = `tbl_users`.u_id and `tbl_users`.u_id='".$_SESSION['id']."' and `tbl_ststaffattendence`.store_id = '".$_SESSION['id']."'";
        }
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');
	while ($users = mysqli_fetch_assoc($result)) {
		if($users["udate"] == "")
	    {	
	        $hour = '';
	    }
	    else
	    {
	    	$date1 = $users["cdate"];
            $date2 = $users["udate"];
	    	$hour = round((strtotime($date2) - strtotime($date1))/3600, 1);
	    }
	    if($_SESSION['role']=='Admin'){
	    	$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['u_name'].'</td>
				<td>'.$users['staffame'].'</td>
				<td>'.$users['cdate'].'</td>
				<td>'.$users['udate'].'</td>
				<td>'.$hour.'</td>
			</tr>';
	    }else{
	    	$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['staffame'].'</td>
				<td>'.$users['cdate'].'</td>
				<td>'.$users['udate'].'</td>
				<td>'.$hour.'</td>
			</tr>';
	    }
		
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>