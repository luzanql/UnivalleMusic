<?php
class Cancion {
    
    Private $titulo;
    Private $codigo;
    Private $album;
    Private $genero;
    
    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setAlbum($album) {
        $this->album = $album;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAlbum() {
        return $this->album;
    }

    function getGenero() {
        return $this->genero;
    }

    function getCodigo() {
        return $this->codigo;
    }

}
?>
