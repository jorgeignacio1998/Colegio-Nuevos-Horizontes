<?php
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.
$id_usuario = $_SESSION['usuario'];    //usando variable global, tabla usuarios id, con este dato sacare el rut del profe.

//INYECCIONSQL 
$datita = $mysqli->query("SELECT * FROM  usuarios WHERE ID LIKE '{$id_usuario}'");
$sentencia2 =mysqli_fetch_array($datita);
$rut_profesor = $sentencia2['RUT'];
//INYECCIONSQL


//INYECCIONSQL2 
$datita2 = $mysqli->query("SELECT * FROM  profesores WHERE RUT LIKE '{$rut_profesor}'");
$sentencia22 =mysqli_fetch_array($datita2);
$id_profesor = $sentencia22['ID'];
//  echo '<script language="javascript">alert("' . 'ALERTO: ' .  $id_profesor   . '");</script>';
//INYECCIONSQL2


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
    // include 'navside.php';
    ?>
    











<style>
 .moverabajo{
     
     margin-top: 5%;
 }

 
.col1{
    height:580px; overflow-y:scroll;
}
        


</style>


<!-- Inicio Gestor de asignaturas--  academico -->   
<div class="container moverabajo">
    <div class="row ">

           
        <div  class="col-10 col-sm-12">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->

   
        <?php 
         include 'alertas.php';
        ?>
    

     



            <!-- siguiendo con la estructura de la tabla (primer col) -->
            <div  class="card ">
                <div class="card-header">
                    Lista de clases                                     
                </div>

                <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                    <table class="table align-middle">
                        <thead>
                            <tr>

                                <?php
                                    $inner = $mysqli->query("SELECT *, clases.NOMBRE AS nombrecla,
                                    grados.NIVEL AS gradoniv,cursos.NOMBRE AS nombrecurs,
                                    clases.ID AS claseid, cursos.LEEIBLE AS leeible,
                                    salas.NUMERO AS nsala,
                                    asignaturas.NOMBRE AS nombreasig, profesores.NOMBRE AS 
                                    nombreprofe FROM clases INNER JOIN asignaturas ON
                                    clases.ID_ASIGNATURA = asignaturas.ID_A INNER JOIN 
                                    profesores ON profesores.ID = clases.ID_PROFESOR
                                    INNER JOIN cursos ON cursos.ID = clases.ID_CURSO
                                    INNER JOIN grados ON grados.ID = cursos.ID_GRADO
                                    INNER JOIN salas ON clases.ID_SALA = salas.ID
                                    WHERE clases.ID_PROFESOR LIKE $id_profesor
                                    ORDER BY grados.ID, cursos.NOMBRE 
                                    ");
                                ?>

                                <th scope="col">CLASE</th>
                                <th scope="col">ASIGNATURA</th>    
                                <th scope="col">CURSO</th>
                                <th scope="col">SALA</th> 
                                
                                                           
                             
                            
                                <th scope="col" colspan="2">Calificaciones</th>
                                <th scope="col" colspan="2">Anotaciones</th>
                               
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($inner)  ) {
                            
                                
                                
                            
                                
                            ?>
                            <tr >

                                <td ><?php echo $fila['nombrecla']; ?></td>
                                <td ><?php echo $fila['nombreasig']; ?></td>
                                <td ><?php echo $fila['leeible']; ?></td>
                                <td ><?php echo  'SALA ' .$fila['nsala'] ?></td>
                                
                                
                               



                            

                                <td><a class="text-primary" href="../calificaciones/index.php?id_clase=<?php echo $fila['claseid']; ?>">   <i class="fa-solid fa-book"></i> </a>  </td>
                                <td><a class="text-success" href="../anotaciones/index.php?id_clase=<?php echo $fila['claseid']; ?>">  <i class="bi bi-journal-bookmark-fill"></i>  </a>  </td>
                              
                           
                                



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
   </div>










</body>
</html>






