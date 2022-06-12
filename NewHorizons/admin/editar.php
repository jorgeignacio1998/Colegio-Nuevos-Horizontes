<?php
include '../codes/seguridadAdmin.php';
$codigo = $_GET['codigo'];
if(!isset($_GET['codigo'])) {

    header('Location: ../index.php?mensaje=error');
    exit();
}


//Pintando datos Del ID = GET
$query = "SELECT NOMBRE, EMAIL, TELEFONO, RUT, CONTRASENA, NIVEL FROM usuarios  WHERE ID = $codigo ";
$sentencia1 = $mysqli->query($query);
//print_r($sentencia1);  no entrega nada importante la sentencia es importante para la segunda.
$sentencia2 =mysqli_fetch_array($sentencia1);
//print_r($sentencia2);   //TIENE LOS DATOS ahora se pintan en lo value.
?>















<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/s1.css?<?php echo time(); ?>" >    <!-- Bootstrap CSS v5.0.2 -->


    <!-- Estos dos son para el rut verificador -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../codes/jquery.rut.js"></script>  
    <!-- Estos dos son para el rut verificador -->



    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body{
        background: #7F7FD5;  
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    #close { position:absolute; left:10px; top:10px; right:10px; font-size: 30px; cursor: pointer; }





</style>
</head>
<body>


      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



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

                


        <br><br><br>
        <div class="container mt-5">
            <div class="row justify-content-center ">
                <div class="col-md-4">




                    <!-- 7  alerta FORTMATO ERROR .  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato3') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El formato del Rut es invalido.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- 7  alerta FORTMATO ERROR   -->


                    <!-- 10  alertaERROR 10 rut duplicado .  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error10') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El rut ingresado ya esta en uso.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- 10  alerta ERROR 10 rut duplicado .  -->




                    <!-- 11  CORRREO duplicado .  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'correo_clonado') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El Correo electronico ingresado ya esta en uso.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                    <!-- 11 CORREO duplicado .  -->



                    <!-- 7  alerta FORTMATO ERROR .  -->
                  <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato2') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR</strong> El formato del email es invalido.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 7  alerta FORTMATO ERROR   -->



















                    <div class="card">
                        <div class="card-header">
                            <a href="gestionarUsuarios.php"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a> 
                            <h3 id="_titulo">Editar datos</h3>
                        </div>
                        <form action="c_editar.php" method="POST" class="p-4" >

                            <div class="mb-3">
                                <label for="_1" class="form-label">Nombre completo: </label>
                                <input type="text" class="form-control" name="txtNombre" autofocus required id="_1" value="<?php echo $sentencia2['NOMBRE'];  ?>">
                            </div>

                            <div class="mb-3">
                                    <label for="_rut" class="form-label">Rut: </label>
                                    <input  label="_rut" class="form-control" type="text" name="rut"  autofocus required id="_rut" >
                            </div>

                        
                            <div class="mb-3">
                                <label for="_2" class="form-label">Correo electrónico: </label>
                                <input type="email" class="form-control" name="txtCorreo" autofocus required id="_2" value="<?php echo $sentencia2['EMAIL'];  ?>" >
                            </div>
                            <div class="mb-3">
                                <label for="_5" class="form-label">Contraseña: </label>
                                <input type="password" class="form-control" name="txtPass" autofocus required id="_5" value="<?php echo $sentencia2['CONTRASENA'];  ?>" >
                            </div>
                    
                            <div class="mb-5">
                                    <label class="form-label lab" for="_6">Nivel</label > 
                                        <?php  $opciones = array('1','2','3','4','5','6','7','8','9','10','11','12' );
                                            $seleccionado = $sentencia2['NIVEL'];
                                                                
                                        echo'
                                        <select class="form-select" aria-label="Disabled select example"  name="txtNivel"  id="_6">';
                                                            
                                        foreach($opciones as $opcion){
                                                                
                                            if($seleccionado == $opcion){
                                            echo "<option selected='$seleccionado'           value='$opcion'>$opcion</option>";
                                            }else{
                                            echo "<option        value='$opcion'>$opcion</option>";
                                            }
                                        }
                                        echo"</select>"
                                        ?>


                            </div>



                            <div class="form-group row justify-content-center d-grid ">
                                <div class="col-sm-6 ">
                                    <input type="hidden"  name="codigo" value="<?php echo $codigo;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
                                    <input type="submit" class="btn btn-primary" value="Guardar cambios">
                                </div>
                                
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</body>
</html>