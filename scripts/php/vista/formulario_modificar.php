<?php
  session_start();
  if($_SESSION['u_valido']==false){
    //header('location:pagina_acceso_prohibido.html');
    header('location: login.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            padding: 0;
            margin: 0;
        }
        th, td{
            
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body>
<?php
require_once('header.php');
?>
<h3 style="background-color:red;
                text-align: center;
                padding: 15px;"> Modificar ALUMNOS </h3>

    <div class="alert alert-danger" role="alert" 
        style="width: 50%; margin: auto;">
            This is a success alert—check it out!
    </div>


<?php
        include('../controlador/alumno_DAO.php');
        $aDAO = new AlumnoDAO();
        $id = $_GET["id"];
        $res = $aDAO->mostrarAlumnosPorNc($id);
        //$ruta = "procesar_mod.php";
        //var_dump($res);

        if(mysqli_num_rows($res)>0){

            //mysqli_fetch_row  => obtiene datos como un vector normal (indices numericos)
            //mysqli_fetch_assoc  => obtiene datos como un vector asociativo


                   echo "<form action='procesar_mod.php' method='post'><br><table id='tabla' class='display table table-hover text-nowrap' style='width:50%'>
                        <thead>
                            <tr>
                                <th>Nombre</th> 
                                <th>Primer_Ap</th>
                                <th>Segundo_AP</th>
                                <th>Edad</th>
                                <th>Semestre</th>
                                <th>Carrera</th>
                                <th>opciones</th>
                                
                            </tr>
                        </thead>";
            

            while($fila = mysqli_fetch_assoc($res)){
                printf("<tr>
                <td><input type='hidden' value='". $fila["Numcon"]."' name='num'></input>
                <input type='text' value='". $fila["nom"]."' name='nom'></input></td>".

                "<td><input type='text' value='". $fila["pa"]."' name='pa'></input></td>".

                "<td><input type='text' value='". $fila["sa"]."' name='sa'></input></td>".

                "<td><input type='text' value='". $fila["edad"]."' name='e'></input></td>".

                "<td><input type='text' value='". $fila["semes"]."' name='s'></input></td>".

                "<td><input type='text' value='". $fila["carr"]."'name='c'></input></td>".

                "<td><input type='submit' value='Actualizar'></input></td>"                       
                
            );

            }

        }else{
            echo "SIN registros para mostrar";
        }
        echo "</table> </form> ";
    ?>
    
</body>
</html>
