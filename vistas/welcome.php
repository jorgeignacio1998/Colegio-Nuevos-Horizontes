<?php  //seguridad de sesiones
session_start();

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bienvenido</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- Estilos -->
   <style> 


      .c1{
         width: 17%;
         padding: 2px 2px;
      }

   </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <!-- Inicio del Navbar -->
   
      <nav class="navbar navbar-dark bg-primary navbar-expand-md border-primary">
         <div class="container-fluid">
               <a href="welcome.php" class="navbar-brand">Inicio</a>
               <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNav" >
                  <span class="navbar-toggler-icon"></span>
               </button>
               
               <div id="MenuNav" class="collapse navbar-collapse d-flex flex-row-reverse ">
                  <ul class="navbar-nav" ms-3>  
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown">
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
   <!-- Inicio card informacion personal  -->
   <div class="d-flex flex-row-reverse flex-wrap">
   <div class="card mt-4 m-4 c1 "  >
        <div class="card-body " >
            <img src="https://static.vecteezy.com/system/resources/previews/004/607/791/large_2x/man-face-emotive-icon-smiling-male-character-in-blue-shirt-flat-illustration-isolated-on-white-happy-human-psychological-portrait-positive-emotions-user-avatar-for-app-web-design-vector.jpg" 
            class="img-fluid my-1 mt-1" width="60 ">
            <div class="card-title">Nombre del usuario <?php echo $_SESSION['usuario']; ?> </div>
            <p class="card-text" >Especialidad</p>
        </div>
    </div>
   </div>
  

  















</body>
</html>