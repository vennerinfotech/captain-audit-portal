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
		$this->Cell(276,10,'View All Complain Detail',0,0,'C');
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
		$this->Cell(45,10,'User Name',1,0,'C');
		$this->Cell(50,10,'Purpose',1,0,'C');
		$this->Cell(120,10,'Note',1,0,'C');
		$this->Cell(40,10,'Status',1,0,'C');
		$this->Ln();
	}
	function ViewTbale($conn)
	{
		$id = $_SESSION['id'];
		$this->SetFont('Times','',12);
		$counter=1;
		if($_SESSION['role']=="Admin")
        {
            $stmt="SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id = `tbl_users`.u_id";
        }
        elseif ($_SESSION['role']=="Store") 
        {
            $stmt="SELECT * FROM `tbl_complain`, `tbl_users` where `tbl_complain`.u_id ='".$_SESSION['id']."'  AND `tbl_users`.u_id = '".$_SESSION['id']."'";
        }
        else
        {
            return;
        }

		$result = mysqli_query($conn, $stmt);
		while ($users = mysqli_fetch_assoc($result)) {
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,$counter++,1,0,'C');
			$this->Cell(45,10,$users['u_name'],1,0,'C');
			$this->Cell(50,10,$users['selectpur'],1,0,'C');
			$this->Cell(120,10,$users['note'],1,0,'C');
			$this->Cell(40,10,$users['status'],1,0,'C');
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