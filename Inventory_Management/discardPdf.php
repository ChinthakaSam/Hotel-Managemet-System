<?php
require_once 'core/init.php';
require_once 'TCPDF-master/tcpdf.php';



class pdf extends TCPDF
{
	//page header
	public function Header(){
		//logo
		$image_file = K_PATH_IMAGES.'maha.png';
		$this->Image($image_file, 47, 10, 37, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false, false);
		//set font
		$this->Ln(5);
		$this->SetFont('helvetica', 'B', 15);
		//title
		$this->Cell(189, 5, 'Mahaweli Reach Hotel', 0, 1, 'C');

		$this->SetFont('helvetica', '', 9);
		$this->Cell(189, 3, '35, P.B.A.Weerakoon Mawatha,', 0, 1, 'C');
		$this->Cell(189, 3, 'Kandy,', 0, 1, 'C');
		$this->Cell(189, 3, 'Sri Lanka', 0, 1, 'C');
		$this->Cell(189, 3, 'Phone: + 94 81 2472727 ', 0, 1, 'C');
		$this->Cell(189, 3, 'E-mail: sales@mahaweli.com', 0, 1, 'C');
		$this->Ln(2);
		
		$this->Cell(189, 3, '_____________________________________________________________________________________________________________', 0, 1, 'C');
		$this->SetFont('times', '', 9);
		
		$today = date("F j, Y");
		$this->Cell(25,5,'Generation Date: '.$today,0,0,'L');
		$this->Ln(2);
		$this->SetFont('helvetica', 'B', 15);
		$this->Cell(189,15, 'Report of Discarded Items', 0,1,'C');
		$this->Ln(10);

		$this->SetFont('times','B',8);
		$this->SetFillColor(224,235,255);
		$this->Cell(45,5,'Item Name',1,0,'C',1);
		$this->Cell(15,5,'Quantity',1,0,'C',1);
		$this->Cell(25,5,'Measuring Unit',1,0,'C',1);
		$this->Cell(20,5,'Discarded Date',1,0,'C',1);
		$this->Cell(20,5,'Reason',1,0,'C',1);
		$this->Cell(58,5,'Supplier',1,0,'C',1);
		$this->SetFont('times','',7);


		if(isset($_GET['pdf_report'])){
		error_reporting(0);
		$sdate = $_GET['sdate'];
		$edate = $_GET['edate'];

		$dep = DB::getInstance()->query("SELECT * FROM inv_discard WHERE discarded_date BETWEEN '$sdate' AND '$edate'");
                                        foreach ($dep->results() as $dep) {
                                            $a = $dep->item_name;
                                            $b = $dep->quantity;
                                            $c = $dep->measuring_unit;
                                            $d = $dep->discarded_date;
                                            $g = $dep->reason;
                                            $e = $dep->sup_Id;

                                            $deps = DB::getInstance()->query("SELECT * FROM inv_supplier WHERE sup_Id = $e");
                                        			foreach ($deps->results() as $deps) {
                                            			$f = $deps->name;
                                        			}
                                        	$this->Ln(5);
											$this->Cell(45,5,$a,1,0,'C',1);
											$this->Cell(15,5,$b,1,0,'C',1);
											$this->Cell(25,5,$c,1,0,'C',1);
											$this->Cell(20,5,$d,1,0,'C',1);
											$this->Cell(20,5,$g,1,0,'C',1);
											$this->Cell(58,5,$f,1,0,'C',1);
											

                                        	}


				}

		$this->Ln(10);
		$this->SetFont('times','',10);
		$this->Cell(50,5,'Report of Discarded items between',0,0,'C');
		$this->Cell(17,5,''.$sdate,0,0,'C');
		$this->Cell(9,5,'and',0,0,'C');
		$this->Cell(17,5,$edate,0,0,'C');

		
		$this->Ln(140);
		$this->SetFont('times','',9);
		$this->Cell(60,5,'____________________________________',0,1,'C');
		$this->Cell(60,5,'Signature',0,1,'C');
		$this->Ln(2);
		$this->SetFont('times','B',10);
		$this->Cell(60,5,'Inventory Manager',0,1,'C');
	}


}

// create new PDF document
$pdf = new PDF('p', 'mm', 'A4');

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mahaweli Reach Hotel');
$pdf->SetTitle('Goods Issuing Report');
$pdf->SetSubject('Issued Date');
$pdf->SetKeywords('Department');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();



// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);



// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
