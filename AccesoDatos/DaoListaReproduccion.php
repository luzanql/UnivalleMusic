<?
require_once 'conexion.php';
require_once '../Logica/ListaReproduccion.php';

class DaoListaReproduccion {

    private $conexion;
    
    function DaoListaReproduccion() {
        $this->conexion = new Conexion();
    }
    
    function getListasReproduccionPorUsuario($idUsuario) {
        $this->conexion->Conectar();
        $sql = "SELECT nombre FROM ListaReproduccion WHERE id_Usuario=" . $idUsuario;
        $respuesta = mysql_query($sql);
        $filas = array();
        while ($row = mysql_fetch_array($respuesta)) {
            $filas [] = $row ["nombre"];
        }
        $this->conexion->cerrar();
        return $filas;
    }

    function createListaReproduccion(ListaReproduccion $lr) {
        $this->conexion->Conectar();
        $nombre = $lr->getNombre();
        $idUsuario = $lr->getIdUsuario();
        $sql = "INSERT INTO ListaReproduccion(nombre,id_Usuario) VALUES ('.$nombre.',.$idUsuario.)";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

    function deleteListaReproduccion($codigo) {
        $this->conexion->Conectar();
        $sql = "DELETE FROM ListaReproduccion WHERE codigo='" .$codigo . "'";
        $ejecutar = mysql_query($sql);
        $this->conexion->cerrar();
    }

}

?>