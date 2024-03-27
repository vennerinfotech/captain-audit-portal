<?php
include("../process/dbh.php");
include("../process/session.php");
$html='<table>
	<tr>
		<th>No.</th>
		<th>User Name</th>
		<th>In - Date / Time</th>
		<th>Out - Date / Time</th>
		<th>Working Hours</th>
		<th>Points</th>
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
	$point = 0;
	$totalpoint = 0;
	$getpoint = 0;
	$file = date('Y-m-d H:i:s');
	while ($users = mysqli_fetch_assoc($result)) {
		$totalpoint = $totalpoint + 5;
		if($users["udate"] == "")
	    {	
	        $hour = '';
	        $point = 0;
	        $getpoint = $getpoint + 0;
	    }
	    else
	    {
	    	$date1 = $users["cdate"];
            $date2 = $users["udate"];
	    	$hour = round((strtotime($date2) - strtotime($date1))/3600, 1);
	    	$point = 5;
	    	$getpoint = $getpoint + 5;
	    }
		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['u_name'].'</td>
				<td>'.$users['cdate'].'</td>
				<td>'.$users['udate'].'</td>
				<td>'.$hour.'</td>
				<td>'.$point.'</td>
			</tr>';
	}
	$html.='<tr>
				<th></th>
				<th></th>
				<th></th>
				<th>Total Point: '.$totalpoint.'</th>
				<th>Achived Point: '.$getpoint.'</th>
				<th>Average: '.round(($getpoint * 100)/$totalpoint, 2).'%</th>
			</tr>';
	$html.='</table>';
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename='.$file.'.xls');
	echo $html;
?>

</table>