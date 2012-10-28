<?php

$conexion = new Conexion();



class Conexion
{
    private $usuario;
    private $password;
    private $basedatos;
    private $server;
    static $conexion;
    
  function Conexion() 
  {
        $this->server = "localhost";
        $this->usuario = "root";
        $this->password = "root";
        $this->basedatos = "univalle_music";
        $this->Conectar();
        echo "asf";
    }
  
    function Conectar() {
        if ($this->conexion != NULL) {
            $this->conexion = @mysql_connect($this->server, $this->usuario, $this->password);
            $bool = mysql_select_db($this->basedatos, $this->conexion);
            return $this->conexion;
            if ($bool === False) {
                print "can't find $mysql_database";
            }
        }else{
            return $this->conexion;
        }
    }
    
      //Devuelve el ultimo mensaje de error
  function Error()
 {
         return mysql_error();
  }
  
  //Finalizar la conexion con el servidor
  function Cerrar(){
	mysql_close($this->conexion); 
  }
    
}

?>
