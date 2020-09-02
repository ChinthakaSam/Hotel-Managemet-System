<?php
  require('fpdf17/fpdf.php');

$pdf =new FPDF('P' ,'mm' ,'A4');

$pdf->AddPage();

$pdf->SetFont('Arial','B',14);

$pdf->Cell(189,10,'',0,1);

$pdf->Cell(189,5,'',0,1);



$pdf->Cell('logonew.png');
$pdf->Cell(5,5,'',0,1);


$pdf->Cell(53 ,5, '',0,0);
$pdf->Cell(73 , 5 , 'Mahaweli Reach Hotel',0,0);
$pdf->Cell(53 ,5, '',0,1);

$pdf->Cell(65 ,5, '',0,0);
$pdf->Cell(73 , 5 , 'Salary Slip',0,0);
$pdf->Cell(44 ,5, '',0,1);

$pdf->SetFont('Arial' ,'' ,12);

$pdf->Cell(130 ,5,'No 35P B A',0,0);
$pdf->Cell(59 ,5, '',0,1);

$pdf->Cell(130 ,5,'Weerakoon Mawatha',0,0);
$pdf->Cell(25,5, 'Date',0,0);
$pdf->Cell(34 ,5, '[dd/yymm/]',0,1);


$pdf->Cell(130 ,5,'Kandy,',0,0);
$pdf->Cell(25,5, 'Invoice #',0,0);
$pdf->Cell(34 ,5, '135654',0,1);

$pdf->Cell(130 ,5,'Phone +9481278544',0,0);
$pdf->Cell(25,5, 'Emp Name',0,0);
$pdf->Cell(34 ,5, '$emp_name',0,1);

$pdf->Cell(130 ,5,'Fax +9481278544',0,0);
$pdf->Cell(25,5, 'Employee ID ',0,0);
$pdf->Cell(34 ,5, '$emp_id',0,1);

$pdf->Cell(189,10,'',0,1);


$pdf->Cell(189,5,'',0,1);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(30 ,5,'Basic Salary',1,0);
$pdf->Cell(50 ,5,'Total Addition',1,0);
$pdf->Cell(50 ,5,'Total Deductions',1,0);
$pdf->Cell(50 ,5,'Net Salary',1,1);

$pdf->SetFont('Arial','',12);


$pdf->Cell( 30,5,'$basicSalary',1,0);
$pdf->Cell(50 ,5,'$sumofamountalownce',1,0);
$pdf->Cell(50 ,5,'$sumofamountdedat',1,0);
$pdf->Cell(50 ,5,'$netSalary',1,1);

$pdf->Cell(189,10,'',0,1);

$pdf->Cell( 30,5,'  ___________________ ',0,0);
$pdf->Cell(50 ,5,'',0,0);
$pdf->Cell(50 ,5,'',0,0);
$pdf->Cell(50 ,5,'___________________',0,1);

$pdf->Cell( 30,5,'Signature of the Employee ',0,0);
$pdf->Cell(50 ,5,'',0,0);
$pdf->Cell(50 ,5,'',0,0);
$pdf->Cell(50 ,5,'Signature of Accountant',0,1);



$pdf->Output();
?>