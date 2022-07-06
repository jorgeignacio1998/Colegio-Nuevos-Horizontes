<?php
require '../seguridad_subdirector.php';

if(!isset($_GET['id_profesor'])) {
    echo "<script>location.href='index.php?mensaje=error3';</script>";
    exit();
}

$id_profesor = $_GET['id_profesor'];
        

?>







<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>

    <!-- icono return -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- icono return -->
    
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
                
                $query = "SELECT * FROM profesores  WHERE ID = $id_profesor ";
                $sentencia1 = $mysqli->query($query);
                $sentencia2 =mysqli_fetch_array($sentencia1);

                
                include 'alertas_profesor.php';
              
                
                ?>



                <div class="card">
                    <div>
                        <a href="index.php"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a> 
                    </div>
                   
                    <div class="card-header">     
                        <h3>  &nbsp;  &nbsp; Editar Profesor</h3>
                    </div>

                        <form action="c_editar_profesor.php" method="POST" class="p-4" >

                            <div class="mb-3">
                                <label for="_2" class="form-label">Nombre: </label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $sentencia2['NOMBRE'];  ?>"   autofocus required id="_2">
                            </div>

                            <div class="mb-3">
                                <label for="_rut" class="form-label">Rut: </label>
                                <input  label="_rut" class="form-control" type="text" name="rut"  value="<?php echo $sentencia2['RUT'];  ?>"  autofocus required id="_rut" >
                            </div>
                            
                            <div class="d-grid mt-5">
                                <input type="hidden"  name="id_profesor" value="<?php echo $id_profesor;  ?>">  <!-- Enviando el ID por POST con un input invisible. -->
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
