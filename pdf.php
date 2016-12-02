<?php

require_once('tcpdf/tcpdf.php');
//require_once('model/database.php');
include ("conectar.php");



$pdf= new TCPDF('P','mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('PDF Autogenerado en PHP');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetMargins(20,20,20,false);
$pdf->SetAutoPageBreak(false);
$pdf->addPage();


$mysqli=conectar();
$proyectos = mysqli_query($mysqli, " SELECT * FROM Proyectos ");
$html='';
$item=1;
foreach ($proyectos as $key ) {
	# code...
	$Proyecto=$key ['id_Proyecto'];	
	$FechaProyecto=$key ['fecha_Proyecto'];	
	$Descripcion=$key ['descripcion'];	
	$Justificacion=$key ['justificacion'];	
	$Resultados=$key ['resultado'];	
	$Convocatoria=$key ['convocatoria'];	

/*
$barcode=$pdf->serializeTCPDFtagParameters(array($barcode,'C128','','',72,25,0.5,array('position'=>'S', 'border'=>false, 'padding'=>2, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255),
	'text'=>true, 'font'=>'helvetica', 'fontsize'=>7, 'stretchtext'=>6), 'N'));
*/
	
	$html .='<table border="1" cellpadding="5">
			<tr>
			<td width="100" bgcolor="E6E6E6"><b>Proyecto: </b></td>
			<td width="220">'.$Proyecto.'</td>
			</tr>
			<tr>
			<td  bgcolor="E6E6E6"><b>FechaProyecto: </b></td>
			<td>'.$FechaProyecto.'</td>
			</tr>
			<tr>
			<td  bgcolor="E6E6E6"><b>Descripcion: </b></td>
			<td>'.$Descripcion.'</td>
			</tr>
			<tr>
			<td  bgcolor="E6E6E6"><b>Justificacion: </b></td>
			<td>'.$Justificacion.'</td>
			</tr>
			<tr>
			<td  bgcolor="E6E6E6"><b>Resultados: </b></td>
			<td>'.$Resultados.'</td>
			</tr>
			<tr>
			<td  bgcolor="E6E6E6"><b>Convocatoria: </b></td>
			<td>'.$Convocatoria.'</td>
			</tr>
			</table><br><br><br>';



}



	$pdf->SetFont('Helvetica','',10);
	$pdf->writeHTML($html, true,0,true,0);

	$pdf->lastPage();
	$pdf->output('Proyectos.pdf','I');


