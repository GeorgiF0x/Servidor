<?

require ('./fpdf186/fpdf.php');
require ('header.php');


$arrayCliente=array('Pepe','12345678L','C/Buena 1','Granada España');

$pdf = new Header();

$pdf->AddPage();
$pdf->SetFont('Courier','I',10);
$pdf->SetX(110);
$pdf->Write(70,"Informacion Cliente ");
$pdf->SetX(110);
$pdf->Write(80,"Nombre :".$arrayCliente[0]);
$pdf->SetX(110);
$pdf->Write(90,"CIF/NIF :".$arrayCliente[1]);
$pdf->SetX(110);
$pdf->Write(100,"Direccion :".$arrayCliente[2]);
$pdf->SetX(110);
$pdf->Write(110,$arrayCliente[3]);
$pdf->SetFont('Courier','B',20);
// $pdf->Write(140,"DEBAJO INFORMACION");

$pdf->Output();