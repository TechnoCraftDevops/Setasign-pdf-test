<?php
include('vendor/autoload.php');
use Smalot\PdfParser\Parser;
use Smalot\PdfParser\Config;

$config = new Config();
$config->setDataTmFontInfoHasToBeIncluded(true);

$parser = new Parser([], $config );

// $pdf = $parser->parseContent(file_get_contents('./pdf_timbre/timbre.pdf'));



// $text = $pdf->getText();
// $text = $pdf->getPages()[0]->getText();
// $text = $pdf->getText(6);

// echo $text;


$config = new Config();
$parser = new Parser([], $config);
$content = file_get_contents('./pdf_timbre/timbre.pdf');
$pdf = $parser->parseContent($content);
$text = $pdf->getText();
$sub = substr($text, 1658, 43);              // just to extract essential

$json = json_encode($sub);

echo $json;