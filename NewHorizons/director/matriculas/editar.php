<?php
include '../seguridad_director.php';
$id_matricula = $_GET['codigo'];
if(!isset($_GET['codigo'])) {

    header('Location: ../index.php?mensaje=error');
    exit();
}


        

?>







<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matricula</title>
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
           <div class="col-md-4 col-sm-12 ">    <!-- INICIO SEGUNDO COL  -->
           
               <?php 
               include 'alertas.php';
               ?>

               <div class="card segundo">
                 
                   <div class="card-header">
                       Editar Matriculas:
                   </div>





                    <?php 
                    $inner = $mysqli->query("SELECT *, 
                    matriculas.ID as matrid,
                    grados.ID as gradid,
                    grados.NIVEL as graniv,
                    periodos.SEMESTRE as perise,
                    periodos.ANO as periano,
                    periodos.ID as perid
                    FROM matriculas
                    INNER JOIN grados
                    ON matriculas.ID_GRADO = grados.ID
                    INNER JOIN periodos
                    ON matriculas.ID_PERIODO = periodos.ID
                    
                    
                    WHERE matriculas.ID = $id_matricula
                    ");

                    $sentencia =mysqli_fetch_array($inner);
                    ?>

                    <form action="c_editar.php" method="POST" class="p-4" >

                        <div class="row">

                        <div class="mb-3 col-6">
                                <label class="form-label lab" for="6">Grado:</label > 
                                <select name="grado" class="form-control"  required  id="6" >
                                  
                                        <?php
                                        $sqlTipo = "SELECT * FROM grados order by ID";
                                        $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                        while($data = mysqli_fetch_array($dataNivel)){ 
                                            $selected=($sentencia['gradid']==$data['ID'])?'selected':false;  ?>

                                        <option <?=$selected;?> value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NIVEL']); ?>
                                
                                        <?php } ?>
                                </select>  
                            </div>   
                      
                            <div class="mb-3 col-6">
                                <label class="form-label lab" for="2">Periodo:</label > 
                                <select name="id_periodo" class="form-control"  required  id="2" >
                                  
                                        <?php
                                        $sqlPeriodo = "SELECT * FROM periodos order by ID";
                                        $dataPeriodo = mysqli_query($mysqli, $sqlPeriodo);
                                        
                                        while($data = mysqli_fetch_array($dataPeriodo)){ 
                                            $selected=($sentencia['perid']==$data['ID'])?'selected':false;  ?>

                                        <option <?=$selected;?> value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['SEMESTRE']  . ' SEMESTRE DEL ' . $data['ANO']); ?>
                                
                                        <?php } ?>
                                </select>  
                            </div>  
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="3" class="form-label">Cupos: </label>
                                <input class="form-control" type="text" name="cupos"  value="<?php echo $sentencia['CUPOS']; ?>"  autofocus required id="3" >
                            </div>

                            <div class="mb-3 col-6">
                                <label for="4" class="form-label">Precio Matricula: </label>
                                <input class="form-control" type="text" name="precio_matricula" value="<?php echo $sentencia['PRECIO_MATRICULA']; ?>" autofocus required id="4" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="5" class="form-label">Fecha inicio: </label>
                                <input class="form-control" type="date" name="f_inicio" value="<?php echo $sentencia['FECHA_INICIO']; ?>" autofocus required id="5" >
                            </div>

                            <div class="mb-3 col-6">
                                <label for="6" class="form-label">Fecha Final: </label>
                                <input class="form-control" type="date" name="f_final"  value="<?php echo $sentencia['FECHA_FINAL']; ?>" autofocus required id="6" >
                            </div>
                        </div>



                        <div class="d-grid mt-5">
                            <input type="hidden"  name="id_matricula" value="<?php echo $id_matricula;  ?>">  <!-- Enviando el ID por POST -->
                            <input type="submit" class="btn btn-primary" value="Realizar cambios ">
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
