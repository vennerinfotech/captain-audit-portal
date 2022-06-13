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
		$this->Cell(276,10,'View All Due Projects',0,0,'C');
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
		$this->Cell(60,10,'Project Name',1,0,'C');
		$this->Cell(70,10,'Start Date',1,0,'C');
		$this->Cell(70,10,'Due Date',1,0,'C');
		$this->Cell(55,10,'Status',1,0,'C');
		$this->Ln();
	}
	function ViewTbale($conn)
	{
		$id = $_SESSION['id'];
		$this->SetFont('Times','',12);
		$counter=1;
        $stmt="SELECT * FROM `project` WHERE u_id = $id and status = 'Due'";
		$result = mysqli_query($conn, $stmt);
		while ($users = mysqli_fetch_assoc($result)) {
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,$counter++,1,0,'C');
			$this->Cell(60,10,$users['pname'],1,0,'C');
			$this->Cell(70,10,$users['startdate'],1,0,'C');
			$this->Cell(70,10,$users['duedate'],1,0,'C');
			$this->Cell(55,10,$users['status'],1,0,'C');
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