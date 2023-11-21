<?

    require ('../fpdf186/fpdf.php');
    require ('header.php');

    $pdf = new Header(); //creamos el objeto fdpf 

    $pdf->AddPage();
    $pdf->SetFont('Courier','B',20);
    $pdf->Write(5,"Hola mundo");
    $pdf->AddPage();
    // $pdf->Image("logo.jpeg",70,20,100,120,'jpeg');
    $pdf->Cell(80,10,"Prueba",1,1,'C',false);
    $pdf->Cell(80,10,"Prueba",1,0,'C',false);//el segundo 1 si lo cambiamos a 0 en vez de saltar de linea la dibuja al lado

    $pdf->Cell(80,10,"Prueba",1,2,'C',false);
    $pdf->Cell(80,10,"Prueba",1,2,'C',false);

    $array=array(
        array('pc1','lenovo','1TB','4GBRAM'),
        array('pc2','dell','1TB','4GBRAM'),
        array('pc3','Asus','2TB','8GBRAM'),
        array('pc4','hp','500GB','4GBRAM'),
    );
    $pdf->AddPage();
    crearTabla($array,$pdf);
    function crearTabla($array,$pdf){
        $pdf->setFillColor(255,0,0);
        $pdf->setTextColor(255,255,255);
        $pdf->Cell(40,10,"PC",1,0,'C',true);
        $pdf->Cell(40,10,"Marca",1,0,'C',true);
        $pdf->Cell(40,10,"HDD",1,0,'C',true);
        $pdf->Cell(40,10,"Ram",1,0,'C',true);

        $pdf->Ln();

        foreach ($array as $row) {
            foreach ($row as $dato) {
                $pdf->setFillColor(0,250,146);
                $pdf->Cell(40,10,$dato,1,0,'C',true);
            }
            $pdf->Ln();
        }
    }
    $pdf->AddPage();
    $pdf->Output();