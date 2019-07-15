<?php 
/*
Author: Ehtesham Mehmood
Website: www.go2code.com
*/
// $f_name=$_POST['first-name'];

if(isset($_POST['print_button']))
{

	// $f_name=$_POST['first-name'];
	// $l_name=$_POST['last-name'];
	// $email=$_POST['email'];
	// $gender=$_POST['gender'];
	

require("fpdf/fpdf.php");
$fpdf=new FPDF();
$fpdf->AddPage();
$fpdf->setFont("Arial","B",16);
// $fpdf->Cell(0,10,"Create Dynamic PDF using PHP and FPDF Library",1,1,"C");
// $fpdf->Cell(95,10,"First Name:",1,0,"C");
// $fpdf->Cell(95,10,$f_name,1,1,"C");
// $fpdf->Cell(95,10,"Last Name:",1,0,"C");
// $fpdf->Cell(95,10,$l_name,1,1,"C");
// $fpdf->Cell(95,10,"Email:",1,0,"C");
// $fpdf->Cell(95,10,$email,1,1,"C");
// $fpdf->Cell(95,10,"Gender:",1,0,"C");
// $fpdf->Cell(95,10,$gender,1,1,"C");
require("print_invoice.php");
$fpdf->output();
}
?>