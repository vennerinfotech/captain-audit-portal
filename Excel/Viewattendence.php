<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
		<td>No.</td>
		<td>User Name</td>
		<td>In - Date / Time</td>
		<td>Out - Date / Time</td>
		<td>Working Hours</td>
	</tr>';
	$counter=1;
	if($_GET['st'] != "" && $_GET['end'] != ""){
		$startdate = date("Y-m-d", strtotime($_GET['st']));
        $enddate = date('Y-m-d', strtotime($_GET['end'] . ' + 1 days'));

        if($_SESSION['role']=='Admin'){
        	$stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id and tbl_dayselfi.cdate between '$startdate' and '$enddate'";
        }else{
            $stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='".$_SESSION['id']."' and `tbl_users`.u_id = '".$_SESSION['id']."' and tbl_dayselfi.cdate between '$startdate' and '$enddate'";
        }
	}
	else
	{
		if($_SESSION['role']=='Admin'){
        	$stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id";
        }else{
            $stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='".$_SESSION['id']."' and `tbl_users`.u_id = '".$_SESSION['id']."'";
        }
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
		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['u_name'].'</td>
				<td>'.$users['cdate'].'</td>
				<td>'.$users['udate'].'</td>
				<td>'.$hour.'</td>
			</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>