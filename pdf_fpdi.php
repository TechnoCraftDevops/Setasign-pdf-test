<?php
include('vendor/autoload.php');
include('Organise.php');

use Organise\Organise;
use setasign\Fpdi\Fpdi;

// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function

// initiate FPDI
$pdf = new Fpdi('L', 'mm', [80,70]);

// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile("./timbre.pdf");
// import page 1
$tplId = $pdf->importPage(1);
var_dump($pdf->getTemplateSize($tplId));

$stringText = 'kiki toto 225 rue rosa bonheur de la fouinne du pres de lourde 76360 Barentin de tourville la rivére';

// die;

// now write some text above the imported page 
$pdf->SetFont('Arial', '', 9); 
// use the imported page and place it at point 10,10 with a width of 100 mm
// $pdf->useTemplate($tplId, 10, 10, 100);
$pdf->useTemplate($tplId,-13,0,100,40);
$organise = new Organise();
$lineList = $organise->getLineList(40, $stringText);

$y = 41;
foreach ($lineList as $key => $value) {
    // var_dump($value); die;
    $pdf->SetXY(0, $y);
    $pdf->Write(0, $value);
    $y=$y+4;
}
// var_dump($pdf);die;


$filename="./w_y_naak.pdf";
$pdf->Output($filename,'F');
die;
$output = $pdf->Output();            
file_put_contents("w_y_naak.pdf", $filename);

die;

header("Content-Description: File Transfer");
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/pdf"); 
header("Content-Disposition: attachment; filename=\"". basename($filename) ."\"");
header('Content-Length: ' . filesize($file));

readfile($filename);


// 70x50
$output = $pdf->Output();            
file_put_contents("w_y_naak.pdf", $output);
