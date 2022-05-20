<?php
require '../codes/seguridadAdmin.php'; //Session y Nivel == 1 y bd
$datos_usuario = $mysqli->query("SELECT * FROM usuarios"); //obtiene datos de todos los usuarios MENOS los tipos de usuario Nivel 1 (servirá para pintar los datos en la tabla (250 fila))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/s1.css?<?php echo time(); ?>" >  <!-- CSS -->
    <title>Gestionar usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
    
    
    
    <style>
        .col1{
            Height:650px; overflow-y:scroll;
        }


     








    </style>
</head>
<body>











<!-- scripts para boostrap y popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

<!-- Inicio del Navbar admin -->
<nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
        <div class="container-fluid ">
              <a href="bienvenido.php" class="navbar-brand">Admin</a>
              <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNav" >
                 <span class="navbar-toggler-icon"></span>
              </button>
              
              <div id="MenuNav" class="collapse navbar-collapse d-flex flex-row-reverse">
                 <ul class="navbar-nav" ms-3>
                    <!--  <li class="nav-item"> <a class="nav-link" href="perfil.php">Perfíl</a></li> -->
                    
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                          Opciones de soporte
                       </a>
                       <ul class="dropdown-menu">
                       <li> <a class="dropdown-item" href="../admin/gestionarUsuarios.php">Gestionar usuarios</a></li>
                       <li> <a class="dropdown-item" href="#">Opcion 2</a></li>
                       <li> <a class="dropdown-item" href="#">Opcion 3</a></li>
                       
                       <li> <a class="dropdown-item" href="../codes/logout.php">Cerrar sesión</a></li>
                       </ul>
                    </li>
                 </ul>
              </div>
        </div>
     </nav>
<!-- Termino del Navbar  admin -->   





<!-- Inicio BUSQUEDA con Jquery -->   
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){

            var input = $(this).val();
            //alert(input);   

                $.ajax({

                    url:"liveSearch.php",
                    method: "POST",
                    data: {input:input},

                    success:function(data){
                        $("#searchResult").html(data);
                        $("#searchResult").css("display","block");
                    }

                });
         
        });

    });
</script>
<!-- Termino BUSQUEDA con Jquery -->   







<!-- Inicio Gestor de usuarios--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-7">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->










                <!--  1. Primera ALERTA, campos no vacios para el registro -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Los campos no pueden ir vacios.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!--  1. termino  CAMPOS VACIOS -->

                
                <!-- 2.  alerta  registrado  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>registro realizado exitosamente</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                 <!-- 2. alerta registrado  success -->


                 <!-- 3 alerta ERROR, seguridad.  -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 3 alerta ERROR  -->

                <!-- 4.  alerta    editado  success -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambios realizados exitosamente</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 4. alerta    registrado  success -->

                <!-- 5.  alerta    eliminado  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Se han eliminado los datos correctamente </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 5. alerta    eliminado  success, TERMINO DE TODAS LAS ALERTAS-->



                 <!-- 6  alerta FORTMATO ERROR .  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato1') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>FORMATO INCORRECTO</strong> El nombre no puede tener numeros o simbolos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 6  alerta FORTMATO ERROR   -->

                
                 <!-- 7  alerta FORTMATO ERROR .  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato2') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>FORMATO INCORRECTO</strong> No se realizaron cambios.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 7  alerta FORTMATO ERROR   -->


                 
                 <!-- 9  alerta CORREO OCUPADO ERROR 9 .  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error9') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR</strong> El correo ingresado ya esta en uso.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!--  9  alerta CORREO OCUPADO ERROR 9    -->












                <!-- siguiendo con la estructura de la tabla (primer col) -->
               <div  class="card ">
                   <div class="card-header">
                       Lista de usuarios                                     
                       <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                   </div>

                   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre completo</th>                              
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($datos_usuario) ) {

                                    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['ID']; ?></td>
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                                    <td ><?php echo $fila['EMAIL']; ?></td>
                                    <td ><?php echo $fila['NIVEL']; ?></td>

                                    <td><a class="text-primary" href="editar.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a este usuario?')" class="text-danger" href="c_eliminar.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
                                    <!-- le envia por la url el id del usuario al c_eliminar -->
                                    
                                </tr>
                                <?php
                                }
                                ?>
                               
                            </tbody>
                       </table>
                   </div>
               </div>
               <br>  <br>
           </div> <!-- TERMINO PRIMER COL  --> 















           

           <div class="col-md-4">    <!-- INICIO SEGUNDO COL  -->
               <div class="card">
                 
                   <div class="card-header">
                       Ingresar datos:
                   </div>
                   <form action="../admin/c_registrar.php" method="POST" class="p-4" >
                        <div class="mb-3">
                            <label for="_1" class="form-label">Nombre completo: </label>
                            <input type="text" class="form-control" name="txtNombre" autofocus required id="_1">
                        </div>             
                        <div class="mb-3">
                            <label for="_2" class="form-label">Correo electrónico: </label>
                            <input type="email" class="form-control" name="txtCorreo" autofocus required id="_2">
                        </div>
                        <div class="mb-3">
                            <label for="_5" class="form-label">Contraseña: </label>
                            <input type="password" class="form-control" name="txtPass" autofocus required id="_5">
                        </div>
                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Tipo de usuario</label > 
                                        <select name="txtNivel" class="form-control"  required  id="_6" >
                                        <option disabled selected value >  </option>
                                                    <?php
                                                    $sqlTipo = "SELECT * FROM niveles order by ID";
                                                    $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['ID']. '- '. $data['NOMBRE']); ?>

                                                    <?php } ?>
                                        </select>  
                        </div>
                        
                        <div class="d-grid mt-5">
                            <input type="hidden" name="oculto" value="1" >
                            <input type="submit" class="btn btn-primary" value="Registrar">
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