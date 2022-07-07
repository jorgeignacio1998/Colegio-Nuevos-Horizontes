<?php 
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.


 $id_clase = $_GET['id_clase']; 







$inner = $mysqli->query("SELECT *, anotaciones.ID AS anoid, alumnos.ID AS alumnoid FROM anotaciones INNER JOIN alumnos ON  anotaciones.ID_ALUMNO = alumnos.ID WHERE ID_CLASE LIKE '{$id_clase}' order by alumnos.APELLIDO_1 ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <title>Lista de Anotaciones</title>

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
                Lista de Anotaciones                                    
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
            </div>

            <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                <table class="table align-middle">
                        <thead>
                            <tr>
                                
                            
                               
                                <th scope="col">ALUMNO</th>    
                                <th scope="col">FECHA</th>    
                                <th scope="col">ANOTACION</th>                                   
                               
                            

                            
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($inner) ) {

                               
                                
                                
                            ?>
                            <tr >

                            
                              
                                <td ><?php echo $fila['NOMBRE_1'] . ' '. $fila['NOMBRE_2'] . ' '. $fila['APELLIDO_1'] . ' '. $fila['APELLIDO_2']; ?></td>
                                <td ><?php echo $fila['FECHA']; ?></td>
                                <td ><?php echo $fila['ANOTACION']; ?></td>
                                
                               



                                <td><a class="text-primary" href="editar.php?id_anotacion=<?php echo $fila['anoid']; ?>&id_clase=<?php echo $id_clase; ?>">   <i class="fa-solid fa-pen"></i></a>  </td>
                                <td><a onclick="return confirm('¿estas seguro de eliminar esta anotacion ?')" class="text-danger" href="c_eliminar.php?id_anotacion=<?php echo $fila['anoid']; ?>&id_clase=<?php echo $id_clase; ?>">   <i class="bi bi-trash"></i></a>  </td>  
                                
                                
                            
                            


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
                       Nueva Anotación:
                   </div>
                   <form action="c_registrar.php" method="POST" class="p-4" >
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="id_alumno" class="form-label" >Alumno: </label>
                                <select  name="alumno" class="form-control"  required id="id_alumno">


                        
                        

                                <option value=""   >

                                            <?php
                                            $sqlAlumno = "SELECT * , clases.ID AS ideclass, alumnos.ID AS idealumn
                                            
                                        
                                            FROM alumnos
                                        
                                        
                                            INNER JOIN cursos  ON alumnos.ID_CURSO = cursos.ID
                                            INNER JOIN clases ON clases.ID_CURSO = cursos.ID
                                            WHERE clases.ID LIKE '{$id_clase}'
                                            ";
                                            $dataProfe = mysqli_query($mysqli, $sqlAlumno);

                                            
                                            while($data = mysqli_fetch_array($dataProfe)){ 
                                            ?>


                                            <!-- y este option las opciones -->
                                            <option  

                                            value="<?php   echo $data["idealumn"]; ?>"><?php echo utf8_encode($data['NOMBRE_1'] . ' ' . $data['NOMBRE_2'] . ' ' .$data['APELLIDO_1'] . ' ' .$data['APELLIDO_2'] ); ?>

                                            <?php } 
                                            ?>
                            </select>
                            </div>
                            
                        

                        

                            
                            <div class="mb-3 col-6">
                                <label for="9" class="form-label">Fecha: </label>
                                <input class="form-control" type="date" name="fecha"  autofocus required id="9" >
                            </div>
                        </div>

                        <div class="mb-3 ">
                                <label for="4" class="form-label">Descripción</label>
                                <textarea class="form-control texta" name="descripcion"  id="4"></textarea   > 
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






