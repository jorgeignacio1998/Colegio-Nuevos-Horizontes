<?php 
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.


$id_clase = $_GET['id_clase']; 







$inner = $mysqli->query("SELECT *, alumnos.NOMBRE_1 AS nom1, alumnos.NOMBRE_2 AS nom2, alumnos.APELLIDO_1 AS nom3,alumnos.APELLIDO_2 AS nom4,
clases.NOMBRE AS nombreclass, asignaturas.NOMBRE AS nomasig, cursos.LEEIBLE AS cursoleible,
calificaciones.ID AS id_nota, evaluaciones.ID AS ideva
FROM calificaciones INNER JOIN clases ON calificaciones.ID_CLASE = clases.ID
INNER JOIN alumnos ON calificaciones.ID_ALUMNO = alumnos.ID INNER JOIN evaluaciones ON calificaciones.ID_EVALUACION = evaluaciones.ID
INNER JOIN asignaturas ON clases.ID_ASIGNATURA = asignaturas.ID_A
INNER JOIN cursos ON clases.ID_CURSO = cursos.ID
WHERE clases.ID LIKE $id_clase
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
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div  class="col-md-7">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->

            <?php 
            include 'alertas.php';
            ?>

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
                                <th scope="col">CURSO </th>
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
                                <td ><?php echo $fila['cursoleible']; ?></td>
                                <td ><?php echo $fila['nombreclass']; ?></td>

                                <td><a class="text-primary" href="../calificaciones/index.php">  </a>  </td>
                            
                                
                                
                                <td><a class="text-primary" href="editar.php?id_calificacion=<?php echo $fila['id_nota']; ?>&id_clase=<?php echo $id_clase; ?>">   <i class="fa-solid fa-pen"></i></a>  </td>
                            


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

        
      

        <div class="col-md-4">    <!-- INICIO SEGUNDO COL  -->
               <div class="card">
                 
                   <div class="card-header">
                       Nueva calificacion:
                   </div>
                   <form action="c_registrar.php" method="POST" class="p-4" >

                        <div class="row">
                         
                            <?php 




                            //INYECCIONSQL PARA ASIGNATURA DEL ID CLASE
                                $datita1 = $mysqli->query("SELECT * FROM  clases WHERE ID LIKE '{$id_clase }'");
                                $sentencia1 =mysqli_fetch_array($datita1);
                                $id_asignatura = $sentencia1['ID_ASIGNATURA'];
                                // $id_curso = $sentencia2['ID_CURSO'];
                            //INYECCIONSQL PARA ASIGNATURA DEL ID CLASE





                            
                            ?>


                            <div class="mb-3 col-6">
                                <label class="form-label lab" for="6">Evaluacion:</label > 
                                <select name="evaID" class="form-control"  required   >
                                    <option disabled selected value >  </option>
                                        <?php
                                        $sql1 = "SELECT * FROM evaluaciones WHERE ID_ASIGNATURA LIKE '{$id_asignatura}'   ";
                                        $sql2 = mysqli_query($mysqli, $sql1);
                                        //usar el $id_clase 
                                        // WHERE ID_GRADO = ID GRADO DE LA CLASE-..........  SACAR EL ID DE LA ASIGNATURA Y SACAR EL ID GRADO
                                        // RESULTADO QUE SOLO APAREZCAN DE MATEMATICA Y DEL ID_GRADO  CORRESPONDIENTE
                                        while($data = mysqli_fetch_array($sql2)){ ?>
                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode(    'EVALUACION NUMERO  ' . $data['NUMERO'] .'  '  . $data['NOMBRE']); ?>

                                        <?php } ?>
                                </select>  
                            </div> 





                            <div class="mb-3 col-6">
                                <label for="1" class="form-label">NOTA: </label>
                                <input type="text" class="form-control" name="nota" autofocus required id="1">
                            </div>            
                        </div>






                        
                        <?php 
                        //INYECCIONSQL PARA 
                            $datita11 = $mysqli->query("SELECT *,clases.ID AS id_clase, alumnos.ID_CURSO AS idecur  FROM  clases  INNER JOIN  asignaturas  ON asignaturas.ID_A = clases.ID_ASIGNATURA 
                            INNER JOIN  cursos  ON cursos.ID = clases.ID_CURSO 
                            INNER JOIN  alumnos  ON alumnos.ID_CURSO = cursos.ID 
                            
                            
                            WHERE clases.ID LIKE '{$id_clase }'");
                            $sentencia11 =mysqli_fetch_array($datita11);
                            $id_cursooo = $sentencia11['idecur'];
                            // $sentencia11['idalum'] = array();
                            
                            echo '<script language="javascript">alert("' . 'ARRAY: ' . $id_cursooo    . '");</script>';

                            // echo '<script language="javascript">alert("' . 'ALERTO: ' .  $sentencia11   . '");</script>';
                            // $id_alumno = $sentencia11['idalum'];
                            // 
                            // $id_curso = $sentencia2['ID_CURSO'];
                        //INYECCIONSQL PARA 

                        ?>

                        
                      

                



                            <div class="mb-3 col-12">
                                <label class="form-label lab" for="6">ALUMNO:</label > 
                                <select name="id_alumno" class="form-control"  required   >
                                    <option disabled selected value >  </option>
                                        <?php
                                        $sql10 = "SELECT * FROM alumnos  WHERE ID_CURSO LIKE '{$id_cursooo}'   ";
                                        $sql20 = mysqli_query($mysqli, $sql10);
                                            //usar el $id_clase 
                                        // ID_CURSO DE alumnos          
                                        // RESULTADO QUE SOLO APAREZCAN DE MATEMATICA Y DEL ID_GRADO  CORRESPONDIENTE
                                        while($data = mysqli_fetch_array($sql20)){
                                            
                                            ?>
                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode(   $data['NOMBRE_1'] .'  '  . $data['APELLIDO_1']); ?>

                                        <?php } ?>
                                </select>  
                            </div> 


                           
                        
        

                      

                        
                        <div class="d-grid mt-5">
                            <input type="hidden"  name="id_clase" value="<?php echo $id_clase;  ?>">  <!-- lo al c para que me lo envie de vuelta = get -->
                            
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>

                   </form>

            
                 




               </div>
               <br>
           </div>












    </div>
</div>
</body>
</html>






