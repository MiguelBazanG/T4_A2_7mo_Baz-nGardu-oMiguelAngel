<?php

    include('../conexiones_BD/conexion_bd_escuela.php');

    class AlumnoDAO{

        private $conexion;

        public function __construct(){
            $this->conexion = new ConexionBDEscuela();
        }

        //------------------------ METODOS ABCC --------------------------------

        // ========= ALTAS 
        public function agregarAlumno($nc, $n, $pa, $sa, $e, $s, $c){
            $sql = "INSERT INTO Alumnos VALUES ('$nc', '$n', '$pa', '$sa', $e, $s, '$c')";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //====== BAJAS
        public function eliminarAlumno($nc){
            $sql = "DELETE FROM Alumnos WHERE numcon='$nc'";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

//======CAMBIOS
        public function actualizar($nc,$n, $pa, $sa, $e, $s, $c){
            $sql = "UPDATE Alumnos SET nom ='$n', pa ='$pa', sa ='$sa',edad = $e,semes = $s,carr ='$c' WHERE Numcon = '$nc'";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        public function modificarAlumno($nc, $n, $pa, $sa, $e, $s, $c){

            $sql = "UPDATE Alumnos SET nom = '$n', pa = '$pa', sa = '$sa',
             edad = $e, semes = $s, carr = '$c' WHERE Numcon = '$nc'";
             $res = mysqli_query($this->conexion->getConexion(), $sql);
             return $res;
            }
        public function mostrarAlumnosPorNc($nc){
            $sql = "SELECT * FROM Alumnos where Numcon ='$nc'";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

        //======CONSULTAS
        public function mostrarAlumnos(){
            $sql = "SELECT * FROM Alumnos";
            $res = mysqli_query($this->conexion->getConexion(), $sql);
            return $res;
        }

    }//class Alumno

?>