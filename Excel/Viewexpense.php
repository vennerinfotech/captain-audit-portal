<?php
include("../process/dbh.php");
include("../process/session.php");
$html='<table>
	<tr>
		<td>No.</td>
		<td>User Name</td>
		<td>Category Name</td>
		<td>Date</td>
		<td>Note</td>
		<td>Amount</td>
	</tr>';
	$counter=1;
	if($_GET['st'] != "" && $_GET['end'] != ""){
		$startdate = date("Y-m-d", strtotime($_GET['st']));
        $enddate = date('Y-m-d', strtotime($_GET['end'] . ' + 1 days'));

        if($_SESSION['role']=="Admin"){
            $stmt = "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id = tbl_users.u_id and tbl_category.cat_id=tbl_expense.cat_id and tbl_expense.date between '$startdate' and '$enddate' order by tbl_expense.expense_id desc";
        }else
        {
            $stmt = "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id='".$_SESSION['id']."' and tbl_users.u_id='".$_SESSION['id']."' and tbl_category.cat_id=tbl_expense.cat_id and tbl_expense.date between '$startdate' and '$enddate' order by tbl_expense.expense_id desc";
        }
	}
	else
	{
		if($_SESSION['role']=="Admin"){
            $stmt = "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id = tbl_users.u_id and tbl_category.cat_id=tbl_expense.cat_id order by tbl_expense.expense_id desc";
        }else
        {
            $stmt = "select * from `tbl_expense`, `tbl_users`, `tbl_category` where tbl_expense.u_id='".$_SESSION['id']."' and tbl_users.u_id='".$_SESSION['id']."' and tbl_category.cat_id=tbl_expense.cat_id order by tbl_expense.expense_id desc";
        }
	}
	
	$result = mysqli_query($conn, $stmt);
	$file = date('Y-m-d H:i:s');

	while ($users = mysqli_fetch_assoc($result)) {
		$html.='<tr>
			<td>'.$counter++.'</td>
			<td>'.$users['u_name'].'</td>
			<td>'.$users['cat_name'].'</td>
			<td>'.$users['date'].'</td>
			<td>'.$users['note'].'</td>
			<td>'.$users['amount'].'</td>
		</tr>';
	}

$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename='.$file.'.xls');
echo $html;
?>  