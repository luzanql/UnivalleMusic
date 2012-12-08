<?php
require('../Logica/Utilidades/fpdf_demo/fpdf.php');
require('../Controladores/ControladorReportes.php');

class PdfTable extends FPDF
{

	function FancyTable($header,$data,$w)
	{
		//Colores, ancho de l�nea y fuente en negrita
		$this->SetFillColor(0, 126, 216);
		$this->SetTextColor(255);
		$this->SetDrawColor(0, 126, 216);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		
		//Cabecera
		
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
		$this->Ln();
		
		//Restauraci�n de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		
		//Datos
		$fill=false;
		foreach($data as $row)
//                    print_r ($data);
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

//T�tulos de las columnas
//$header=array('Nombre','E-Mail','Twitter');
$header=array('Artista','Cancion');

//anchos de cada columna
//$widths=array(40,70,40);
$widths=array(40,40);

$controladorReporte = new ControladorReportes();
$listaArtistasxCanciones = $controladorReporte ->getArtistxSong();

//print_r($listaArtistasxCanciones);
//Carga de datos

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$listaArtistasxCanciones,$widths);
$pdf->Output();
?>