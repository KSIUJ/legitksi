<?php

$footer = "ważna do <b>".file_get_contents("config/data.txt")."</b>";

require_once('lib/tcpdf.php');
$pdf = new TCPDF("P", "mm", "A4");
$pdf->SetCreator("Legitk(s)i");
$pdf->SetFontSubsetting(false);
$pdf->SetPrintFooter(false);
$pdf->SetPrintHeader(false);
$pdf->SetAutoPageBreak(TRUE, 0);
		
/* SIZE CONFIG - in mm */
$leftMargin=5;$topMargin=5;
$cellsPerPage=10;
<<<<<<< HEAD
$cellWidth=80; $cellHeight=50;
=======
//$cellWidth=85; $cellHeight=54; //<-- -1mm for border (A4 is 297mm heigh)
$cellWidth=78; $cellHeight=49;
>>>>>>> 5bf5c56f94cf1089be6fed56cfad1cfc44fe651c

$handle = fopen("config/ludzie.txt", "r");
if ($handle) {
	$i=-1;
    while (($line = fgets($handle)) !== false) {
        $i=($i+1)%$cellsPerPage;
		if ($i==0) { //page change
			$x=$leftMargin; $y=$topMargin;
			$pdf->AddPage(); 
		}
		if ($i%2==0){$x=$leftMargin;} else {$x=$leftMargin+$cellWidth;}
		
		//template
		$pdf->SetY($y);	$pdf->SetX($x);
		$pdf->Image('config/template.png', $x, $y, $cellWidth, $cellHeight );
		//border
		$pdf->MultiCell($cellWidth, $cellHeight, "", 1, 'C');
		//name
		$pdf->SetY($y+27.5);$pdf->SetX($x);
		$pdf->SetFont('freemono', '', 18);
		$pdf->MultiCell($cellWidth, 20, $line, 0, 'C');
		//footer
		$pdf->SetFont('freemono', '', 9);
		$pdf->SetY($y+42.5);$pdf->SetX($x);
		$pdf->MultiCell($cellWidth, 20, $footer, 0, 'C', 0, 0, '', '', true, 0, true);
		
		if ($i%2==1){$y+=$cellHeight;} //row change
    }

    fclose($handle);
}
$pdf->Output('legitksi.pdf', 'I');
