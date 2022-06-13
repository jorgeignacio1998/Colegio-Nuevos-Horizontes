<?php
include '../seguridad_director.php';
$id_matriculado = $_GET['id_matriculado'];
if(!isset($_GET['id_matriculado'])) {

    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}




$datos_matriculados = $mysqli->query("SELECT *,
grados.NIVEL as graniv,
periodos.ANO as periano,
periodos.SEMESTRE as perise,
matriculados.ID as matrid,
apoderados.NOMBRE as aponom,
apoderados.RUT as aporut,
apoderados.EMAIL as apomail
FROM matriculados 
INNER JOIN grados 
ON matriculados.ID_GRADO = grados.ID
INNER JOIN periodos
ON matriculados.ID_PERIODO = periodos.ID
INNER JOIN apoderados
ON matriculados.ID = apoderados.ID_MATRICULADO
WHERE matriculados.ID LIKE $id_matriculado"); 
$sen =mysqli_fetch_array($datos_matriculados);

?>







<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar alumnos</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
    
    <!-- Estos dos son para el rut verificador -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="../../codes/jquery.rut.js"></script>  
    <!-- Estos dos son para el rut verificador -->


</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    


        <!-- Inicio RUT VERIFICADOR con Jquery (alumno)  -->   
            <script>
                $(function() {
                    $("#_rut").rut().on('rutValido', function(e, rut, dv) {
                    $('#_rut').attr('style','border-color:green');
                    $('#_boton').removeClass('estilo_deshabilitado').removeAttr('disabled')
                    });

                    $("#_rut").rut().on('rutInvalido', function(e) {
                    $('#_rut').val('').attr('style','border-color:red');
                    $('#_boton').addClass('estilo_deshabilitado').attr('disabled','disabled')
                    }); 

                    $('#_boton').click(function(){ 


                    })
                })
            </script>

                <style>
                    .estilo_deshabilitado { background:#aaa!important; }
                </style>

        <!-- Termino RUT VERIFICADOR con Jquery -->  

        <!-- Inicio RUT VERIFICADOR con Jquery (apoderado)  -->   
            <script>
                $(function() {
                    $("#_rut1").rut().on('rutValido', function(e, rut, dv) {
                    $('#_rut1').attr('style','border-color:green');
                    $('#_boton').removeClass('estilo_deshabilitado').removeAttr('disabled')
                    });

                    $("#_rut1").rut().on('rutInvalido', function(e) {
                    $('#_rut1').val('').attr('style','border-color:red');
                    $('#_boton').addClass('estilo_deshabilitado').attr('disabled','disabled')
                    }); 

                    $('#_boton').click(function(){ 


                    })
                })
            </script>

            <style>
                .estilo_deshabilitado { background:#aaa!important; }
            </style>

        <!-- Termino RUT VERIFICADOR con Jquery -->  

    
    
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
           <div class="col-md-4 col-sm-12 ">   

           <?php  
           include 'alertas.php';
           ?>


               <div class="card segundo">
                 
                   <div class="card-header">
                        <a href="index.php"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a> 
                        <h3 id="_titulo">&nbsp; &nbsp; &nbsp; Editar matriculado:</h3>  
                   </div>

                   <form action="c_editar.php" method="POST" class="p-4" >

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="1" class="form-label">Primer Nombre del Alumno:  </label>
                                <input type="text" class="form-control" name="nombre1" value="<?php echo $sen['NOMBRE1_ALUMNO']; ?>" autofocus required id="1">
                            </div>   
                            <div class="mb-3 col-6">
                                <label for="2" class="form-label">Segundo Nombre del Alumno: </label>
                                <input type="text" class="form-control" name="nombre2" value="<?php echo $sen['NOMBRE2_ALUMNO']; ?>" autofocus required id="2">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="3" class="form-label">Apellido Paterno del Alumno: </label>
                                <input type="text" class="form-control" name="apellido1" value="<?php echo $sen['APELLIDO1_ALUMNO']; ?>" autofocus required id="3">
                            </div>   
                            <div class="mb-3 col-6">
                                <label for="4" class="form-label">Apellido Materno del Alumno: </label>
                                <input type="text" class="form-control" name="apellido2" value="<?php echo $sen['APELLIDO2_ALUMNO']; ?>"  autofocus required id="4">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="_rut" class="form-label">Rut del Alumno: </label>
                                <input  label="_rut" class="form-control" type="text" name="rut_alumno" value="<?php echo $sen['RUT_ALUMNO']; ?>"  autofocus required id="_rut" >
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label lab" for="6">Grado:</label > 
                                <select name="grado" class="form-control"  required  id="6" >
                                  
                                        <?php
                                        $sqlTipo = "SELECT * FROM grados order by ID";
                                        $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                        while($data = mysqli_fetch_array($dataNivel)){ 
                                            $selected=($sen['gradid']==$data['ID'])?'selected':false;  ?>

                                        <option <?=$selected;?> value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NIVEL']); ?>
                                
                                        <?php } ?>
                                </select>  
                            </div> 
                        </div>
                        
                       
                        <div class="mb-3">
                            <label for="7" class="form-label">Nombre Completo del Apoderado: </label>
                            <input type="text" class="form-control" name="nombre_apoderado"  value="<?php echo $sen['aponom']; ?>"  autofocus required id="7" >
                        </div> 
                        <div class="row">
                            <div class="mb-3 col-6 ">
                                <label for="_rut1" class="form-label">Rut del Apoderado: </label>
                                <input  label="_rut" class="form-control" type="text" name="rut_apoderado"   value="<?php echo $sen['aporut']; ?>"  autofocus required id="_rut1" >
                            </div>
                            <div class="mb-3 col-6 ">
                                <label for="9" class="form-label">Email del Apoderado: </label>
                                <input class="form-control" type="email" name="email" value="<?php echo $sen['apomail']; ?>"  autofocus required id="9" >
                            </div>
                        </div>
                        


                        <div class="d-grid mt-5">
                            
                            <input type="hidden" name="id_matriculado" value="<?php echo $id_matriculado?>">
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