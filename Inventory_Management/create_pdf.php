<?php
include('pdf.php');

if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != ''){
	$file_name ='document.pdf';
	$html ='';
	$html = '';
	$html = "<img src='../images/systemAdministration/welcomelogo.gif' width='50%' height='50%'><br>Address : Mahaweli Reach hotel,<br>P.B.Weerakoon Mawatha,<br>katugastota.<br>Tel : 081-2487174 <br> email : mahawelireachhotel.lk <br><hr><br>

	";
	$html .= $_POST["hidden_html"];

	$pdf = new Pdf();
	$pdf->load_html($html);
	$pdf->render();

$pdf->stream($file_name, array('Attachment'=>false));
}

?>
