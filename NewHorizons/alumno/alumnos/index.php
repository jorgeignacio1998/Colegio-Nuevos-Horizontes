<?php 
include '../seguridad_alumno.php';    //BD, SEGURIDAD NIVEL, SESSION.






$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$nombre_usuario = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);
 





//INYECCIONSQL
$datita = $mysqli->query("SELECT * FROM  usuarios WHERE ID LIKE '{$usuario_logueado}'");
$sentencia2 =mysqli_fetch_array($datita);
$rut_alumno = $sentencia2['RUT'];

//INYECCIONSQL

//INYECCIONSQL
$datita2 = $mysqli->query("SELECT * FROM alumnos WHERE RUT LIKE '{$rut_alumno}'");
$sentencia3 =mysqli_fetch_array($datita2);
$id_alumno = $sentencia3['ID'];

//INYECCIONSQL

// $inner = $mysqli->query("SELECT *, matriculados.NOMBRE1_ALUMNO AS n1, matriculados.ID AS idmat FROM matriculados WHERE RUT_ALUMNO LIKE '{$rut_alumno}'")
$inner = $mysqli->query("SELECT * FROM alumnos WHERE ID LIKE '{$id_alumno}'")



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <title>Lista de Alumnos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->




</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    
    
    <?php 
    include 'navside.php';
    ?>



    <!-- $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); -->


    <!-- TEXTO USUARIO PARTE 2 -->
    <div class="text-center mt-4">
    <p class="fs-6" style="color:steelblue"> <?php  echo $nombre_usuario['NOMBRE'];?> </p>
    </div>
    <!-- TEXTO USUARIO PARTE 2 -->



    <style>
        .moverabajo{
            
            margin-top: 5%;
        }

        
        .col1{
            height:580px; overflow-y:scroll;
        }
                


    </style>


    <!-- Inicio Gestor de asignaturas--  academico -->   
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div  class="col-md-7">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->



            <!-- siguiendo con la estructura de la tabla (primer col) -->
            <div  class="card ">
            <div class="card-header">
                Lista de Alumnos                                    
                       <!-- aca-->
            </div>

            <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                <table class="table align-middle">
                        <thead>
                            <tr>
                                
                            
                                <th scope="col">NOMBRE DEL ALUMNO</th>
                                <th scope="col">NOTAS</th>
                                <th scope="col">HORARIO</th>
                                <th scope="col">ANOTACIONES</th>
                                      

                            

                            
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($inner) ) {

 
                                $nombre = $fila['NOMBRE_1'].' '.$fila['NOMBRE_2'].' '.$fila['APELLIDO_1'].' '.$fila['APELLIDO_2'];


                                
                            ?>
                            <tr >

                                <td ><?php echo $nombre; ?></td>


                                
                                <td><a class="text-primary" href="../notas/index.php?rut_alumno=<?php echo $fila['RUT']; ?>">   <i class="bi bi-journal-bookmark-fill"></i></a>  </td>
                                <td><a class="text-success" href="../horarios/index.php?rut_alumno=<?php echo $fila['RUT']; ?>">   <i class="bi bi-calendar-week"></i></a>  </td>
                                <td><a class="text-dark" href="../anotaciones/index.php?rut_alumno=<?php echo $fila['RUT']; ?>">   <i class="bi bi-card-checklist"></i></a>  </td>
                            


                                <!-- le envia por la url el id del usuario al c_eliminar -->
                                
                            </tr>
                            <?php
                            }
                            ?>
                        
                        </tbody>
                </table>
            </div>
            </div>
            <br>  <br>
        </div> <!-- TERMINO PRIMER COL  --> 

        
      


</div>
</body>
</html>






