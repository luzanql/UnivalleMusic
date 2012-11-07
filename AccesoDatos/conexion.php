<?php

class Conexion {

    private $usuario;
    private $password;
    private $basedatos;
    private $server;
    private $conexion;

    function Conexion() {
        $this->server = "localhost";
        $this->usuario = "root";
        $this->password = "mayraata";
        $this->basedatos = "UnivalleMusic";
      }
        
        

        //echo "asf";
    

    /*function Conectar() {
        if ($this->conexion != NULL) {
            $this->conexion = mysql_connect($this->server, $this->usuario, $this->password);
            $bool = mysql_select_db($this->basedatos, $this->conexion);
            return $this->conexion;
            if ($bool === False) {
                print "can't find $mysql_database";
            }
        } else {
            return $this->conexion;
        }
    }*/
    
   
  function Conectar(){
 
   
    $this->conexion = mysql_connect($this->server, $this->usuario,  $this->password);
    mysql_select_db($this->basedatos,$this->conexion);
    return $this->conexion;
  }
    
  //Realizar una consulta o actualización en la BD
  function EjecutarSql($consulta){  
     $this->resconsul      = mysql_query($consulta);
 	 $this->registroActual = mysql_fetch_array($this->resconsul);
	 return $this->registroActual;
  } 

    //Devuelve el ultimo mensaje de error
    function Error() {
        return mysql_error();
    }

//Finalizar la conexion con el servidor
    function Cerrar() {
        mysql_close();
    }
    
    //Ejecuta sentencias
    function executeQuery($sqr){
        
    }

}

?>
