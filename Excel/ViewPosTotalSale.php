<?php
include("../process/dbh1.php");
include("../session.php");

$file = date('Y-m-d H:i:s');

$html='<table>
	<tr>
		<td>No.</td>
		<td>Date</td>
		<td>Outlet Name</td>
		<td>Amount</td>
	</tr>';
	$counter=1;
		$oid = $_GET['oid'];
		$sdate = $_GET['sdate'];
		$edate = $_GET['edate'];
		$counter=1;

		$where = "";

        if ($sdate != '' && $edate != '' && $oid != '') {
            $where = "and sale_date>='".$sdate."' and sale_date <= '".$edate."' and outlet_id = '".$oid."'";
        }

        if ($sdate != '' && $edate != '' && $oid == '') {
            $where = "and sale_date>='".$sdate."' and sale_date <= '".$edate."'";
        }

        $result = mysqli_query($connpos,"SELECT sale_date,sum(total_payable) as total_payable, payment_method_id, outlet_id FROM tbl_sales WHERE del_status = 'Live' and order_status = '3' ".$where." group by sale_date, outlet_id") or die(mysqli_error($connpos));

		while ($users = mysqli_fetch_assoc($result)) {
			$usersresult = mysqli_query($connpos, "SELECT outlet_name from `tbl_outlets` where `id` = '".$_GET['oid']."'");  
	        $usersrow = mysqli_fetch_array($usersresult, MYSQLI_ASSOC);  
	        $userscount = mysqli_num_rows($usersresult);  
	        if($userscount == 1){
	            $outName =  $usersrow['outlet_name'];
	        }
	        $total += round($users['total_payable'], 2);
	        
		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['sale_date'].'</td>
				<td>'.$outName.'</td>
				<td>'.round($users['total_payable'], 2).'</td>
			</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>