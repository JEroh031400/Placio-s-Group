<?php
require ("fpdf.php");
$db=new PDO('mysql:host=sql201.epizy.com;dbname=epiz_28471577_yacht','epiz_28471577','NHAUeSwzLrqvdst');
         
class mypdf extends FPDF{
	

function Header()
{	
	$this->Image('pycs.png',10,6,50,'C');

  $this->SetFont('Arial', 'B', 9);
    $this->Cell(0, 10, $this->title, 10, 10, 'C');
   

$this->Cell(0, 10, $this->title2, 8, 5, 'C');
   
$this->Cell(0, 10, $this->title3, 8, 5, 'C');
   

$this->Ln();

}
function footer(){

$this->SetY(-15);
$this->SetFont('Arial','',8);
$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');

}

function headerTable($db){

	


	
	
	$this->Ln();
	$this->SetFont('times','B',12);

	$this->SetFont('Arial', 'B', 8);
$this->Cell(180,5,'Summary report of Yacht repairs',1,0,'C');
$this->Ln();
	$this->Cell(50,5,'Client name',1,0,'C');
	$this->Cell(80,5,'BoatModel',1,0,'C');
	
	$this->Cell(50,5,'ServiceFee',1,0,'C');

	$this->Ln();

	}

function viewTable($db){

$this->SetFont('times','B',9);
	 
	$stmnt=$db->query("SELECT accounts.Name,tr.BoatModel,tr.ServiceFee,week(now()) FROM tr,accounts WHERE accounts.AccountID=tr.AccountID AND tr.StatusOfRepair='Finished already picked up' OR tr.StatusOfRepair='Finished ready for pick up'");

     
$i=0;
	while($data=$stmnt->fetch(PDO::FETCH_OBJ)){
	$this->Cell(80,5,$data->Name,1,0,'L');
	$this->Cell(50,5,$data->BoatModel,1,0,'L');
	$this->Cell(50,5,$data->ServiceFee,1,0,'L');
	$this->Ln();

}
}




function headerT($db){

	$this->Ln();
	$this->Ln();
	$this->Ln();
	$this->SetFont('times','B',12);

	$this->Cell(80,5,'Status Of Repair',1,0,'L');
	$this->Cell(100,5,'Number',1,0,'L');
	

	$this->Ln();

	}

function viewstat($db){

$this->SetFont('times','B',9);
	 
	$stmnt=$db->query("SELECT tr.StatusOfRepair,COUNT(tr.StatusOfRepair) AS 'Number' FROM tr,accounts WHERE tr.AccountID=accounts.AccountID OR week(tr.Finished)=week(now()) GROUP BY tr.StatusOfRepair");

	while($data=$stmnt->fetch(PDO::FETCH_OBJ)){
	$this->Cell(80,5,$data->StatusOfRepair,1,0,'L');
	$this->Cell(100,5,$data->Number,1,0,'L');
	$this->Ln();

}

}


}











$pdf=new mypdf();
$pdf->title = 'Weekly Report of Repairs';
$pdf->title2='Date: '.$date = strftime("%B %d, %Y");
$pdf->title3=' Time: '.strftime("%X");
$pdf->Addpage('P','A4',0);

$pdf->headerTable($db);
$pdf->viewTable($db);
$pdf->headerT($db);
$pdf->viewstat($db);


$pdf->AliasNbPages();
$pdf->Output();

?>