<?php 

include 'seguridad_subdirector.php';    //BD, SEGURIDAD NIVEL, SESSION.


    $usuario_logueado = $_SESSION['usuario'];
    $datos_asignaturas = $mysqli->query("SELECT * FROM asignaturas"); //obteniendo los datos
 


?>



<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
<div class="container-fluid moverabajo">
       <div class="row justify-content-center">
           <div  class="col-md-6 col-sm-12">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->




                
                <!-- 2.  alerta  registrado  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>registro realizado exitosamente</strong> 
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
                       Lista de asignaturas                                     
                       <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                   </div>

                   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Asignatura</th>                              
                                    <th scope="col">Id profesor</th>
                                    <th scope="col">Id sala</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($datos_asignaturas) ) {

                                    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['ID']; ?></td>
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                                    <td ><?php echo $fila['ID_PROFESOR']; ?></td>
                                    <td ><?php echo $fila['ID_SALA']; ?></td>

                                    <td><a class="text-primary" href="editar.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a este usuario?')" class="text-danger" href="c_eliminar.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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















           

           <div class="col-md-4 col-sm-12 col1">    <!-- INICIO SEGUNDO COL  -->
               <div class="card segundo">
                 
                   <div class="card-header">
                       Ingresar datos:
                   </div>
                   <form action="c_registrar.php" method="POST" class="p-4" >
                        <div class="mb-3">
                            <label for="_1" class="form-label">Nombre Asignatura: </label>
                            <input type="text" class="form-control" name="nombre" autofocus required id="_1">
                        </div>             
                        <div class="mb-3">
                            <label for="_2" class="form-label">Profesor: </label>
                            <select name="profesor" class="form-control"  required  id="_6" >
                                        <option disabled selected value >  </option>
                                                    <?php
                                                    $sqlProfe = "SELECT * FROM profesores order by ID";
                                                    $dataProfe = mysqli_query($mysqli, $sqlProfe);
                                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                    while($data = mysqli_fetch_array($dataProfe)){ ?>
                                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode('ID: '. $data['ID']. ' - Nombre: '. $data['NOMBRE'] ); ?>

                                                    <?php } ?>
                                        </select>  
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Sala: </label > 
                                        <select name="sala" class="form-control"  required  id="_6" >
                                        <option disabled selected value >  </option>
                                                    <?php
                                                    $sqlSala = "SELECT * FROM salas order by ID";
                                                    $dataSala = mysqli_query($mysqli, $sqlSala);
                                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                    while($data = mysqli_fetch_array($dataSala)){ ?>
                                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode('ID: '. $data['ID']. ' - Numero: '. $data['NUMERO']. ' - Piso: '.$data['PISO'] ); ?>

                                                    <?php } ?>
                                        </select>  
                        </div>
                        
                        <div class="d-grid mt-5">
                            <input type="hidden" name="oculto" value="1" >
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>

                   </form>

               </div>
               <br>
           </div>
       </div>
   </div>





























      
    <!-- Bootstrap JavaScript Libraries -->
    





</body>
</html>



























</body>
</html>


