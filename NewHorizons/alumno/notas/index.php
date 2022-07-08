<?php 
include '../seguridad_alumno.php';    //BD, SEGURIDAD NIVEL, SESSION.

$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$nombre_usuario = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);

// $id_clase = $_GET['id_clase']; 
$rut_alumno = $_GET['rut_alumno'];

$inner = $mysqli->query("SELECT *, alumnos.NOMBRE_1 AS nom1, alumnos.NOMBRE_2 AS nom2, alumnos.APELLIDO_1 AS nom3,alumnos.APELLIDO_2 AS nom4,
clases.NOMBRE AS nombreclass, asignaturas.NOMBRE AS nomasig, cursos.LEEIBLE AS cursoleible,
calificaciones.ID AS id_nota, evaluaciones.ID AS ideva
FROM calificaciones INNER JOIN clases ON calificaciones.ID_CLASE = clases.ID
INNER JOIN alumnos ON calificaciones.ID_ALUMNO = alumnos.ID INNER JOIN evaluaciones ON calificaciones.ID_EVALUACION = evaluaciones.ID
INNER JOIN asignaturas ON clases.ID_ASIGNATURA = asignaturas.ID_A
INNER JOIN cursos ON clases.ID_CURSO = cursos.ID
WHERE alumnos.RUT LIKE '{$rut_alumno}'
ORDER BY clases.ID, cursos.ID, alumnos.ID,   alumnos.APELLIDO_1, evaluaciones.NUMERO   ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <title>Lista de Calificaciones</title>

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

<!-- TEXTO USUARIO PARTE 2 -->
<div class="text-center mt-4">
<p class="fs-6" style="color:steelblue"> <?php  echo $nombre_usuario['NOMBRE'];?> </p>
</div>
<!-- TEXTO USUARIO PARTE 2 -->

    <!-- Estos dos son para el rut verificador -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../../codes/jquery.rut.js"></script>  
    <!-- Estos dos son para el rut verificador -->

    <!-- Inicio BUSQUEDA con Jquery -->   
    <script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){

            var input = $(this).val();
            //alert(input);   

                $.ajax({

                    url:"liveSearch.php",
                    method: "POST",
                    data: {input:input},

                    success:function(data){
                        $("#searchResult").html(data);
                        $("#searchResult").css("display","block");
                    }

                });
         
        });

    });
</script>
<!-- Termino BUSQUEDA con Jquery -->   









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
                Lista de Calificaciones                                    
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
            </div>

            <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                <table class="table align-middle">
                        <thead>
                            <tr>
                                
                            
                                <th scope="col">NOMBRE DEL ALUMNO</th>
                                <th scope="col">NOTA</th>                                        
                                <th scope="col"> N° EVALUACIÓN </th>
                                <th scope="col">ASIGNATURA </th>

                                <th scope="col">CLASE </th>
                            

                            
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($inner) ) {

                                $nombreCompleto = $fila['nom1'] . ' ' . $fila['nom2']  . ' ' .$fila['nom3'] . ' ' . $fila['nom4'];
                                
                                
                            ?>
                            <tr >

                            
                                <td ><?php echo $nombreCompleto ?></td>
                                <td ><?php echo $fila['NOTA']; ?></td>
                                <td ><?php  echo 'EVALUACIÓN  ' .  $fila['NUMERO']; ?></td>
                                <td ><?php echo $fila['nomasig']; ?></td>

                                <td ><?php echo $fila['nombreclass']; ?></td>



 
                                
                                
                            
                            


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

        
      

           <!-- INICIO SEGUNDO COL  -->
</div>
</body>
</html>