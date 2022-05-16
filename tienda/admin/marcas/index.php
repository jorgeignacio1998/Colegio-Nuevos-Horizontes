<?php 
include '../c_seguridad.php';     //Seguridad y Base de datos.
$datos_marcas = $mysqli->query("SELECT * FROM marcas"); //obtiene datos de todos las marcas.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/1.css?<?php echo time(); ?>" > <!-- CSS -->
    <title>Marcas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
      <!-- Iconos --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
        .col1{
            height:580px; overflow-y:scroll;
        }
       

    </style>

    </head>
<body>





          <!-- Inicio del Navbar admin -->

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
<nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
        <div class="container-fluid">
              <a href="index.php" class="navbar-brand">Admin</a>
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
                       <li> <a class="dropdown-item" href="../productos/index.php">Productos</a></li>       
                       <li> <a class="dropdown-item" href="../categorias/index.php">Categorias</a></li>  
                       <li> <a class="dropdown-item" href="../marcas/index.php">Marcas</a></li>  
                       <li> <a class="dropdown-item" href="c_logout.php">Cerrar sesión</a></li>
                       </ul>
                    </li>
                 </ul>
              </div>
        </div>
     </nav>
     
  
  <!-- Termino del Navbar  admin -->
