<?php

include_once 'conexion.php';

class DaoCarrito {

    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

	
	function addCancion(Cancion $cancion, $idUsuario ) {
		$sessionActual = Session::getInstance();
		$carrito = $sessionActual->carrito;
        $carrito[] = $cancion;
		$sessionActual->carrito = $carrito;
    }

    function deleteCancion(Cancion $cancion) {
        $sessionActual = Session::getInstance();
        unset($sessionActual->carrito[$cancion]);// se supone que quita el elemento cancion de el array carrito
    }

	
	function getListaCancionesCarrito() {
        
		$this->conexion->Conectar();
        $sql = "SELECT c.codigo, c.nombre, ar.nombre as artista, al.nombre as album from cancion as c, artista as ar, album as al, cancionesxusuario as cu, usuario as u WHERE c.codigo= cu.codigo_Cancion AND ar.codigo=c.artista AND cu.codigo_Usuario = u.usuario AND c.codigo_Album = al.codigo AND u.codigo_Perfil =1;";
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
			$cancion = array();
			$cancion[0] = $row ["codigo"];
			$cancion[1] = $row ["nombre"];
			$cancion[2] = $row ["artista"];
			$cancion[3] = $row ["album"];
            $filas [] = $cancion;
        }
		//print_r($filas)  ;
        $this->conexion->cerrar();
        return $filas;
    }
	
	function getListaCancionesCarrito2()
   {
		$this->conexion->Conectar();
		$sql = "SELECT c.codigo, c.nombre, ar.nombre as artista, al.nombre as album from cancion as c, artista as ar, album as al, cancionesxusuario as cu, usuario as u WHERE c.codigo= cu.codigo_Cancion AND ar.codigo=c.artista AND cu.codigo_Usuario = u.usuario AND c.codigo_Album = al.codigo AND u.codigo_Perfil =1;";
		$ejecutar = mysql_query($sql);
		$row = mysql_fetch_array($ejecutar);
		$this->conexion->cerrar();
		return $row;
   } 
}

?>