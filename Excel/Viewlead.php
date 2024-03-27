<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
		<th>No.</th>
		<th>Date</th>
        <th>Lead Status</th>
        <th>Lead Tags</th>
        <th>Lead Source</th>';
        if($_SESSION['role'] == "Admin"){
        	$html.='<th>Lead Assigned</th>';
        }                                                   
        $html.='<th>Name</th>
        <th>City</th>
        <th>Phone No.</th>
		<th>Description</th>
	</tr>';
	$counter=1;
	if($_GET['st'] != "" && $_GET['end'] != ""){
		$startdate = date("Y-m-d", strtotime($_GET['st']));
        $enddate = date('Y-m-d', strtotime($_GET['end'] . ' + 1 days'));

        if($_SESSION['role']=="Admin"){
            $stmt = "SELECT * FROM tbl_lead where DATE(lead_date) between '$startdate' and '$enddate' ORDER BY lead_id DESC ";
        }else
        {
            $stmt = "SELECT * FROM tbl_lead WHERE lead_assigned = '".$_SESSION['id']."' and DATE(lead_date) between '$startdate' and '$enddate' ORDER BY lead_id DESC ";
        }
	}
	else
	{
		if($_SESSION['role']=="Admin"){
            $stmt = "SELECT * FROM tbl_lead ORDER BY lead_id DESC";
        }else
        {
            $stmt = "SELECT * FROM tbl_lead WHERE lead_assigned = '".$_SESSION['id']."' ORDER BY lead_id DESC";
        }
	}
	
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');

	while ($users = mysqli_fetch_assoc($result)) {
		$html.='<tr>
			<td>'.$counter++.'</td>
			<td>'.$users['lead_date'].'</td>
			<td>'.$users['lead_status'].'</td>
			<td>'.$users['lead_tags'].'</td>
			<td>'.$users['lead_source'].'</td>';
			if($_SESSION['role'] == "Admin"){
				$result1 = mysqli_query($conn,"SELECT  * FROM tbl_users where u_id = '".$users["lead_assigned"]."'");
		        $row1=mysqli_fetch_assoc($result1);
			$html.='<td>'.$row1["u_name"].'</td>';

		    }
		$html.='<td>'.$users['lead_name'].'</td>
			<td>'.$users['lead_city'].'</td>
			<td>'.$users['lead_phoneno'].'</td>
			<td>'.$users['lead_description'].'</td>
		</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>  