<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logoPalotogia (Medium).jpg',10,10,50);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Salto de línea
    $this->Ln(20);
}
//pie de pagina
function Footer()
{
    // pie
   
    $this->SetY(-50);
    // Arial itálica 8
     $this->Image('img/pie.png',10,null,190);
    // Posición a 1,5 cm del final
    $this->SetFont('Arial','I',8);
    // Color del texto en gris
    $this->SetTextColor(128);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página '.$this->PageNo()),0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
//fecha
$pdf->Cell(0,0,utf8_decode('FECHA: '.date("d/m/y")),0,0,'R',false);
//salto de linea
$pdf->Ln(20);
//recorremos celda
$pdf->Cell(20);
//texto
$pdf->Cell(0,0,"Dr.");
//pacinete*-*-*-*-*-*-*-*-*-*-*-*-*-*
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->Cell(20,0,"Paciente:");
//texto
$pdf->Cell(20,0,"Edad:");
//texto
$pdf->Cell(20,0,"Sexo:");
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->Cell(0,0,"Estudio:");
$pdf->Ln(5);
 $pdf->Image('img/pdf/macro.png',10,null,50);
 $pdf->Ln(5);
 $pdf->Image('img/pdf/micro.png',10,null,50);
 $pdf->Ln(5);
 $pdf->Image('img/pdf/diag.png',10,null,25);



$pdf->Output();
?>
<a href="home.php">Regresar</a>