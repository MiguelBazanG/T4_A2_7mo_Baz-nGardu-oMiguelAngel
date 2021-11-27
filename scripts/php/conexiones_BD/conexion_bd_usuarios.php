<?php
    class ConexionBDUsuarios{
        private $conexion;
        private $host = 'localhost:3306';
        private $usuario = 'root'; //MySQL
        private $contraseña = 'losdec211299'; //MySQL
        private $bd = 'uBD';

        public function __construct(){
            //Java this.conexion =
            $this->conexion = mysqli_connect($this->host, $this->usuario, $this->contraseña, $this->bd);
            if(!$this->conexion)
                die("Error en conexion con MySQL" . mysqli_connect_error() . mysqli_connect_errno() );
            //else
                //echo "<h1>Exito!</h1>";
        }

        public function getConexion(){
            return $this->conexion;
        }
    }
?>