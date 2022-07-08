<?php 
include '../seguridad_apoderado.php';    //BD, SEGURIDAD NIVEL, SESSION.


    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
    $nombre_usuario = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);
    $rut_apoderado = $nombre_usuario['RUT'];


//INYECCIONSQL TENEMOS EL ID DEL USUARIO, CON ESO SACAREMOS EL RUT DEL USUARIO Y EL RUT DEL APODERADO
$datita2 = $mysqli->query("SELECT * FROM apoderados WHERE RUT LIKE '{$rut_apoderado}'");
$sentencia3 =mysqli_fetch_array($datita2);
$id_apoderado = $sentencia3['ID'];
$id_matriculado = $sentencia3['ID_MATRICULADO'];
//INYECCIONSQL TENEMOS EL ID DEL USUARIO, CON ESO SACAREMOS EL RUT DEL USUARIO Y EL RUT DEL APODERADO

//INYECCIONSQL TENEMOS EL ID DEL USUARIO, CON ESO SACAREMOS EL RUT DEL USUARIO Y EL RUT DEL APODERADO
$datita3 = $mysqli->query("SELECT * FROM matriculados WHERE ID LIKE '{$id_matriculado}'");
$sentencia4 =mysqli_fetch_array($datita3);
$rut_alumno = $sentencia4['RUT_ALUMNO'];
//INYECCIONSQL TENEMOS EL ID DEL USUARIO, CON ESO SACAREMOS EL RUT DEL USUARIO Y EL RUT DEL APODERADO
















//aaaaaaaaaaaaaa´

// $inner2 = $mysqli->query("SELECT *, matriculados.NOMBRE1_ALUMNO AS n1, matriculados.ID AS idmat, matriculados.ID AS matrid
// FROM apoderados INNER JOIN matriculados ON apoderados.ID_MATRICULADO = matriculados.ID WHERE RUT LIKE '{$rut_apoderado}' 


//       ");
// $sentencia5 =mysqli_fetch_array($inner2);
// $array_ides = $sentencia5['ID'];


//aaaaaaaaaaaaaaa







$inner = $mysqli->query("SELECT *, matriculados.NOMBRE1_ALUMNO AS n1, matriculados.ID AS idmat, matriculados.ID AS matrid FROM matriculados 
INNER JOIN apoderados ON apoderados.ID_MATRICULADO = matriculados.ID
WHERE RUT_ALUMNO LIKE '{$rut_alumno}'")





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
    
    <div class="text-center mt-4">
    <p class="fs-6" style="color:steelblue"> <?php  echo $nombre_usuario['NOMBRE'];?> </p>
    </div>










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
                                
                            
                                <th scope="col">ID ALUMNO</th>
                                <th scope="col">NOMBRE DEL ALUMNO</th>
                                <th scope="col">NOTAS</th>
                                <th scope="col">HORARIO</th>
                                <th scope="col">ANOTACIONES</th>
                                      

                            

                            
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td



                                //SUPER QUERY
                                $query1 = $mysqli->query("SELECT *, alumnos.NOMBRE_1 AS nom1,alumnos.NOMBRE_2 AS nom2, alumnos.APELLIDO_1 AS nom3, alumnos.APELLIDO_2 AS nom4  FROM apoderados 
                                INNER JOIN matriculados on apoderados.ID_MATRICULADO = matriculados.ID
                                INNER JOIN alumnos on matriculados.RUT_ALUMNO = alumnos.RUT
                                


                                WHERE apoderados.RUT LIKE '{$rut_apoderado}'   
                                ");
                           


                                //SUPER QUERY



                            while($fila =mysqli_fetch_array($query1) ) {

                                
                                // $nombre = $fila['NOMBRE1_ALUMNO'].' '.$fila['NOMBRE2_ALUMNO'].' '.$fila['APELLIDO1_ALUMNO'].' '.$fila['APELLIDO2_ALUMNO'];


                                
                            ?>
                            <tr >

                                <td scope="row"><?php echo $fila['nom1'] . ' '. $fila['nom2'] . ' '. $fila['nom3'] . ' '. $fila['nom4']; ?></td>
                                <td ><?php echo $fila['NOMBRE']; ?></td>


                                
                                <td><a class="text-primary" href="../notas/index.php?rut_alumno=<?php echo $fila['RUT_ALUMNO']; ?>">   <i class="bi bi-journal-bookmark-fill"></i></a>  </td>
                                <td><a class="text-success" href="../horarios/index.php?rut_alumno=<?php echo $fila['RUT_ALUMNO']; ?>">   <i class="bi bi-calendar-week"></i></a>  </td>
                                <td><a class="text-dark" href="../anotaciones/index.php?rut_alumno=<?php echo $fila['RUT_ALUMNO']; ?>">   <i class="bi bi-card-checklist"></i></a>  </td>
                            


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






