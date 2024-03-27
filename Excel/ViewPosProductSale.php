<?php
include("../process/dbh1.php");
include("../session.php");

$file = date('Y-m-d H:i:s');
$html='<table>
	<tr>
		<td>No.</td>
		<td>Product Name</td>
		<td>Quantity</td>
	</tr>';
	$counter=1;
		$oid = $_GET['oid'];
		$sdate = $_GET['sdate'];
		$edate = $_GET['edate'];
		$counter=1;

		$where = "";

        if ($sdate != '' && $edate != '' && $oid != '') {
            $where = "and tbl_sales.sale_date>='".$sdate."' and  tbl_sales.sale_date <= '".$edate."' and tbl_sales.outlet_id = '".$oid."'";
        }

        if ($sdate != '' && $edate != '' && $oid == '') {
            $where = "and tbl_sales.sale_date>='".$sdate."' and  tbl_sales.sale_date <= '".$edate."'";
        }

        $result = mysqli_query($connpos,"SELECT sum(qty) as totalQty,food_menu_id,menu_name,code,sale_date
        FROM tbl_sales_details LEFT JOIN tbl_sales
        ON tbl_sales_details.sales_id = tbl_sales.id
        LEFT JOIN tbl_food_menus
        ON tbl_sales_details.food_menu_id = tbl_food_menus.id WHERE tbl_sales.del_status = 'Live' and tbl_sales.order_status = '3' ".$where." group by tbl_sales_details.food_menu_id") or die(mysqli_error($connpos));

		while ($users = mysqli_fetch_assoc($result)) {
		$html.='<tr>
				<td>'.$counter++.'</td>
				<td>'.$users['menu_name'].'</td>
				<td>'.$users['totalQty'].'</td>
			</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>