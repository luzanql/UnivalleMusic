<?php
require('../Logica/Utilidades/fpdf_demo/fpdf.php');
require('../Controladores/ControladorReportes.php');

class ReportePdf extends FPDF
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
$pdf=new ReportePdf();

//T�tulos de las columnas
//$header=array('Nombre','E-Mail','Twitter');
$header=array('Cancion','Artista');
$header2=array('Cancion','Nro Compras');
$header3=array('Nro Canciones','Artista');
//anchos de cada columna
//$widths=array(40,70,40);
$widths=array(40,40);

$controladorReporte = new ControladorReportes();
$listaArtistasxCanciones = $controladorReporte ->getArtistxSong();

$topCancionesCompradas = $controladorReporte ->getNCancionesCompradas();
$listaNroCancionesxArtistas = $controladorReporte ->getNCancionesXArtista();

//print_r($listaArtistasxCanciones);
//Carga de datos

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Write(10,'Canciones y Artistas Guardadas');
$pdf->Ln();
$pdf->Ln();
$pdf->FancyTable($header,$listaArtistasxCanciones,$widths);
//$pdf->Ln();
$pdf->AddPage();
$pdf->Ln();
$pdf->Write(10,'5 Canciones mas compradas');
$pdf->Ln();
$pdf->Ln();
$pdf->FancyTable($header2,$topCancionesCompradas,$widths);
$pdf->AddPage();
$pdf->Ln();
$pdf->Write(10,'Cantidad de canciones por Artista');
$pdf->Ln();
$pdf->Ln();
$pdf->FancyTable($header3,$listaNroCancionesxArtistas,$widths);
$pdf->Output();
?>