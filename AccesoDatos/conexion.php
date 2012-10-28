<?php

$conexion = new Conexion();



class Conexion
{
  var $usuario;
  var $password;
  var $basedatos;
  var $server;
  var $conexion;
    
  function Conexion() 
  {
        $this->server = "localhost";
        $this->usuario = "root";
        $this->password = "root";
        $this->basedatos = "univalle_music";
       
        echo "asf";
    }
  
     function Conectar() 
    {
        $this->conexion = @mysql_connect($this->server, $this->usuario, $this->password);
        $bool = mysql_select_db($this->basedatos, $this->conexion);
        return $this->conexion;
        if ($bool === False) 
        {
            print "can't find $mysql_database";
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
