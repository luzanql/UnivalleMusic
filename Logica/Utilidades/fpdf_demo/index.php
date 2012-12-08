<?php
require('fpdf.php');
class PdfTable extends FPDF
{

	function FancyTable($header,$data,$w)
	{
		//Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(0, 126, 216);
		$this->SetTextColor(255);
		$this->SetDrawColor(0, 126, 216);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		
		//Cabecera
		
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
		$this->Ln();
		
		//Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		
		//Datos
		$fill=false;
		foreach($data as $row)
		{
			foreach($w as $k=>$col){
				$this->Cell($col,6,$row[$k],'LR',0,'L',$fill);
			}
			
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w),0,'','T');
	}
}
//instanciamos la clase
$pdf=new PdfTable();

//Títulos de las columnas
$header=array('Nombre','E-Mail','Twitter');

//anchos de cada columna
$widths=array(40,70,40);

//Carga de datos
$data=array(
array("Juan","jperez@hotmail.com","@jperez"),
array("Mario","mmoreno@hotmail.com","@mariom"),
array("Luis","lgomez@hotmail.com","@luisluis"),
array("Javier","jchavez@hotmail.com","@xavierx")
);

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data,$widths);
$pdf->Output();
?>