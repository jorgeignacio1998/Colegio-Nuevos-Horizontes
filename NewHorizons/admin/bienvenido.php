<?php   
require '../codes/seguridadAdmin.php'; //BD, SESSION Y NIVEL==1

$datos_usuarios = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$datos = mysqli_fetch_array($datos_usuarios, MYSQLI_ASSOC); 





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/s1.css?<?php echo time(); ?>" >  <!-- CSS -->
    <title>Bienvenido administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->  
</head>
<body>
<!-- Inicio del Navbar admin -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

<nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
        <div class="container-fluid">
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
                     
                       
                       <li> <a class="dropdown-item" href="../codes/logout.php">Cerrar sesión</a></li>
                       </ul>
                    </li>
                 </ul>
              </div>
        </div>
     </nav>
     
  
  <!-- Termino del Navbar  admin -->


<style>
.color{
   color:aqua;
   margin-top: 5rem;
 
  
}
</style>
<center>
   <div class="color">
      <h4> Bienvenido <?php echo $datos['NOMBRE'] ;?> </h4>
   </div>
</center>


  
</body>



</html>










 