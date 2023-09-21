<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */


require_once('../vehiclapp/admin/TCPDF-main/tcpdf.php');


$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 002');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);


$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}




$pdf->setFont('times', 'BI', 20);


$pdf->AddPage();


$txt = <<<EOD
FUNCIONA??

Default page header and footer are disabled using setPrintHeader() and setPrintFooter() methods.
EOD;


$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);




$pdf->Output('example_002.pdf', 'I');


