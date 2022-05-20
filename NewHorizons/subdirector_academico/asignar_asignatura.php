<?php
include 'seguridad_subdirector.php';
$codigo = $_GET['codigo'];
if(!isset($_GET['codigo'])) {

    header('Location: ../index.php?mensaje=error');
    exit();
}


//Pintando datos Del ID = GET
$query = "SELECT NOMBRE, ID_PROFESOR, ID_SALA FROM asignaturas  WHERE ID = $codigo ";
$sentencia1 = $mysqli->query($query);
//print_r($sentencia1);  no entrega nada importante la sentencia es importante para la segunda.
$sentencia2 =mysqli_fetch_array($sentencia1);
//print_r($sentencia2);   //TIENE LOS DATOS ahora se pintan en lo value.




$query2 = "SELECT NOMBRE, ID_PROFESOR, ID_SALA FROM asignaturas  WHERE ID = $codigo ";
$inner = $mysqli->query($query2);








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
           <div class="col-md-4 col-sm-12 ">    <!-- INICIO SEGUNDO COL  -->
               <div class="card segundo">
                 
                   <div class="card-header">
                       Editar asignatura:
                   </div>
                   <form action="e_asigna.php" method="POST" class="p-4" >
                        <div class="mb-3">
                            <label for="_1" class="form-label">Nombre Asignatura: </label>
                            <select name="profesor" class="form-control"  required id="_2">


                            <!-- Este option es el dato del profesor -->
                         

                            <option value="<?php echo $sentencia2['ID_PROFESOR']; ?>"><?php echo utf8_encode($sentencia2['ID_PROFESOR'] ); ?>

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
                        
                        

                        <div class="mb-3">
                            <label for="_2" class="form-label">Profesor: </label>
                            <select name="profesor" class="form-control"  required id="_2">


                            <!-- Este option es el dato del profesor -->
                         

                            <option value="<?php echo $sentencia2['ID_PROFESOR']; ?>"><?php echo utf8_encode($sentencia2['ID_PROFESOR'] ); ?>

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


                        
                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Sala: </label > 
                         <select name="sala" class="form-control"  required id="_6">


                            <!-- Este option es el dato del profesor -->
                         

                            <option value="<?php echo $sentencia2['ID_SALA']; ?>"><?php echo utf8_encode($sentencia2['ID_SALA'] ); ?>
                                        <?php
                                        $sqlSala = "SELECT * FROM salas order by ID";
                                        $dataSala = mysqli_query($mysqli, $sqlSala);

                                        
                                        while($data = mysqli_fetch_array($dataSala)){ 
                                        ?>


                                        <!-- y este option las opciones -->
                                        <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode('ID: '. $data['ID']. ' - NUMERO: '. $data['NUMERO'] ); ?>
                                        <?php } ?>
                            </select>
                        </div>
                        
                        <div class="d-grid mt-5">
                         
                            <input type="hidden"  name="codigo" value="<?php echo $codigo;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
                            <input type="submit" class="btn btn-primary" value="Guardar cambios">
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






