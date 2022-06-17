<?php
include 'codes/connect.php';
session_start();

$contador = 0;
if(isset($_SESSION['usuario'])){  //en el caso que exista alguien logueado va a cargar sus datos y meterlos en un array, si no hay ninguna sesion abierta entonces no hara nada.              

    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1"); //obteniendo los datos
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);  //colocando los datos del usuario en un array para asi luego gestionarlos de mejor manera,
    echo $array['NOMBRE'];
    $contador = 1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="slider_1/css/estilos.css?<?php echo time(); ?>" >  <!-- CSS  del SLIDER-->
    <title>Nuevos Horizontes</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    
</head>


<style>
.logo{
   height: 6rem;
   width: 6rem;
}
.largo{
   height: 6rem;
}


</style>


<body>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   <!-- Inicio del Navbar -->
      <nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary largo ">
         <div class="container-fluid">

               <a href="index.php" class="navbar-brand"><img src="img/logo.png" class="logo"></a>
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
                        <li> <a class="dropdown-item" href="NewHorizons/">Opcion 1</a></li>
                        <li> <a class="dropdown-item" href="NewHorizons/">Opcion 2</a></li>
                        <li> <a class="dropdown-item" href="NewHorizons/">Opcion 3</a></li>
                        <?php if($contador == 0){
                           echo  '<li> <a class="dropdown-item" href="views/login.php">Iniciar sesión</a></li>';
                        }else{
                           echo   '<li> <a class="dropdown-item" href="codes/logout.php">Cerrar sesión</a></li>';
                        }?>
                        
                        
                        </ul>
                     </li>
                  </ul>
               </div>
         </div>
      </nav>
   <!-- Termino del Navbar  -->



   <!-- HTML SLIDER  -->
      <?php  
         include 'slider_1/index.php';
      ?>
   <!-- HTML SLIDER  -->



  

   
  

</body>
</html>


