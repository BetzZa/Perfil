<?php
require('../fpdf/fpdf.php');
include('../phpqrcode/qrlib.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logoPalotogia (Medium).jpg');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(50,10,'Recibo No: 1',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
//pie de pagina
function Footer()
{
    // pie
    $this->Image('img/pie.png');
    // Posición a 1,5 cm del final
    $this->SetY(-15);
    // Arial itálica 8
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
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(10,10,10);
$pdf->SetTextColor(255,255,255);
//$pdf->Cell(30,10,utf8_decode('NOMBRE: '),1,0,'C',true);
//$pdf->Cell(30,10,utf8_decode('FECHA: '),0,0,'C',true);
$pdf->Output();
?>
<a href="home.php">Regresar</a>