<?php
include 'seguridad_subdirector.php';


$query10 = $mysqli->query("SELECT * FROM asignaturas_profes");







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
<div class="container moverabajo">
    <div class="row ">

           
        <div  class="col-5">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->


            <!-- siguiendo con la estructura de la tabla (primer col) -->
            <div  class="card ">
                <div class="card-header">
                    Lista de asignaciones                                     
                    <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                </div>

                <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                
                                <th scope="col">#</th>
                                <th scope="col">Profesor</th>                              
                                <th scope="col">Asignatura</th>
                            
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($query10)  ) {
                            
                                
                                


                                


                                
                            ?>
                            <tr >

                                <td scope="row"><?php echo $fila['ID_ASIGNACION']; ?></td>
                                <td ><?php echo $fila['ID_PROFESOR']; ?></td>
                                <td ><?php echo $fila['ID_ASIGNATURA']; ?></td>



                            

                                <td><a class="text-primary" href="E_asignatura.php?codigo=<?php echo $fila['ID_ASIGNACION']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                <td><a onclick="return confirm('¿estas seguro de eliminar a esta asignatura?')" class="text-danger" href="d_asigna.php?codigo=<?php echo $fila['ID_ASIGNACION']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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
                       Asignar asignaturas
                   </div>
                   <form action="c_asignar.php" method="POST" class="p-4" >
                        <div class="mb-3">
                            <label for="_1" class="form-label">Nombre Asignatura: </label>
                            <select name="asignatura" class="form-control"  required id="_2">


                            <!-- Este option es el dato del profesor -->
                         

                            <option value="">

                                        <?php
                                        $sqlAsi = "SELECT * FROM asignaturas order by ID_A";
                                        $dataAsi = mysqli_query($mysqli, $sqlAsi);

                                        
                                        while($data = mysqli_fetch_array($dataAsi)){ 
                                        ?>


                                        <!-- y este option las opciones -->
                                        <option value="<?php echo $data["ID_A"]; ?>"><?php echo utf8_encode('ID: '. $data['ID_A']. ' - Nombre: '. $data['NOMBRE'] ); ?>
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
                         
                            <input type="hidden"  name="codigo" value="<?php echo $codigo;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
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






