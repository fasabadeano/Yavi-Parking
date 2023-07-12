<?php
//============================================================+


// Include the main TCPDF library (search for installation path).
require_once('../app/templeates/TCPDF-main/tcpdf.php');
include('../app/config.php');

//cargar datos del encabezado

$query_informations = $pdo->prepare("SELECT * FROM tb_informations WHERE enable_status = '1' ");
$query_informations->execute();
$informations =$query_informations->fetchall(PDO::FETCH_ASSOC);
foreach($informations as $information){
    $id_informations = $information['id_informations'];
    $name_parking = $information['name_parking'];
    $institute_activity = $information['institute_activity'];
    $branch = $information['branch'];
    $a_ddress = $information['a_ddress'];
    $z_one = $information['z_one'];
    $phone = $information['phone'];
    $city = $information['city'];
    $country = $information['country'];

}


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,80), PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 002');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '
<div>
	<p  style="text-align: center">
	   <b>'.$name_parking.'</b> <br>
	   '.$institute_activity.'<br>
	   SUCURSAL No '.$branch.' <br>
	   '.$a_ddress.' <br>
	   ZONA: '.$z_one.' <br>
	   TELÉFONO: '.$phone.' <br>
	   '.$city.'-'.$country.' <br>
	   ---------------------------------------------------------------------------------

		<div style="text-align: left">
			<b>DATOS DEL CLIENTE</b> <br>
			<b>SEÑOR (A):</b> Franklin Abadeano <br>
			<b>C.I:</b> 1727620229 <br>
			---------------------------------------------------------------------------------<br>
		<b>Fecha de Ingreso:</b> 10/7/2023 <br>
		<b>Hora de Ingreso:</b> 15:25 <br>
		---------------------------------------------------------------------------------<br>
		<b>USUARIO:</b> ADMIN <br>
		</div>
	   
	</p>
	

</div>
';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
