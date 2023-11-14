<?php
include('vendor/autoload.php');
use Spatie\PdfToText\Pdf;

$content =  Pdf::getText('./pdf_timbre/timbre.pdf');
file_put_contents('content.php', $content);


$fh = fopen('content.php','r');
while ($line = fgets($fh)) {

    $regex = '/SD \: (.*)/';
    if ( preg_match($regex, $line, $match) ) {
     echo 'The text after SD is: '.$match[1].PHP_EOL;
    }
}
fclose($fh);
?>
