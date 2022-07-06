<?php
require '../seguridad_director.php';
$id_apoderado = $_GET['id_apoderado'];
if(!isset($_GET['id_apoderado'])) {

    header('Location: ../index.php?mensaje=error');
    exit();
}


//Pintando datos Del ID = GET
$inner = $mysqli->query("SELECT *, apoderados.ID AS idap FROM apoderados INNER JOIN matriculados ON apoderados.ID_MATRICULADO = matriculados.ID WHERE apoderados.ID LIKE $id_apoderado");
$sentencia =mysqli_fetch_array($inner);


?>







<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar sala</title>
    <link rel="stylesheet" type="text/css" href="../styles/navside.css?<?php echo time(); ?>" >  
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

    <!-- Inicio RUT VERIFICADOR con Jquery -->   
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


    <!-- Inicio RUT VERIFICADOR con Jquery -->   
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
       <div class="col-md-4">    <!-- INICIO SEGUNDO COL  -->
               <div class="card">
                 
                   <div class="card-header">
                       Registrar apoderado:
                   </div>
                   <form action="c_editar.php" method="POST" class="p-4" >

                            
                        <div class="mb-3">
                            <label for="1" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $sentencia['NOMBRE'];  ?>" autofocus required id="1">
                        </div>
                          
                        <div class="mb-3">
                            <label for="_rut" class="form-label">Rut: </label>
                            <input type="text" class="form-control" name="rut" value="<?php echo $sentencia['RUT'];  ?>" autofocus required id="_rut">
                        </div>

                        <div class="mb-3">
                            <label for="3" class="form-label">Email: </label>
                            <input type="text" class="form-control" name="email" value="<?php echo $sentencia['EMAIL'];  ?>" autofocus required id="3">
                        </div>

                        <div class="mb-3">
                            <label for="4" class="form-label">Telefono: </label>
                            <input type="text" class="form-control" name="telefono" value="<?php echo $sentencia['TELEFONO'];  ?>" autofocus required id="4">
                        </div>

                        <div class="mb-3">
                            <label for="5" class="form-label">Direccion: </label>
                            <input type="text" class="form-control" name="direccion" value="<?php echo $sentencia['DIRECCION'];  ?>" autofocus required id="5">
                        </div>

                        <div class="mb-3">
                            <label for="_rut1" class="form-label">Rut alumno: </label>
                            <input type="text" class="form-control" name="rutalumno" value="<?php echo $sentencia['RUT_ALUMNO'];  ?>" autofocus required id="_rut1">
                        </div>
                        

                        <div class="d-grid mt-5">
                            <input type="hidden"  name="idapod" value="<?php echo $id_apoderado;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
                            <input type="submit" class="btn btn-primary" value="Editar">
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

