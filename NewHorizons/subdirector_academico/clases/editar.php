<?php
include '../seguridad_subdirector.php';
$id_clase = $_GET['id_clase'];
if(!isset($_GET['id_clase'])) {

    header('Location: index.php?mensaje=error');
    exit();
}
//INYECCION FETCH ARRAY
    $datos_clases = $mysqli->query("SELECT *, grados.ID AS gradoid, clases.NOMBRE AS nombreclass, cursos.ID AS cursid,
    cursos.LEEIBLE AS leeible, profesores.NOMBRE AS profenom
    FROM clases INNER JOIN cursos ON clases.ID_CURSO = cursos.ID INNER JOIN grados ON cursos.ID_GRADO = grados.ID
    INNER JOIN profesores ON profesores.ID = clases.ID_PROFESOR

    WHERE clases.ID = $id_clase "); 
    $sen =mysqli_fetch_array($datos_clases);

    $id_grado = $sen['gradoid'];
  
//INYECCION FETCH ARRAY 

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
        


</style>



<!-- Funciion para obtener el ID seleccionado por el cliente -->
<script>
    $(document).ready(function() {
        $("#id_curso").change(function() {
    //    alert($('#id_curso').val());
    // var selectedVal = $("#myselect option:selected").text();
    var selectedVal = $("#id_curso option:selected").val();
                              

    // Enviar el id por get
                         

        // var selectedVal = $("#myselect option:selected").text();
                                
        //   alert($('#id_curso').val());
        //   alert(selectedVal);
        // Enviar el id por get                            
        //alert(input);   
        $.ajax({
                                            
                url:"4.php",
                method: "POST",
                data: {variable:selectedVal},

                success:function(data){
                    $("#divasig").html(data);
                    $("#divasig").css("display","block");
                }
            });
        // Enviar el id por get
        });
                                    
                                    

                               
    });
  </script>
<!-- Funciion para obtener el ID seleccionado por el cliente -->


<!-- Inicio Gestor de asignaturas--  academico -->   
<div class="container-fluid moverabajo">
       <div class="row justify-content-center">
          

       <div class="col-4  ">    <!-- INICIO SEGUNDO COL  -->
               <div class="card segundo">
                 
                   <div class="card-header">
                       Registrar Clase:
                   </div>
                   <form action="c_editar.php" method="POST" class="p-4" >
                        

                   <div class="mb-3">
                        <label for="_1" class="form-label">Nombre de la Clase: </label>
                        <input type="text" class="form-control" name="nombre" autofocus required id="_1" value="<?php echo $sen['nombreclass'];  ?>">
                    </div> 



                            <div class="mb-3 ">
                                <label class="form-label lab" for="id_curso">Curso:</label > 
                                <select name="curso" class="form-control"  required  id="id_curso" >
                                  
                                       
                                        <?php
                                        $sqlAsi = "SELECT * FROM cursos ";
                                        $dataAsi = mysqli_query($mysqli, $sqlAsi);

                                        
                                        while($data = mysqli_fetch_array($dataAsi)){ 
                                            
                                            $selected=($sen['cursid']==$data['ID'])?'selected':false;  ?>

                                        <option <?=$selected;?> value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['LEEIBLE']); ?>
                                
                                        <?php } ?>
                                </select>  
                            </div> 




                            <div class="mb-3 "  id="divasig">
                                <label class="form-label lab" for="12">Nombre Asignatura:</label > 
                                <select name="asignatura" class="form-control" id="12"  required  >
                                  
                                       
                                        <?php
                                        $sqlAsi = "SELECT * FROM asignaturas  
                                        WHERE ID_GRADO LIKE $id_grado";
                                        $dataAsi = mysqli_query($mysqli, $sqlAsi);

                                        
                                        while($data = mysqli_fetch_array($dataAsi)){ 
                                            
                                            $selected=($sen['ID_ASIGNATURA']==$data['ID_A'])?'selected':false;  ?>

                                        <option <?=$selected;?> value="<?php echo $data["ID_A"]; ?>"><?php echo utf8_encode($data['NOMBRE']); ?>
                                
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
                                        $selected=($sen['profenom']==$data['NOMBRE'])?'selected':false;  ?>
                                        
                                        
                                        <option <?=$selected;?> value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NOMBRE'] ); ?>
                                       
                                        <?php } ?>

                           </select>
                        </div>
                        





                        <div class="d-grid mt-5">
                            <?php 
                            //INYECCIONSQL
                                $datita = $mysqli->query("SELECT * FROM  periodos WHERE ESTADO LIKE 'VIGENTE' ");
                                $sentencia2 =mysqli_fetch_array($datita);
                                $id_periodo = $sentencia2['ID'];
                            //INYECCIONSQL
                            ?>
                            <input type="hidden"  name="id_clase" value="<?php echo $id_clase;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->               
                            <input type="hidden"  name="periodo" value="<?php echo $id_periodo;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
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




