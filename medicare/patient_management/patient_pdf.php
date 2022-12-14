<?php
require('pdf/FPDF/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=medicare','root','');

class myPDF extends FPDF{
    function header(){
        // $this->Image('logo.jpg',2,1);
        $this->SetFont('Arial','B',24);
        $this->Cell(276,5,'Medicare',0,0,'C');
        $this->Ln();
        $this->Ln();
        $this->SetFont('Times','',22);
        $this->cell(276,5,'Patient Details',0,0,'C');
        $this->Ln(20);
    } 
    function footer(){
        $this->setY(-15);
        $this->SetFont('Arial','',8);
        $this->cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(30,10,' PATIENT ID',1,0,'C');
        $this->Cell(35,10,' NAME',1,0,'C');
        $this->Cell(30,10,' NIC',1,0,'C');
        $this->Cell(30,10,' GENDER',1,0,'C');
        $this->Cell(40,10,' DATE OF BIRTH',1,0,'C');
        $this->Cell(60,10,' ADDRESS',1,0,'C');
        $this->Cell(25,10,' CITY',1,0,'C');
        $this->Cell(28,10,' TELEPHONE',1,0,'C');
        $this->Ln();
    }
    function viewTable($db){
        $this->SetFont('Times','',12);
        $stmt=$db->query('select *from patient');
        while($data =$stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(30,10, $data->pid,1,0,'C');
            $this->Cell(35,10,$data-> name,1,0,'L');
            $this->Cell(30,10,$data->nic,1,0,'L');
            $this->Cell(30,10,$data->gender,1,0,'L');
            $this->Cell(40,10,$data->dob,1,0,'L');
            $this->Cell(60,10,$data->address,1,0,'L');
            $this->Cell(25,10,$data->city,1,0,'L');
            $this->Cell(28,10,$data->t_phone,1,0,'L');
            $this->Ln();
        }    

    }

}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
