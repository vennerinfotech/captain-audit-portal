<?php
include("../process/dbh1.php");
include("../process/dbh.php");
include("../session.php");

$data = array();
$file = date('Y-m-d H:i:s');
$html='<table>
	<tr>
		<td>No.</td>
		<td>Product Name</td>
		<td>Quantity</td>';
		$resultping = mysqli_query($conn,"SELECT * FROM tbl_product_ingr") or die(mysqli_error($conn));
        while($rowping=mysqli_fetch_assoc($resultping)) {
            $data[] = $rowping['ingr_id'];
            
            $html.='<td>'.$rowping['name'].'</td>';
        }

	$html.='</tr>';
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
				<td>'.$users['totalQty'].'</td>';
				$resultcntrl = mysqli_query($conn,"SELECT * FROM tbl_ingredient_control WHERE product_id = '".$users['food_menu_id']."'") or die(mysqli_error($conn));
                if (mysqli_num_rows($resultcntrl) == 0) {
                    foreach ($data as $key => $value) { 
                        $html.='<td> 0 </td>';
                    }
                } else {
                    while($rowctrl=mysqli_fetch_row($resultcntrl)) {
                        $jsondecode = json_decode($rowctrl[3], true);
                        foreach ($data as $key => $value) {
                            if (array_key_exists($value, $jsondecode)){
                                $html.='<td>'.$jsondecode[$value] * $users['totalQty'].'</td>';
                            } else {
                                $html.='<td> 0 </td>';
                            }
                        }
                    }  
                }
		$html.='</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>

</table>