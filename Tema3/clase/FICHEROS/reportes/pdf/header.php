<?
class Header extends FPDF
{
    function Header()
    {
        $this->SetFont('Courier','B',20);
        $this->SetTextColor(100,100,100);
        $this->setX(60);
        $this->Write(5,"DWES CLAUDIO MOYANO");
        $this->Ln();
        $this->Ln();
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