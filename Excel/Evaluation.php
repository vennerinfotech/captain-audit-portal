<?php
include("../process/dbh.php");
include("../session.php");
$html='<table>
	<tr>
        <th>No.</th>
        <th>Employee Name</th>
        <th>Task Name</th>
        <th>Start Date</th>
        <th>Due Date</th>
        <th>Submit Date</th>
        <th>Status</th>
        <th>Points</th>
	</tr>';
	$counter=1;
    $totaldays=0;
    $diffdays=0;
    $totalP = 0;
    $totalA = 0;
	if($_GET['st'] != ""){
        $mdate = date("m", strtotime($_GET['st'] ));
        $ydate = date("Y", strtotime($_GET['st'] ));
        $user = $_GET['uid'];
        if($_SESSION['role']=='Admin'){
        	$stmt="SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
            project.status as status,project.subdate as subdate
            FROM `project`,`tbl_users` 
            WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee' AND project.u_id = '$user' AND month(project.duedate) = '$mdate' AND year(project.duedate) = '$ydate'
            order by project.pid desc";
        }else{
            $stmt="SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
            project.status as status,project.subdate as subdate
            FROM `project`,`tbl_users` 
            WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee' AND project.u_id = '".$_SESSION['id']."'  AND month(project.duedate) = '$mdate' AND year(project.duedate) = '$ydate'
            order by project.pid desc";
        }
	}
	else
	{
		if($_SESSION['role']=='Admin'){
        	$stmt="SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
            project.status as status,project.subdate as subdate
            FROM `project`,`tbl_users` 
            WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee'";
        }else{
            $stmt="SELECT tbl_users.u_name as u_name, project.pname as pname, project.startdate as startdate, project.duedate as duedate, 
            project.status as status,project.subdate as subdate
            FROM `project`,`tbl_users` 
            WHERE project.u_id = tbl_users.u_id AND u_role = 'Employee' AND project.u_id = '".$_SESSION['id']."' ";
        }
	}

	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');
	while ($row = mysqli_fetch_assoc($result)) {
		$sdate = $row['startdate'];
        $sdate = new DateTime($sdate);
        $sdate = $sdate->format('Y-m-d');

        $edate = $row['duedate'];
        $edate = new DateTime($edate);
        $edate = $edate->format('Y-m-d');

        if($row['subdate'] != ""){
            $submitdate = $row['subdate'];
            $submitdate = new DateTime($submitdate);
            $submitdate = $submitdate->format('Y-m-d');
            $date1=date_create($edate);
            $date2=date_create($submitdate);
            $diff=date_diff($date2, $date1);
            $days = $diff->format("%R%a");
        }
        else{
            $submitdate = date("Y-m-d");
            $date1=date_create($edate);
            $date2=date_create($submitdate);
            $diff=date_diff($date2, $date1);
            $days = $diff->format("%R%a");
        }

		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$row['u_name'].'</td>
				<td>'.$row['pname'].'</td>
				<td>'.$sdate.'</td>
				<td>'.$edate.'</td>
				<td>'.$submitdate.'</td>';
                if($row["status"] == "Submitted"){ 
                   $html.='<td style="color:green;">'.$row["status"].'</td>';
                }else{ 
                    $html.='<td style="color:red;">'.$row["status"].'</td>';
                }
                $totaldays=$totaldays+5;
                if($days >= 0){
                    $diffdays+=5;
                    $html.='<td style="color:green;">5</td>';  
                }else{
                    $diffdays+=(int)$days;
                    $html.='<td style="color:red;">'.$days.'</td>';   
                }
                $html.='</tr>';
	}
    $html.='<tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Total Point : '.$totaldays.'</th>
        <th>Achieve Point : '.$diffdays.'</th>'; 
                if($totaldays > 0){ 
                    $html.='<th>Average: '.round(($diffdays * 100)/$totaldays, 2).'%</th>';
                }else{ 
                    $html.='<th>Averag : 0%</th>'; 
                }
    $html.='</tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <th>No.</th>
        <th>User Name</th>
        <th>In - Date / Time</th>
        <th>Out - Date / Time</th>
        <th>Working Hours</th>
        <th>Points</th>
    </tr>';
    $counter=1;
    if($_GET['st'] != ""){

        $mdate = date("m", strtotime($_GET['st'] ));
        $ydate = date("Y", strtotime($_GET['st'] ));
        $user = $_GET['uid'];

        if($_SESSION['role']=='Admin'){
            $stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id and month(tbl_dayselfi.cdate) = '$mdate' AND year(tbl_dayselfi.cdate) = '$ydate' AND `tbl_dayselfi`.u_id = '$user'";
        }else{
            $stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='".$_SESSION['id']."' and `tbl_users`.u_id = '".$_SESSION['id']."' AND month(tbl_dayselfi.cdate) = '$mdate' AND year(tbl_dayselfi.cdate) = '$ydate'";
        }
    } else {
        if($_SESSION['role']=='Admin'){
            $stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id = `tbl_users`.u_id ORDER BY tbl_dayselfi.day_id DESC";
        }else{
            $stmt="SELECT * FROM `tbl_dayselfi`, `tbl_users` where `tbl_dayselfi`.u_id ='".$_SESSION['id']."' and `tbl_users`.u_id = '".$_SESSION['id']."' ORDER BY tbl_dayselfi.day_id DESC";
        }
    }

    $result = mysqli_query($conn, $stmt);
    $point = 0;
    $totalpoint = 0;
    $getpoint = 0;
    $Avgp = 0;
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
                <th>Achived Point: '.$getpoint.'</th>'; 
                if($totalpoint > 0){ 
                    $Avgp = round(($getpoint * 100)/$totalpoint, 2);
                    $html.='<th>Average: '.$Avgp.'%</th>';
                }else{ 
                    $html.='<th>Averag : 0%</th>'; 
                }
    $html.='</tr>';
    $totalP = $totaldays + $totalpoint;
    $totalA = $diffdays + $getpoint;
    $totalAv = round(($totalA * 100)/$totalP, 2);
    $html.='</table>
            <table><tr>
                <th>Total Point: '.$totalP.'</th>
                <th>Achived Point: '.$totalA.'</th>'; 
                if($totalP > 0){ 
                    $html.='<th>Average: '.$totalAv.'%</th>';
                }else{ 
                    $html.='<th>Averag : 0%</th>'; 
                }
    $html.='</tr>
    </table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>