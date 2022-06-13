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
		$this->Cell(276,10,'View All Leave',0,0,'C');
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
		$this->Cell(50,10,'Start Date',1,0,'C');
		$this->Cell(50,10,'End Date',1,0,'C');
		$this->Cell(30,10,'Total Days',1,0,'C');
		$this->Cell(90,10,'Reason',1,0,'C');
		$this->Cell(30,10,'Status',1,0,'C');
		$this->Ln();
	}
	function ViewTbale($conn)
	{
		$id = $_SESSION['id'];
		$this->SetFont('Times','',12);
		$counter=1;
        $stmt="Select * From tbl_users, tbl_userleave Where tbl_users.u_id = $id and tbl_userleave.ul_uid = $id order by tbl_userleave.ul_id";
		$result = mysqli_query($conn, $stmt);
		while ($users = mysqli_fetch_assoc($result)) {
            $date1_ts = strtotime($users['ul_startdate']);
            $date2_ts = strtotime($users['ul_enddate']);
            $diff = $date2_ts - $date1_ts;
            $dateDiff =  round($diff / 86400);
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,$counter++,1,0,'C');
			$this->Cell(50,10,$users['ul_startdate'],1,0,'C');
			$this->Cell(50,10,$users['ul_enddate'],1,0,'C');
			$this->Cell(30,10,$dateDiff,1,0,'C');
			$this->Cell(90,10,$users['ul_reason'],1,0,'C');
			$this->Cell(30,10,$users['ul_status'],1,0,'C');
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