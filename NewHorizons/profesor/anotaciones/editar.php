<?php
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.



$id_clase = $_GET["id_clase"];


$id_anotacion = $_GET["id_anotacion"];



$regexDescripcion = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9?¿!\.\s\-\,]+$/";


//Pintando datos Del ID = GET
$inner = $mysqli->query("SELECT * FROM anotaciones WHERE ID LIKE $id_anotacion");
$sentencia =mysqli_fetch_array($inner);


?>







<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
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
           <div class="col-md-3 col-sm-12 ">    <!-- INICIO SEGUNDO COL  -->
           
               <?php 
               include 'alertas.php';
               ?>

               <div class="card segundo">
                 
                   <div class="card-header">
                       Editar anotación:
                   </div>
                   <form action="c_editar.php" method="POST" class="p-4" >

                        <div class="mb-3">
                            <label for="1" class="form-label">FECHA: </label>
                            <input type="date" class="form-control" name="fecha" autofocus required id="1" value="<?php echo $sentencia['FECHA'];  ?>">
                        </div>     
                        
                        <div class="mb-3 ">
                                <label for="4" class="form-label">Descripción</label>
                                <textarea class="form-control texta" name="descripcion"    id="4"><?php  echo $sentencia['ANOTACION']; ?></textarea   > 
                        </div>    
                        
                        <div class="d-grid mt-5">
                            <input type="hidden"  name="id_clase" value="<?php echo $id_clase;  ?>">  <!-- Enviando el ID -->
                            <input type="hidden"  name="id_anotacion" value="<?php echo $id_anotacion;  ?>">  <!-- Enviando el ID -->
                          
                         
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

