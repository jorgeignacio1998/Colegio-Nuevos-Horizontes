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
$id_curso = $sentencia3['ID_CURSO'];
//INYECCIONSQL

// $inner = $mysqli->query("SELECT *, matriculados.NOMBRE1_ALUMNO AS n1, matriculados.ID AS idmat FROM matriculados WHERE RUT_ALUMNO LIKE '{$rut_alumno}'")
$inner = $mysqli->query("SELECT * FROM alumnos WHERE ID LIKE '{$id_alumno}'");

// $horarios = $mysqli->query("SELECT *,dias.ID AS iddia  FROM horarios_clases INNER JOIN clases ON horarios_clases.ID_CLASE = clases.ID 
// INNER JOIN dias ON dias.ID = horarios_clases.ID_DIA
// WHERE clases.ID LIKE '16' ");

$horarios = $mysqli->query("SELECT *, asignaturas.NOMBRE AS nombas FROM horarios_clases 
INNER JOIN dias ON dias.ID = horarios_clases.ID_DIA
INNER JOIN clases ON horarios_clases.ID_CLASE = clases.ID
INNER JOIN asignaturas ON clases.ID_ASIGNATURA = asignaturas.ID_A
INNER JOIN cursos ON cursos.ID = clases.ID_CURSO
INNER JOIN alumnos ON alumnos.ID_CURSO = cursos.ID
WHERE alumnos.ID LIKE '{$id_alumno}'
ORDER BY dias.ID");

//   echo '<script language="javascript">alert("' .  $evaluaciones   . '");</script>';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <title>Lista de Horarios</title>

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


<!--  1. Primera ALERTA, campos no vacios para el registro -->

<!-- siguiendo con la estructura de la tabla (primer col) -->
<div  class="card ">
   <div class="card-header">
       Lista de Horarios                                     
       <!-- <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          aca -->
   </div>

   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
       <table class="table align-middle">
            <thead>
                <tr>
                    
                 
                    <th scope="col">NOMBRE ASIGNATURA</th>
                    <th scope="col">DÍA</th>
                    <th scope="col">HORA INICIO</th>
                    <th scope="col">HORA TERMINO</th>
               

                    

                </tr>
            </thead>
            <tbody >
                <?php     //IMPRIMIR DATOS EN LOS td

                while($fila =mysqli_fetch_array($horarios) ) {

                    
                ?>
                <tr >

                  
                    <td scope="row"><?php echo $fila['nombas']; ?></td>
                    <td scope="row"><?php echo $fila['NOMBRE_DIA']; ?></td>
                    <td scope="row"><?php echo $fila['HORA_INICIO']; ?></td>
                    <td scope="row"><?php echo $fila['HORA_TERMINO']; ?></td>
                    


                    
                </tr>
                <?php
                }
                ?>
               
            </tbody>
       </table>
   </div>
</div>
<br>  <br>
</div><!-- TERMINO PRIMER COL  --> 

        
      

           <!-- INICIO SEGUNDO COL  -->
</div>
</body>
</html>