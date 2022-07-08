<?php 
include '../seguridad_subdirector.php';    //BD, SEGURIDAD NIVEL, SESSION.



$inner = $mysqli->query("SELECT *, sedes.NOMBRE_SEDE AS nombresede  FROM salas INNER JOIN sedes ON salas.ID_SEDE = sedes.ID_SEDE");

$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$nombre_usuario = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de salas</title>
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

<!-- TEXTO USUARIO PARTE 2 -->
<div class="text-center mt-4">
<p class="fs-6" style="color:steelblue"> <?php  echo $nombre_usuario['NOMBRE'];?> </p>
</div>
<!-- TEXTO USUARIO PARTE 2 -->


<!-- Inicio Gestor de usuarios--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-7">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->

                <?php 
                include 'alertas.php';
                ?>

                <!-- siguiendo con la estructura de la tabla (primer col) -->
               <div  class="card ">
                   <div class="card-header">
                       Lista de salas                                     
                       <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                   </div>

                   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                 
                                    <th scope="col">NUMERO</th>
                                    <th scope="col">PISO</th>                                        
                                    <th scope="col">SEDE</th>
                                   


                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($inner) ) {

                                    
                                ?>
                                <tr >

                                   
                                    <td ><?php echo $fila['NUMERO']; ?></td>
                                    <td ><?php echo $fila['PISO']; ?></td>
                                    <td ><?php echo $fila['nombresede']; ?></td>
                                    


                                    <td><a class="text-primary" href="editar.php?id_sala=<?php echo $fila['ID'] ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a esta sala?')" class="text-danger" href="c_eliminar.php?id_sala=<?php echo $fila['ID'] ?>">   <i class="bi bi-trash"></i></a>  </td>  
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
                       Registrar sala:
                   </div>
                   <form action="c_registrarSala.php" method="POST" class="p-4" >

                            
                        <div class="mb-3">
                            <label for="1" class="form-label">Numero de la sala: </label>
                            <input type="text" class="form-control" name="numero" autofocus required id="1">
                        </div>
                          
                           
                        <div class="mb-3">
                            <label for="2" class="form-label">Piso: </label>
                            <input type="text" class="form-control" name="piso" autofocus required id="2">
                        </div>



                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Sede:</label > 
                            <select name="sede" class="form-control"  required  id="_6" >
                                <option disabled selected value >  </option>
                                    <?php
                                    $sqlTipo = "SELECT * FROM sedes ";
                                    $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                <option value="<?php echo $data["ID_SEDE"]; ?>"><?php echo utf8_encode($data['NOMBRE_SEDE']); ?>

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