<?php
include '../seguridad_director.php';
$id_alumno = $_GET['id_alumno'];
if(!isset($_GET['id_alumno'])) {

    header('Location: ../index.php?mensaje=error');
    exit();
}



$inner = $mysqli->query("SELECT *,
alumnos.ID AS idalumno,
cursos.NOMBRE AS nombrecur,
grados.ID AS gradoid

FROM  alumnos
INNER JOIN cursos
ON cursos.ID = alumnos.ID_CURSO
INNER JOIN grados
ON cursos.ID_GRADO = grados.ID

 WHERE alumnos.ID = $id_alumno
 ");


$sen =mysqli_fetch_array($inner);


$grado_id = $sen['gradoid']; 



// $id_grado = $mysqli->query("SELECT * FROM usuarios WHERE EMAIL LIKE '{$email}' ");
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


               <div class="card segundo">
                 
                    <div class="card-header">
                        <a href="index.php"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a> 
                        <h3 id="_titulo">&nbsp; &nbsp; &nbsp; Editar Asignación:</h3>  
                   </div>
                   <form action="c_editar.php" method="POST" class="p-4" >

                
                        
                   <div class="mb-3">
                            <label class="form-label lab" for="_6">Curso</label > 
                            <select name="curso" class="form-control"  required  id="_6" >
                                <option disabled selected value >  </option>
                                    <?php
                                    $sqlTipo = "SELECT *,
                                    cursos.ID as curid,
                                    cursos.NOMBRE as curnom,
                                    grados.NIVEL as graniv
                                    FROM cursos 
                                    INNER JOIN grados 
                                    ON cursos.ID_GRADO  = grados.ID
                                    WHERE grados.ID = $grado_id ";
                                    $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                <option value="<?php echo $data["curid"]; ?>"><?php echo utf8_encode($data['graniv'] . ' ' .$data['curnom'] ); ?>

                                    <?php } ?>
                            </select>  
                        </div>  



                      
                                

                        
                        <div class="d-grid mt-5">
                            <input type="hidden"  name="id_alumno" value="<?php echo $id_alumno;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
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

