<?php
include '../seguridad_director.php';
$id_eva = $_GET['id_eva'];
if(!isset($_GET['id_eva'])) {

    header('Location: ../index.php?mensaje=error');
    exit();
}
$grado = $_GET['grado'];
if(!isset($_GET['grado'])) {

    header('Location: ../index.php?mensaje=error2');
    exit();
}


$datos_evaluaciones = $mysqli->query("SELECT *,asignaturas.NOMBRE AS asignombre, evaluaciones.ID AS evaid, evaluaciones.NOMBRE AS evanom FROM evaluaciones INNER JOIN asignaturas ON evaluaciones.ID_ASIGNATURA = asignaturas.ID_A 
WHERE evaluaciones.ID = $id_eva "); 
$sen =mysqli_fetch_array($datos_evaluaciones);




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
    



<style>
 .moverabajo{
     
     margin-top: 5%;
 }

 
.col1{
    height:580px; overflow-y:scroll;
}
        

#close { position:absolute; left:10px; top:10px; right:10px; font-size: 30px; cursor: pointer; color: black; }



</style>


<!-- Inicio Gestor de asignaturas--  academico -->   
<div class="container-fluid moverabajo">
       <div class="row justify-content-center">
           <div class="col-md-4 col-sm-12 ">    <!-- INICIO SEGUNDO COL  -->


               
           <?php 
            include 'alertas.php';
            ?>

            
          
               <div class="card">
                 
                    <div class="card-header">
                        <a href="index.php?grado=<?php echo $grado?>"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a> 
                        <h3 id="_titulo">&nbsp; &nbsp; &nbsp; Editar Evaluación:</h3>  
                   </div>
                   <form action="c_editar.php" method="POST" class="p-4" >

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="2" class="form-label">Numero evaluacion </label>
                                <input type="text" class="form-control" name="numero" value="<?php  echo $sen['NUMERO'] ; ?>" autofocus required id="2">
                            </div> 
                            <div class="mb-3 col-6">
                                <label for="1" class="form-label">Nombre evaluación </label>
                                <input type="text" class="form-control" name="nombre" value="<?php  echo $sen['evanom'] ; ?>" autofocus required id="1">
                            </div>            
                        </div>


                    

                    <div class="row">
                        <div class="mb-3 col-6 ">
                                <label class="form-label lab" for="6">Nombre Asignatura:</label > 
                                <select name="asignatura" class="form-control"  required  id="6" >
                                  
                                       
                                        <?php
                                        $sqlAsi = "SELECT *,
                                        grados.NIVEL AS nivelgrado,
                                        asignaturas.ID_A AS asigid,
                                        asignaturas.NOMBRE AS asignombr
                                        FROM asignaturas INNER JOIN grados
                                        ON asignaturas.ID_GRADO = grados.ID
                                        WHERE asignaturas.ID_GRADO = $grado
                                        order by grados.ID ";
                                        $dataAsi = mysqli_query($mysqli, $sqlAsi);

                                        
                                        while($data = mysqli_fetch_array($dataAsi)){ 
                                            
                                            $selected=($sen['ID_A']==$data['asigid'])?'selected':false;  ?>

                                        <option <?=$selected;?> value="<?php echo $data["asigid"]; ?>"><?php echo utf8_encode($data['asignombr']); ?>
                                
                                        <?php } ?>
                                </select>  
                            </div> 
                            <div class="mb-3 col-6">
                                <label for="9" class="form-label">Fecha: </label>
                                <input class="form-control" type="date" name="fecha"  autofocus required id="9" >
                            </div>



                        </div> 








                        
                            <div class="mb-3 ">
                                <label for="4" class="form-label">Descripción</label>
                                <textarea class="form-control texta" name="descripcion"  id="4"><?php  echo $sen['DESCRIPCION']; ?></textarea   > 
                            </div>     
                        
        

                      

                        
                        <div class="d-grid mt-5">
                            <input type="hidden" name="id_eva" value="<?php echo $id_eva?>" >
                            <input type="hidden" name="grado" value="<?php echo $grado?>" >
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>

                   </form>

            
                 




               </div>
        


              
           </div>
       </div>
   </div>


</body>
</html>

