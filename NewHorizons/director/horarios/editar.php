<?php
include '../seguridad_director.php';




$id_clase = $_GET['id_clase'];
$id_horario = $_GET['id_horario'];


//INYECCIONSQL 
$datita = $mysqli->query("SELECT *, dias.ID as diasid  FROM dias INNER JOIN horarios_clases ON horarios_clases.ID_DIA = dias.ID  WHERE horarios_clases.ID  LIKE '{$id_horario}' ");
$sen =mysqli_fetch_array($datita);
//INYECCIONSQL




//INYECCIONSQL 
$datita2 = $mysqli->query("SELECT * FROM horarios_clases   WHERE ID  LIKE '{$id_horario}' ");
$LosDatos =mysqli_fetch_array($datita2);
//INYECCIONSQL


?>







<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando horarios</title>
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
           <div class="col-md-3 col-sm-12 ">    <!-- INICIO SEGUNDO COL  -->


               
           <?php 
            include 'alertas.php';
            ?>

            
          

               <div class="card">
                 
                   <div class="card-header">
                       Ingresar datos:
                   </div>
                   <form action="c_editar.php" method="POST" class="p-4" >


                   <div class="mb-3 ">
                             <label class="form-label lab" for="_6">Día:</label > 
                                <select name="id_dia" class="form-control"  required  id="_6" >
                                  
                                       
                                        <?php
                                        $sqlAsi = "SELECT * FROM dias ";
                                        $dataAsi = mysqli_query($mysqli, $sqlAsi);

                                        
                                        while($data = mysqli_fetch_array($dataAsi)){ 
                                            
                                            $selected=($sen['diasid']==$data['ID'])?'selected':false;  ?>

                                        <option <?=$selected;?> value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NOMBRE_DIA']); ?>
                                
                                        <?php } ?>
                                </select>  
                            </div> 
                        
                      

                        <div class="mb-3">
                            
                            <p>Hora registrada anteriormente: <?php echo $LosDatos['HORA_INICIO'] ; ?></p>
                            <label for="_2" class="form-label">Hora inicio: </label>
                            <input type="time" class="form-control" name="inicio"  autofocus required id="_2">
                        </div>
                        <div class="mb-3">
                         
                            <p>Hora registrada anteriormente: <?php echo $LosDatos['HORA_TERMINO'] ; ?></p>
                            <label for="_3" class="form-label">Hora Termino: </label>
                            <input type="time" class="form-control" name="termino" autofocus required id="_3">
                        </div>

                        <div class="d-grid mt-5">
                            <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>" >
                            <input type="hidden" name="id_horario" value="<?php echo $id_horario; ?>" >

                            <input type="submit" class="btn btn-primary" value="Guardar cambios">
                        </div>

                   </form>

               </div>
               <br>
           </div>
        


              
      
       </div>
   </div>


</body>
</html>

