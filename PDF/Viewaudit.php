<?php
include("../Fpdf/fpdf.php");
include("../process/dbh.php");
include("../session.php");

class myPDF extends FPDF
{

    function header()
    {
        $this->Image('../assets/images/aduitl.png',10,6);
        $this->SetFont('Arial','B',18);
        $this->Cell(276,5,'FooD Mohalla',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',16);
        $this->Cell(276,10,'Audit Form',0,0,'C');
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
        /*$this->SetFont('Times','B',16);
        $this->Cell(280,10,'Cleaning Parameters (Customer Area)(Manager/Owner/Owner Person s Responsible) ',1,0,'C');
        $this->Ln();*/
    }
    function ViewTbale($conn)
    {
        $stmt="SELECT * FROM tbl_staudit where id = '".$_GET["id"]."'";

        $result = mysqli_query($conn, $stmt);
        $users = mysqli_fetch_assoc($result);
		
		$stmt123="SELECT u_name FROM tbl_users where u_id = '".$users["store_id"]."'";

        $result123 = mysqli_query($conn, $stmt123);
        $users123 = mysqli_fetch_assoc($result123);

        $this->SetFont('Times','B',12);
		$this->Cell(140,10,'Store : '.$users123['u_name'].'',0,0,'L');
		$this->Cell(140,10,'Date : '.$users['time'].'',0,1,'R');
        $this->Cell(280,10,'Cleaning Parameters(Customer Area)(Manager/Owner/Owner Persons Responsible) :',1,1,'C');
        $this->Cell(0,10,'',0,1,'');

        $this->Cell(70,10,'Entrance Glass : '.$users['radioengl'].'',1,0,'L');
        $this->Cell(70,10,'Area Flooring : '.$users['radioarfl'].' ',1,0,'L');
        $this->Cell(140,10,'Chilli - Oregano Bottles : '.$users['radiochob'].' ',1,1,'L');
        $this->Cell(140,10,'Sanitizer Bottle for Customer : '.$users['radiosbfc'].' ',1,0,'L');
        $this->Cell(140,10,'Table Menu : '.$users['radiotbme'].' ',1,1,'L');
        $this->Cell(140,10,'Body Temperature Check Machine : '.$users['radiobtcm'].' ',1,0,'L');
        $this->Cell(140,10,'Fan - Lights : '.$users['radiofali'].' ',1,1,'L');
        $this->Cell(140,10,'Ceiling Webs : '.$users['radiocewb'].' ',1,0,'L');
        $this->Cell(140,10,'Wash Basin (IF AVAILABLE) : '.$users['radiowbia'].' ',1,1,'L');
        $this->Cell(140,10,'Table - Chairs : '.$users['radiotach'].' ',1,0,'L');
        $this->Cell(70,10,'Air Fragrance : '.$users['radioaifr'].' ',1,0,'L');
        $this->Cell(70,10,'Music Live : '.$users['radiomuli'].' ',1,1,'L');
        $this->Cell(70,10,'Tissue Stand : '.$users['radiotist'].' ',1,0,'L');
        $this->Cell(70,10,'Cutlery Stand : '.$users['radiocust'].' ',1,0,'L');
        $this->Cell(140,10,'Hygiene Maintaining sheet (Till Date Updated) : '.$users['radiohmst'].' ',1,1,'L');
        $this->Cell(70,10,'Fork - Spoons : '.$users['radiofosp'].' ',1,0,'L');
        $this->Cell(70,10,'Ketchup Bottles : '.$users['radiokebo'].' ',1,0,'L');
        $this->Cell(140,10,'Inventory Sheet Updated regularly (at least twice in a week) : '.$users['radioisur'].' ',1,1,'L');
        $this->Cell(160,10,'Store Inside Area -Entrance Glass Updated with latest Branding Material : '.$users['radiostia'].' ',1,0,'L');
        $this->Cell(120,10,'Billing Area, Computer-Printer area Dust Less : '.$users['radiobacp'].' ',1,1,'L');

        $this->Cell(0,10,'',0,1,'');
        $this->Cell(280    ,10,'Cleaning Parameter (Kitchen Area) Kitchen Staff Responsible :',1,1,'C');
        $this->Cell(0,10,'',0,1,'');

        $this->Cell(140,10,'Kitchen Platform Clear : '.$users['radiokpcl'].' ',1,0,'L');
        $this->Cell(140,10,'Kitchen Flooring Cleanness : '.$users['radiokfcl'].' ',1,1,'L');
        $this->Cell(140,10,'Souse Bottles Lead Clean : '.$users['radiosblc'].' ',1,0,'L');
        $this->Cell(140,10,'Pizza Topping Storage : '.$users['radioptst'].' ',1,1,'L');
        $this->Cell(140,10,'Pizza-Micro Oven Clean : '.$users['radiopmoc'].' ',1,0,'L');
        $this->Cell(140,10,'Serving Crockery Clean : '.$users['radiosccl'].' ',1,1,'L');
        $this->Cell(140,10,'Pizza Base Quality : '.$users['radiopbqu'].' ',1,0,'L');
        $this->Cell(70,10,'Staff In Uniform :  '.$users['staffuni'].' ',1,0,'L');
        $this->Cell(70,10,'Hand gloves while cooking : '.$users['handglv'].' ',1,1,'L');
        $this->Cell(140,10,'Green Chatni Quality(if making at store) : '.$users['radiogcqm'].' ',1,0,'L');
        $this->Cell(70,10,'Head cap while cooking : '.$users['headcap'].' ',1,0,'L');
        $this->Cell(70,10,'Face Mask while cooking : '.$users['facemsk'].' ',1,1,'L');
        $this->Cell(140,10,'Garlic Butter Quality : '.$users['radiogbqu'].' ',1,0,'L');
    	$this->Cell(140,10,'Staff Shoes Wearing : '.$users['staffsho'].' ',1,1,'L');
		$this->Cell(140,10,'Kitchen Cutlery Cleaning : '.$users['radiokccl'].' ',1,0,'L');
		$this->Cell(140,10,'Any equipment operating/working query? : '.$users['txtaeow'].'',1,1,'L');
		$this->Cell(140,10,'Veg Cutting, Wrapping, Storage : '.$users['radiovcws'].' ',1,0,'L');
		$this->Cell(140,10,'Hygiene Maintaining sheet (Till Date Updated) : '.$users['radiohmst'].' ',1,1,'L');

		$this->Cell(0,10,'',0,1,'');
		$this->Cell(280	,10,'Staff Favoring audits & feedback :',1,1,'C');
		$this->Cell(0,10,'',0,1,'');

		$this->Cell(20,10,' No. ',1,0,'C');
		$this->Cell(90,10,' Store Name ',1,0,'C');
		$this->Cell(90,10,' Staff Name ',1,0,'C');
		$this->Cell(80,10,' Sign ',1,1,'C');

        $counter=1;
    	$stmt = "SELECT * FROM `tbl_fmstaff`, `tbl_users`, `tbl_staff` where `tbl_fmstaff`.store_id = `tbl_users`.u_id and `tbl_fmstaff`.staff_id = `tbl_staff`.ustaff_id and `tbl_fmstaff`.form_id = '".$users['form_id']."'  ";
		$result = mysqli_query($conn, $stmt);
		while ($rows = mysqli_fetch_assoc($result)) {

			$this->Cell(20,10,$counter++,1,0,'');
        	$this->Cell(90,10,' '.$rows['u_name'].' ',1,0,'');
        	$this->Cell(90,10,' '.$rows['staffame'].' ',1,0,'');
            $this->Cell(80,10,$this->Image('../'.$rows['image1'],$this->GetX(),$this->GetY()),1,1,'C');

    		$this->MultiCell(280,10,' Food Product : '.$rows['p_name'].' ',1,1,'');

			# code...
		}
        $this->Cell(0,10,'',0,1,'');

		$this->MultiCell(280,10,' Remarks regarding above if any : '.$users['txtremark'].'',1,1,'');
		$this->MultiCell(280,10,' Any query about working hours : '.$users['txtany'].' ',1,1,'');
		$this->MultiCell(280,10,' Any query at residential room : '.$users['txtquery'].' ',1,1,'');
		$this->MultiCell(280,10,' Any accessories or equipment requirement needed?? : '.$users['txtneed'].' ',1,1,'');

		$this->Cell(0,10,'',0,1,'');
		$this->Cell(280	,10,'(Owner/Manager Favoring Feedback.) (Must written by Owner/Manager) ',1,1,'C');
		$this->Cell(0,3,'',0,1,'');
		$this->Cell(280	,10,'Instructions to writing person : Feel free to write genuine feedback without any Hesitate,',0,1,'C');
		$this->Cell(280	,1,'It helps to improve both side & store can grow with sales & service.)',0,1,'C');
		$this->Cell(0,10,'',0,1,'');

		$this->MultiCell(280,10,'Any query with Raw material delivery vendors (Must be within 7-10 days) ??? : '.$users['txtvend'].' ',1,1,'');
		$this->MultiCell(280,10,'Any query regarding food quality (Must be within 7-10 days with logical remarks) ??? : '.$users['txttype'].' ',1,1,'');
		$this->MultiCell(280,10,'Any query with available auditor person ??? : '.$users['txtperson'].' ',1,1,'');
		$this->MultiCell(280,10,'Any query to understand technicals of Software, Application or any menu product knowledge query ??? : '.$users['txtsoft'].' ',1,1,'');
		$this->MultiCell(280,10,'Write if any specific query or suggestions (All logical & centralized applicable suggestions can be work out, No individual or separate acceptable ) : '.$users['txtwork'].' ',1,1,'');

		$this->Cell(0,20,'',0,1,'');
		$this->Cell(280	,10,'FooD/Dry Material & Tech Audit (Owners Responsibility) (500 Rs Penalty per negative audit, Paid to company with Latest Royalty )',1,1,'C');
		$this->Cell(0,2,'',0,1,'');

        $this->MultiCell(280,10,'FooD/Dry Material : '.rtrim($users['txtfmtaor'], ",| ").' ',0,1,'');

		$this->Cell(0,20,'',0,1,'');
		$this->MultiCell(280,10,'Last month royalty credited within 3 days or not? 100 Rs will penalty per day’s of delayed, will add in next demanding royalty letter. Penalty amount of royalty if any : '.$users['txtlast'].'',1,1,'');
		$this->MultiCell(280,10,'Marketing status of the month : (Without follow marketing no any business can grow in world) : '.$users['txtmonth'].'',1,1,'');
		$this->MultiCell(280,10,'This Audit sheet must need to take seriously by owner side & will also take all immediate actions if require from company side. : '.$users['txttypw'].'',1,1,'');
		$this->MultiCell(280,10,'If systems & norms not followed by owner side then company have rights to take actions according to it, & all supports can remove immediate as POS, Manpower, Raw material vendor, ETC. : '.$users['txttext'].'',1,1,'');
		$this->MultiCell(280,10,'After signing this sheet, no any past query will consider for discussion or for solution. : '.$users['txtwill'].'',1,1,'');
		$this->MultiCell(280,10,'Overall Remarks by Auditor - '.$users['txtremarl'].'',1,1,'');
		$this->MultiCell(280,10,'Improvement in next Audit (IF ANY) - '.$users['txtaudit'].' ',1,1,'');
		$this->MultiCell(280,10,'Amount Penalties in Audit (IF ANY) - '.$users['txtamout'].' ',1,1,'');
		$this->MultiCell(280,10,'FooD/Dry Material & Tech Audit (Owners Responsibility) (500 Rs Penalty per negative audit, Paid to company with Latest Royalty ) : ',1,1,'');

		$this->Cell(0,10,'',0,1,'');
		$this->Cell(280	,10,'Name of Auditor : '.$users['txtname'].'',0,1,'');
		$this->Cell(0,10,'',0,1,'');
        $this->Cell(20,10,'Name of Owner :',0,0,'');
        $this->Cell(0,0,$this->Image('../'.$users['own_signature'],$this->GetX(),$this->GetY()),0,0,'C');
		$this->Cell(0,10,'',0,1,'');
		$this->Ln();
	}
}

$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('L','A4',0);
$pdf -> headerTabale();
$pdf -> ViewTbale($conn);
$stmta="SELECT * FROM tbl_staudit where id = '".$_GET["id"]."'";
$resulta = mysqli_query($conn, $stmta);
$usersa = mysqli_fetch_assoc($resulta);

$pdf -> output('auditpdf/'.$usersa['form_id'].'.pdf','F');
header("location:../viewaudit.php");
?>
