<?

require('./fpdf186/fpdf.php');
require('header.php');


$arrayCliente = array('Pepe', '12345678L', 'C/Buena 1', 'Granada España');

$pdf = new Header();

$pdf->AddPage();
$pdf->SetFont('Courier', 'I', 10);
$pdf->SetX(110);
$pdf->Write(70, "Informacion Cliente ");
$pdf->SetX(110);
$pdf->Write(80, "Nombre :" . $arrayCliente[0]);
$pdf->SetX(110);
$pdf->Write(90, "CIF/NIF :" . $arrayCliente[1]);
$pdf->SetX(110);
$pdf->Write(100, "Direccion :" . $arrayCliente[2]);
$pdf->SetX(110);
$pdf->Write(110, $arrayCliente[3]);
$pdf->SetFont('Courier', 'B', 20);

$array = array(array("concepto" => "Laptop", "cantidad" => 2, "precio" => 800, "iva" => 0.16),
    array("concepto" => "Monitor", "cantidad" => 1, "precio" => 200, "iva" => 0.16),
    array("concepto" => "Teclado", "cantidad" => 3, "precio" => 30, "iva" => 0.16),
    array("concepto" => "Mouse", "cantidad" => 4, "precio" => 15, "iva" => 0.16),
    array("concepto" => "Impresora", "cantidad" => 1, "precio" => 150, "iva" => 0.16),
    array("concepto" => "Disco Duro", "cantidad" => 2, "precio" => 100, "iva" => 0.16));

$pdf->SetY(110);
$pdf->SetFont('Courier','B',10);
crearTabla($array, $pdf);
function crearTabla($array, $pdf)
{
    $pdf->setFillColor(245, 14, 5);
    $pdf->setTextColor(255, 255, 255);
    $pdf->SetDrawColor(245, 14, 5);
    $pdf->Line(93, 69, 93, 35);
    $pdf->Cell(40, 10, "Concepto", 1, 0, 'C', true);
    $pdf->Cell(40, 10, "Cantidad ", 1, 0, 'C', true);
    $pdf->Cell(40, 10, "Precio ", 1, 0, 'C', true);
    $pdf->Cell(40, 10, "I.V.A", 1, 0, 'C', true);
    $pdf->Ln();


    
    // $text = "€";
    // $pdf->Write(0,iconv('UTF-8', 'windows-1252', $text));
    foreach ($array as $row) {
        $conta=0;
        foreach ($row as $dato) {
            if($conta % 2 == 0){
                $pdf->setFillColor(179, 173, 173);
            }
            $pdf->setFillColor(255, 255, 255);
            $pdf->setTextColor(0, 0, 0);
            $pdf->Cell(40, 10, $dato, "B", 0, 'C', true);
        }
        $conta++;
        $pdf->Ln();
    }
    // function calcularTotal($array){
    //     foreach ($array as $fila) {
    //         foreach ($fila as $valor ) {
    //             echo $valor. "<br>";
    //         }
    //     }
    // }
    
    // calcularTotal($array);
    
}
$pdf->Output();

