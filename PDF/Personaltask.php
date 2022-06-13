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
		$this->Cell(276,10,'Personal Tasks Detail With Status',0,0,'C');
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
		$this->Cell(35,10,'Employee Name',1,0,'C');
		$this->Cell(65,10,'Project Name',1,0,'C');
		$this->Cell(25,10,'Start Date',1,0,'C');
		$this->Cell(25,10,'End Date',1,0,'C');
		$this->Cell(20,10,'Priority',1,0,'C');
		$this->Cell(35,10,'Submited Date',1,0,'C');
		$this->Cell(25,10,'Total Days',1,0,'C');
		$this->Cell(25,10,'Status',1,0,'C');
		$this->Ln();
	}
	function ViewTbale($conn)
	{
		$id = $_SESSION['id'];
		$this->SetFont('Times','',12);
		$counter=1;
		$stmt = "SELECT * from `tbl_personaltask`,`tbl_users` where  `tbl_personaltask`.u_id = `tbl_users`.u_id and `tbl_personaltask`.u_id = '$id' order by subdate desc";
		$result = mysqli_query($conn, $stmt);
		while ($users = mysqli_fetch_assoc($result)) {
			$date1_ts = strtotime($users['duedate']);
            $date2_ts = strtotime($users['subdate']);
            $diff = $date2_ts - $date1_ts;
            $dateDiff =  round($diff / 86400);
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,$counter++,1,0,'C');
			$this->Cell(35,10,$users['u_name'],1,0,'C');
			$this->Cell(65,10,$users['pname'],1,0,'C');
			$this->Cell(25,10,$users['startdate'],1,0,'C');
			$this->Cell(25,10,$users['duedate'],1,0,'C');
			$this->Cell(20,10,$users['priority'],1,0,'C');
			$this->Cell(35,10,$users['subdate'],1,0,'C');
			if($users['subdate']=="")
            {
            	$this->Cell(25,10,'',1,0,'C');
            }
            else
            {
                $this->Cell(25,10,$dateDiff,1,0,'C');
            }
			
			$this->Cell(25,10,$users['status'],1,0,'C');
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