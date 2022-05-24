<?php 

include 'seguridad_subdirector.php';    //BD, SEGURIDAD NIVEL, SESSION.


    $usuario_logueado = $_SESSION['usuario'];
    $datos_asignaturas = $mysqli->query("SELECT * FROM asignaturas"); //obteniendo los datos
    $datos_grados = $mysqli->query("SELECT * FROM grados"); //obteniendo los datos
 

    $inner = $mysqli->query("SELECT * FROM asignaturas
                        INNER JOIN grados
                        ON asignaturas.ID_GRADO = grados.ID");


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



                
                
           <?php include 'sendAlertas.php';
            ?>

                


            


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
                                    <th scope="col">Grado</th>
                                  
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($inner)  ) {
                                 
                                    
                                    


                                    


                                    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['ID_A']; ?></td>
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                                    <td ><?php echo $fila['NIVEL']; ?></td>



                                

                                    <td><a class="text-primary" href="E_asignatura.php?codigo=<?php echo $fila['ID_A']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a esta asignatura?')" class="text-danger" href="d_asigna.php?codigo=<?php echo $fila['ID_A']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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















           

           <div class="col-md-4 col-sm-12 ">    <!-- INICIO SEGUNDO COL  -->
               <div class="card segundo">
                 
                   <div class="card-header">
                       Ingresar datos:
                   </div>

                   <form action="c_asigna.php" method="POST" class="p-4" >
                        <div class="mb-3">
                            <label for="_1" class="form-label">Nombre Asignatura: </label>
                            <input type="text" class="form-control" name="nombre" autofocus required id="_1">
                        </div>   
                        
                        

                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Grado</label > 
                                        <select name="grado" class="form-control"  required  id="_6" >
                                        <option disabled selected value >  </option>
                                                    <?php
                                                    $sqlTipo = "SELECT * FROM grados order by ID";
                                                    $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NIVEL']); ?>

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


