<?php
include("../Fpdf/fpdf.php");
include("../process/dbh.php");
include("../session.php");


class myPDF extends FPDF
{
	
	function header()
	{
		$this->SetFont('Arial','B',18);
		$this->Cell(276,5,'FooD Mohalla',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'Expence With Detail',0,0,'C');
		$this->Ln(20);
	}
	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page'.$this->PageNo().'./{nb}',0,0,'C');
	}
	function headerTabale()
	{
		$this->SetFont('Times','B',12);
		$this->Cell(20,10,'No.',1,0,'C');
		$this->Cell(40,10,'User Name',1,0,'C');
		$this->Cell(50,10,'Category Name',1,0,'C');
		$this->Cell(30,10,'Date',1,0,'C');
		$this->Cell(100,10,'Note',1,0,'C');
		$this->Cell(35,10,'Amount',1,0,'C');
		$this->Ln();
	}
	function ViewTbale($conn)
	{
		$id = $_SESSION['id'];
		$this->SetFont('Times','',12);
		$counter=1;
		$stmt = "SELECT tc.*,s.cat_name, ts.u_name FROM `tbl_expense` as tc left JOIN  tbl_users as ts on tc.u_id=ts.u_id left join tbl_category as s on  s.cat_id=tc.cat_id order by tc.expense_id desc";
		$result = mysqli_query($conn, $stmt);
		while ($users = mysqli_fetch_assoc($result)) {
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,$counter++,1,0,'C');
			$this->Cell(40,10,$users['u_name'],1,0,'C');
			$this->Cell(50,10,$users['cat_name'],1,0,'C');
			$this->Cell(30,10,$users['date'],1,0,'C');
			$this->Cell(100,10,$users['note'],1,0,'C');
			$this->Cell(35,10,$users['amount'],1,0,'C');
			$this->Ln();
			# code...
		}
	}
}

$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('L','A4',0);
$pdf -> headerTabale();
$pdf -> ViewTbale($conn);
$pdf -> output();

?>