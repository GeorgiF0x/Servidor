<?



class Header extends FPDF
{
    function Header()
    {
        $this->SetFont('Courier','B',20);
        $this->Image("./logo.jpg",10,10,20,30);
        $this->SetTextColor(100,100,100);
        $this->setX(70);
        $this->Write(5,"PR12");
        $this->setX(30);
        $this->SetTextColor(254, 3, 7 );
        $this->Write(30,"Mi empresa");
        $this->setX(5);
        $this->SetTextColor(0,0,0);
        $this->SetFont('Courier','I',10);
        $this->Write(70,"Fulanito de tal y cual");
        $this->setX(5);
        $this->Write(80,"CIF/NIF : 89765434f");
        $this->setX(5);
        $this->Write(90,"Calle falsa 1-2-3");
        $this->setX(5);
        $this->Write(100,"Zamora España");
    }

    function Footer()
    {
        $this->SetFont('Courier','B',20);
        $this->SetTextColor(100,100,100);
        $this->setY(-20);
        $this->setX(-110);
        $this->Write(5,$this->PageNo());
        $this->Ln();
        $this->Ln();
    }
}