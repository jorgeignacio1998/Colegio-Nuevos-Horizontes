<?php
include '../seguridad_subdirector.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga academica docentes</title>
    <link rel="stylesheet" type="text/css" href="../styles/navside.css?<?php echo time(); ?>" >  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
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
    



<!-- Funciion para obtener el ID seleccionado por el cliente -->
  <script>
    $(document).ready(function() {
                                $("#id_curso").change(function() {
    //    alert($('#id_curso').val());
    // var selectedVal = $("#myselect option:selected").text();
    var selectedVal = $("#id_curso option:selected").val();
                              

    // Enviar el id por get
                         

        // var selectedVal = $("#myselect option:selected").text();
                                
        //   alert($('#id_curso').val());
        //   alert(selectedVal);
        // Enviar el id por get                            
        //alert(input);   
        $.ajax({
                                            
                url:"2.php",
                method: "POST",
                data: {variable:selectedVal},

                success:function(data){
                    $("#searchResult3").html(data);
                    $("#searchResult3").css("display","block");
                }
            });
        // Enviar el id por get
        });
                                    
                                    

                               
    });
  </script>
<!-- Funciion para obtener el ID seleccionado por el cliente -->


<!-- Inicio BUSQUEDA con Jquery -->   
    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){

                var input = $(this).val();
                //alert(input);   

                    $.ajax({

                        url:"liveSearch2.php",
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
<div class="container moverabajo">
    <div class="row ">

           
        <div  class="col-8">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->


        <!-- ALERTAS  -->
          
                 <!-- 1 alerta clonado  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'clonado') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR</strong> La asignacion ya existe.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 1 alerta clonado  -->


                 <!-- 2.  alerta    eliminado  success -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SE ELIMINARON LOS DATOS CORRECTAMENTE </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 2. alerta    eliminado  success, -->


                   <!-- 3 alerta ERROR, seguridad.  -->
                   <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 3 alerta ERROR  -->


                 <!-- 4.  alerta  registrado  success -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>REGISTRO REALIZADO CORRECTAMENTE</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                 <!-- 4. alerta registrado  success -->

                
                <!-- 5.  alerta    EDITADO  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>CAMBIOS REALIZADO CON EXITO</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 5. alerta  EDITADO  success -->

        <!-- ALERTAS  -->




            <!-- siguiendo con la estructura de la tabla (primer col) -->
            <div  class="card ">
                <div class="card-header">
                    Lista de clases                                     
                    <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                </div>

                <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                    <table class="table align-middle">
                        <thead>
                            <tr>

                                <?php
                                    $inner = $mysqli->query("SELECT *, clases.NOMBRE AS nombrecla,
                                    grados.NIVEL AS gradoniv,cursos.NOMBRE AS nombrecurs,
                                    asignaturas.NOMBRE AS nombreasig, profesores.NOMBRE AS 
                                    nombreprofe FROM clases INNER JOIN asignaturas ON
                                    clases.ID_ASIGNATURA = asignaturas.ID_A INNER JOIN 
                                    profesores ON profesores.ID = clases.ID_PROFESOR
                                    INNER JOIN cursos ON cursos.ID = clases.ID_CURSO
                                    INNER JOIN grados ON grados.ID = cursos.ID_GRADO
                                    ORDER BY grados.ID, cursos.NOMBRE
                                    ");
                                ?>

                                <th scope="col">Clase</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Asignatura</th>    
                                <th scope="col">Profesor</th>                              
                             
                            
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($inner)  ) {
                            
                                
                                
                            
                                
                            ?>
                            <tr >

                                <td scope="row"><?php echo $fila['nombrecla']; ?></td>
                                <td ><?php echo $fila['gradoniv'] . ' ' . $fila['nombrecurs'] ?></td>
                                <td ><?php echo $fila['nombreasig']; ?></td>
                                <td ><?php echo $fila['nombreprofe']; ?></td>
                               



                            

                                <td><a class="text-primary" href="E_asignacion.php?=">        <i class="bi bi-pencil-square"></i></a>  </td>
                                <td><a onclick="return confirm('¿estas seguro de eliminar a esta asignatura?')" class="text-danger" href="d_asignacion.php?id_asignacion=">   <i class="bi bi-trash"></i></a>  </td>  
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
       
       
      
           





























           <div class="col-4  ">    <!-- INICIO SEGUNDO COL  -->
               <div class="card segundo">
                 
                   <div class="card-header">
                       Registrar Clase:
                   </div>
                   <form action="c_asignar.php" method="POST" class="p-4" >
                        
                        
                        <div class="mb-3">
                            <label for="_2" class="form-label">Nombre de la Clase: </label>
                            <input type="text" class="form-control" name="nombre" autofocus required id="_2">
                        </div>



                            
    
                        <div class="mb-3">
                            <label class="form-label lab" for="id_curso">Curso</label > 
                            <select name="curso" class="form-control"  required  id="id_curso" >
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

                        <div id="searchResult3">
                        
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
                            <?php 
                            //INYECCIONSQL
                                $datita = $mysqli->query("SELECT * FROM  periodos WHERE ESTADO LIKE 'VIGENTE' ");
                                $sentencia2 =mysqli_fetch_array($datita);
                                $id_periodo = $sentencia2['ID'];
                            //INYECCIONSQL
                            ?>
                                            
                            <input type="hidden"  name="periodo" value="<?php echo $id_periodo;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
                            <input type="submit" class="btn btn-primary" value="Asignar">
                        </div>

                   </form>

               </div>
               <br>
            </div>   <!--col 4 -->









       </div>
   </div>










</body>
</html>






