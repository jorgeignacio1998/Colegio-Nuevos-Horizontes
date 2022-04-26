<?php  //seguridad de sesiones 
session_start(); //Paso 1 para utilizar sesiones
 require '../codigos/connect.php';
$usuario_logueado = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
   echo'
         <script> 
               alert("Tienes que iniciar sesión para entrar");
               window.location = "Login.php";
         </script>
   ';
   
   session_destroy();
   die();
}

//Programacion pintar usuarios
$datos_usuario = $mysqli->query("SELECT * FROM datos_usuarios");





?>





<!doctype html>
<html lang="en">
  <head>
    <title>Gestion de usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


<!-- Estilos-->

<style>
body{
        background: #7F7FD5;  
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }






</style>
</head>
<body>






 <!-- Inicio del Navbar -->

    
      <nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
         <div class="container-fluid">
               <a href="welcome.php" class="navbar-brand">Inicio</a>
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
                        <li> <a class="dropdown-item" href="perfil.php">Perfíl</a></li>
                        <li> <a class="dropdown-item" href="usuarios.php">Gestionar usuarios</a></li>
                        <li> <a class="dropdown-item" href="#">Opcion 3</a></li>
                        <li> <a class="dropdown-item" href="../codigos/logout.php">Cerrar sesión</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
         </div>
      </nav>
      
   
   <!-- Termino del Navbar  -->


   <div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div class="col-md-7">  <!-- Primer col 7  -->


                        <!-- El orden de las validaciones si importa  -->



                <!--  1. Primera validacion, campos no vacios para el registro -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                    <strong>Cambios realizados exitosamente</strong> xd.
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





                




                 <!-- 2.  alerta    registrado  success -->

                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambios realizados exitosamente</strong> xd.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                
                 <!-- 2. alerta    registrado  success -->





















               
               <div class="card">
                   <div class="card-header">
                       Lista de usuarios
                   </div>
                   <div class="p-4">
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre completo</th>
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Rut</th>
                                    <th scope="col">Numero teléfonico</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($datos_usuario) ) {
 

                                    
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $fila['ID']; ?></td>
                                    <td ><?php echo $fila['USERNAME']; ?></td>
                                    <td ><?php echo $fila['EMAIL']; ?></td>
                                    <td ><?php echo $fila['RUT']; ?></td>
                                    <td ><?php echo $fila['TELEFONO']; ?></td>
                                    <td class="text-success">      <a href="../vistas/editar.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td class="text-danger">              <i class="bi bi-trash"></i>  </td>
                                    
                                    
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
                   <form action="../codigos/c_usuarios.php" method="POST" class="p-4" >
                        <div class="mb-3">
                            <label for="_1" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="txtNombre" autofocus required id="_1">
                        </div>
                        <div class="mb-3">
                            <label for="_2" class="form-label">Correo electrónico: </label>
                            <input type="email" class="form-control" name="txtCorreo" autofocus required id="_2">
                        </div>
                        <div class="mb-3">
                            <label for="_3" class="form-label">Rut: </label>
                            <input type="text" class="form-control" name="txtRut" autofocus required id="_3">
                        </div>
                        <div class="mb-4">
                            <label for="_4" class="form-label">Numero teléfonico: </label>
                            <input type="text" class="form-control" name="txtTelefono"  id="_4" autofocus required >
                        </div>
                        <div class="d-grid">
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