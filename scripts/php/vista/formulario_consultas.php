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
</head>
<body>
<?php
require_once('header.php');
?>
<h3 style="background-color:yellow;
                text-align: center;
                padding: 15px;"> CONSULTAS ALUMNOS </h3>

    <div class="alert alert-danger" role="alert" 
        style="width: 50%; margin: auto;">
            This is a success alert—check it out!
    </div>


<?php
        include('../controlador/alumno_DAO.php');
        $aDAO = new AlumnoDAO();
        $res = $aDAO->mostrarAlumnos();
       
        //var_dump($res);

        if(mysqli_num_rows($res)>0){

            //mysqli_fetch_row  => obtiene datos como un vector normal (indices numericos)
            //mysqli_fetch_assoc  => obtiene datos como un vector asociativo


                   echo "<div><div> <br><table id='tabla' class='display table table-hover text-nowrap' style='width:50%'>
                        <thead>
                            <tr>
                                <th>Numero control</th>
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
                <td>".$fila['Numcon']."</td>".
                "<td>".$fila['nom']."</td>".
                "<td>".$fila['pa']."</td>".
                "<td>".$fila['sa']."</td>".
                "<td>".$fila['edad']."</td>".
                "<td>".$fila['semes']."</td>".
                "<td>".$fila['carr']."</td>".
                "<td><a href='formulario_modificar.php?id=". $fila["Numcon"] ."'>Editar</a></td>"
                                            
                );

            }

        }else{
            echo "SIN registros para mostrar";
        }
        echo "</table> </div> </div>";
    ?>
    
</body>
</html>
