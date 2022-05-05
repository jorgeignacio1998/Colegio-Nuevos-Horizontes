<?php
require '../codes/seguridadAdmin.php'; //Session y Nivel == 1
$datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE NIVEL != 1"); //obtiene datos de todos los usuarios MENOS los tipos de usuario Nivel 1 (servirá para pintar los datos en la tabla (250 fila))
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
    
    <style>
        #col1{
            Height:700px; overflow-y:scroll;
        }
    </style>





</head>










<body>

<!-- Inicio del Navbar admin -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

<nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
    <div class="container-fluid">
        <a href="welcome.php" class="navbar-brand">Admin</a>
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





<!-- Inicio Gestor de usuarios--  admin -->   


<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-7">  <!-- Primer col 7  -->




                <!--  1. Primera validacion, campos no vacios para el registro -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Los campos no pueden ir vacios.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> <!--  1. termino  CAMPOS VACIOS -->







                
                <!-- 2.  alerta    registrado  success -->

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
                
                 <!-- 2. alerta    registrado  success -->

               








                 <!--  alerta ERROR, seguridad.  -->
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
                 <!--  alerta ERROR  -->








                 <!-- 2.  alerta    editado  success -->

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
                
                 <!-- 2. alerta    registrado  success -->







                <!-- 2.  alerta    eliminado  success -->

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
                
                 <!-- 2. alerta    eliminado  success -->

















               
               <div  class="card ">
                   <div class="card-header">
                       Lista de usuarios
                   </div>
                   <div  id="col1" class="p-4 ">
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre completo</th>                              
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Contraseña</th>
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
                                    <td ><?php echo $fila['CONTRASENA']; ?></td>
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
                            <label class="form-label lab" for="_6">Nivel</label > 
                                <?php  $opciones = array('1','2','3','4','5');
                                                        
                                echo'
                                <select class="form-select" aria-label="Disabled select example"  name="txtNivel"  id="_6">';
                                                     
                                foreach($opciones as $opcion){
                                                          
                                                        
                                    echo "<option value='$opcion'>$opcion</option>";
                                                         
                                }
                                echo"</select>"
                                ?>
                        </div>
                        
                        <div class="d-grid mt-5">
                            <input type="hidden" name="oculto" value="1" >
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>

                   </form>
               </div>
           </div>
       </div>
   </div>





























      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>





</body>
</html>