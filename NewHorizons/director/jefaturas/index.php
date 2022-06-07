<?php 
include '../seguridad_director.php';    //BD, SEGURIDAD NIVEL, SESSION.
$datos_cursos = $mysqli->query("SELECT * FROM cursos");




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de jefaturas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
    
    <style>
        .col1{
            Height:650px; overflow-y:scroll;
        }

    </style>

</head>
<body>
<!-- scripts para boostrap y popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    


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


    <?php 
    include 'navside.php';
    ?>




<!-- Inicio Gestor de usuarios--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-7">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->



                <!--1-  Profesor jefe ya tiene un curso   -->
                    <?php
                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'no_disponible') {
                        ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>ERROR</strong> El profesór ya tiene una jefatura asociada.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        }
                    ?>
                  <!--1-  Profesor jefe ya tiene un curso   -->




                <!--1-  El curso ya tiene profesor jefe  -->
                    <?php
                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'curso_no_disponible') {
                        ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>ERROR</strong> El curso ya tiene un profesór jefe.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        }
                    ?>
                 <!--1-  El curso ya tiene profesor jefe  -->





                 

                
                <!-- 2.  alerta  registrado  success -->
                <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registro realizado exitosamente</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                ?>
                 <!-- 2. alerta registrado  success -->


                 <!-- 3 alerta ERROR, seguridad.  -->
                <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> Vuelve a intentar.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    }
                ?>
                <!-- 3 alerta ERROR  -->

                <!-- 4.  alerta    editado  success -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambios realizados exitosamente</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 4. alerta    registrado  success -->

                <!-- 5.  alerta    eliminado  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Se han eliminado los datos correctamente </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 5. alerta    eliminado  success, TERMINO DE TODAS LAS ALERTAS-->



               















                <!-- siguiendo con la estructura de la tabla (primer col) -->
               <div  class="card ">
                   <div class="card-header">
                       Lista de Jefaturas                                     
                       <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                   </div>

                   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Curso</th>                          
                                    <th scope="col">profesor Jefe</th>


                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td

                                
                            $inner = $mysqli->query("SELECT *,
                                
                                cursos.NOMBRE as curnom,
                                grados.NIVEL as graniv,
                                profesores.NOMBRE as pronom
                            



                            FROM jefaturas
                            INNER JOIN cursos                 
                            ON jefaturas.ID_CURSO = cursos.ID
                            INNER JOIN profesores
                            ON jefaturas.ID_PROFESOR = profesores.ID
                            INNER JOIN grados                 
                            ON cursos.ID_GRADO = grados.ID


                            ");
   
                                while($fila =mysqli_fetch_array($inner) ) {

                                    
                                ?>
                                <tr >

                                   
                                    <td scope="row"><?php echo $fila['ID_JEFATURA']; ?></td>
                                    <td ><?php echo $fila['graniv'] . ' ' . $fila['curnom'] ; ?></td>
                                    <td ><?php echo $fila['pronom']; ?></td>
                                    

                                    
                                   
                                    


                                    <td><a class="text-primary" href="E_jefatura.php?id_jefatura=<?php echo $fila['ID_JEFATURA']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a esta jefatura')" class="text-danger" href="c_eliminar_jefatura.php?id_jefatura=<?php echo $fila['ID_JEFATURA']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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
                       Asignar Jefatura:
                   </div>
                   <form action="c_registrar_jefatura.php" method="POST" class="p-4" >

                   
                            
                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Curso</label > 
                            <select name="curso" class="form-control"  required  id="_6" >
                                <option disabled selected value >  </option>
                                    <?php
                                    $sqlTipo = "SELECT *,
                                    cursos.ID as curid,
                                    cursos.NOMBRE as curnom,
                                    grados.NIVEL as graniv
                                    FROM cursos 
                                    INNER JOIN grados 
                                    ON cursos.ID_GRADO  = grados.ID";
                                    $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                <option value="<?php echo $data["curid"]; ?>"><?php echo utf8_encode($data['graniv'] . ' ' .$data['curnom'] ); ?>

                                    <?php } ?>
                            </select>  
                        </div>   
                      

                        
                        <div class="mb-3">
                            <label for="_2" class="form-label">Profesor: </label>
                            <select name="profesor" class="form-control"  required id="_2">


                            <!-- Este option es el dato del profesor -->
                         

                            <option value=""   >

                                        <?php
                                        $sqlProfe = "SELECT * FROM profesores order by ID";
                                        $dataProfe = mysqli_query($mysqli, $sqlProfe);

                                        
                                        while($data = mysqli_fetch_array($dataProfe)){ 
                                        ?>


                                        <!-- y este option las opciones -->
                                        <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode('ID: '. $data['ID']. ' - Nombre: '. $data['NOMBRE'] ); ?>
                                        <?php } ?>

                           </select>
                        </div>
 


                        
                        <div class="d-grid mt-5">
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