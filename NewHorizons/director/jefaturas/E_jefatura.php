<?php
include '../seguridad_director.php';
$id_jefatura = $_GET['id_jefatura'];
if(!isset($_GET['id_jefatura'])) {

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
    <title>Editar jefatura</title>
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
                       Editar Jefatura:
                   </div>





                    <?php 
                    $inner = $mysqli->query("SELECT *,
                                
                    cursos.NOMBRE as curnom,
                    grados.NIVEL as graniv,
                    profesores.NOMBRE as pronom,
                    cursos.ID as curid,
                    jefaturas.ID_PROFESOR as profid

                    FROM jefaturas
                    INNER JOIN cursos                 
                    ON jefaturas.ID_CURSO = cursos.ID
                    INNER JOIN profesores
                    ON jefaturas.ID_PROFESOR = profesores.ID
                    INNER JOIN grados                 
                    ON cursos.ID_GRADO = grados.ID
                    
                    WHERE ID_JEFATURA = $id_jefatura
                    ");

                    $sentencia =mysqli_fetch_array($inner);
                    ?>






                   <form action="c_editar_jefatura.php" method="POST" class="p-4" >


                        
                      

                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Curso</label > 
                            <select name="id_curso" class="form-control"  required  id="_6" >
                    
                            
                                    <?php
                                    $sql = "SELECT *,
                                    cursos.ID as curid,
                                    cursos.NOMBRE as curnom,
                                    grados.NIVEL as graniv
                                    FROM cursos 
                                    INNER JOIN grados 
                                    ON cursos.ID_GRADO  = grados.ID";
                                    $dataCurso = mysqli_query($mysqli, $sql);
                            
                                    while($data = mysqli_fetch_array($dataCurso)){ 
                                    $selected=($sentencia['curnom']==$data['curnom'] )?'selected':false;    
                                    ?>
                               
                                <option <?=$selected;?> value="<?php echo $data["curid"]; ?>"><?php echo utf8_encode($data['graniv'] . ' ' . $data['curnom']); ?>
                                    <?php } ?>
                            </select>  
                        </div>  





                        <div class="mb-3">
                            <label for="_2" class="form-label">Profesor: </label>
                            <select name="id_profesor" class="form-control"  required id="_2">
                         
                                        <?php
                                        $sqlProfe = "SELECT * FROM profesores order by ID";
                                        $dataProfe = mysqli_query($mysqli, $sqlProfe);

                                        while($data = mysqli_fetch_array($dataProfe)){ 
                                        $selected=($sentencia['profid']==$data['ID'] )?'selected':false;        
                                        ?>
                                        
                                        <option <?=$selected;?> value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NOMBRE'] ); ?>
                                       
                                        <?php } ?>

                           </select>
                        </div>




                        
                        




                      
                        <div class="d-grid mt-5">
                            <input type="hidden"  name="id_jefatura" value="<?php echo $id_jefatura;  ?>">  <!-- Enviando el ID por POST -->
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
