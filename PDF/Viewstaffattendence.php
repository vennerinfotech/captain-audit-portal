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
		$this->Cell(276,10,'View All Users Attendense',0,0,'C');
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
		if($_SESSION['role']=="Admin"){
			$this->Cell(50,10,'Store Name',1,0,'C');
			$this->Cell(50,10,'Staff Name',1,0,'C');
		}
		else
		{
			$this->Cell(60,10,'Staff Name',1,0,'C');
		}
		$this->Cell(50,10,'In - Date / Time',1,0,'C');
		$this->Cell(50,10,'Out - Date / Time',1,0,'C');
		$this->Cell(35,10,'Working Hours',1,0,'C');
		$this->Ln();
	}
	function ViewTbale($conn)
	{
		$id = $_SESSION['id'];
		$this->SetFont('Times','',12);
		$counter=1;
		if($_SESSION['role']=='Admin'){
        	$stmt="SELECT * FROM `tbl_ststaffattendence`, `tbl_users`, `tbl_staff`where `tbl_ststaffattendence`.store_id = `tbl_users`.u_id";
        }else{
            $stmt="SELECT * FROM `tbl_ststaffattendence`, `tbl_users`, `tbl_staff` where `tbl_ststaffattendence`.store_id = `tbl_users`.u_id and `tbl_users`.u_id='".$_SESSION['id']."' and `tbl_ststaffattendence`.store_id = '".$_SESSION['id']."'";
        }

		$result = mysqli_query($conn, $stmt);
		while ($users = mysqli_fetch_assoc($result)) {
            $date1 = $users["cdate"];
            $date2 = $users["udate"];
			$this->SetFont('Times','B',12);
			$this->Cell(20,10,$counter++,1,0,'C');
			if($_SESSION['role']=="Admin"){
				$this->Cell(50,10,$users['u_name'],1,0,'C');
				$this->Cell(50,10,$users['staffame'],1,0,'C');
			}
			else{
				$this->Cell(60,10,$users['staffame'],1,0,'C');
			}
			
			$this->Cell(50,10,$users['cdate'],1,0,'C');
			$this->Cell(50,10,$users['udate'],1,0,'C');
			if($users["udate"] == "")
            {	
            	$this->Cell(35,10,'',1,0,'C');
            }
            else
            {
            	$hour = round((strtotime($date2) - strtotime($date1))/3600, 1);
            	$this->Cell(35,10,$hour,1,0,'C');
            }
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