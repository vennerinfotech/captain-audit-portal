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
		$this->Cell(276,10,'All Store Royalty Status',0,0,'C');
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
		$this->Cell(30,10,'Name',1,0,'C');
		$this->Cell(30,10,'Amount',1,0,'C');
		$this->Cell(30,10,'Start Date',1,0,'C');
		$this->Cell(30,10,'End Date',1,0,'C');
		$this->Cell(35,10,'Royalty Month',1,0,'C');
		$this->Cell(40,10,'Submited Date',1,0,'C');
		$this->Cell(30,10,'Total Days',1,0,'C');
		$this->Cell(30,10,'Status',1,0,'C');
		$this->Ln();
	}
	function ViewTbale($conn)
	{
		$id = $_SESSION['id'];
		$this->SetFont('Times','',12);
		$counter=1;
		$stmt = "SELECT * FROM `tbl_royalty`, `tbl_users` where `tbl_royalty`.u_id = `tbl_users`.u_id ";
		$result = mysqli_query($conn, $stmt);
		while ($users = mysqli_fetch_assoc($result)) {
			$date1_ts = strtotime($users['e_date']);
            $date2_ts = strtotime($users['sdate']);
            $diff = $date2_ts - $date1_ts;
            $dateDiff =  round($diff / 86400);
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,$counter++,1,0,'C');
			$this->Cell(30,10,$users['u_name'],1,0,'C');
			$this->Cell(30,10,$users['amount'],1,0,'C');
			$this->Cell(30,10,$users['s_date'],1,0,'C');
			$this->Cell(30,10,$users['e_date'],1,0,'C');
			$this->Cell(35,10,$users['month'],1,0,'C');
			$this->Cell(40,10,$users['sdate'],1,0,'C');
			if($users["sdate"]==""){
            	$this->Cell(30,10,'',1,0,'C');
            }
           	else
            {
                $this->Cell(30,10,$dateDiff,1,0,'C');
            }
			
			$this->Cell(30,10,$users['stuts'],1,0,'C');
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