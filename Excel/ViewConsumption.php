<?php
include("../process/dbh1.php");
include("../process/dbh.php");
include("../session.php");

$file = date('Y-m-d H:i:s');
$html='<table>
	<tr>
		<td>No.</td>
        <td>Ingridiant Name</td>
        <td>Today Opening</td>
        <td>Today Closing</td>
        <td>Purchase</td>
        <td>Expected Consumption</td>
        <td>Difference</td>';

	$html.='</tr>';
	$counter=1;
		$oid = $_GET['oid'];
		$sdate = $_GET['sdate'];
        $edate = $_GET['edate'];
		$where = "";

        if ($sdate != '' && $edate != '' && $oid != '') {
             $where = "date >='$sdate' and date <='$edate' and outletid = '$oid'";
        }

        if ($sdate != '' && $edate != '' && $oid == '') {
            $where = "date >='$sdate' and date <='$edate'";
        }

        if ($sdate == '' && $edate == '' && $oid == '') {
            $where = "date >= subdate(CURDATE(), 2) and date <= subdate(CURDATE(), 1) and outletid = '".$_SESSION['outlet_id']."'";
        }

        $result = mysqli_query($conn,"SELECT * FROM tbl_product_ingr") or die(mysqli_error($conn));
        $sqldai = "SELECT * from `tbl_dailyconsumption` WHERE ".$where;

		while ($users = mysqli_fetch_assoc($result)) {
            $iid = $users['ingr_id'];
            $resultdai = mysqli_query($conn, $sqldai) or die(mysqli_error($conn));
            while ($rowdai = mysqli_fetch_row($resultdai)) {
                $dataopen = json_decode($rowdai[3], true);
                $dataclose = json_decode($rowdai[4], true);
                $datapurchase = json_decode($rowdai[5], true);
                $dataexpected = json_decode($rowdai[6], true);
            }
		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['name'].'</td>';
                if(isset($dataopen[$iid]) && $dataclose[$iid] && $datapurchase[$iid] && $dataexpected[$iid]){
				    $html.='<td>'.$dataopen[$iid].'</td>
                    <td>'.$dataclose[$iid].'</td>
                    <td>'.$datapurchase[$iid].'</td>
                    <td>'.$dataexpected[$iid].'</td>
                    <td>'.$dataopen[$iid] - ($dataclose[$iid] + $datapurchase[$iid]).'</td>';
				}else{
                    $html.='<td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>';
                }
		$html.='</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>