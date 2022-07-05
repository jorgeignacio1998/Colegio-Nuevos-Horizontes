<?php
include 'codes/connect.php';
session_start();

$contador = 0;
if(isset($_SESSION['usuario'])){  //en el caso que exista alguien logueado va a cargar sus datos y meterlos en un array, si no hay ninguna sesion abierta entonces no hara nada.              

    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1"); //obteniendo los datos
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);  //colocando los datos del usuario en un array para asi luego gestionarlos de mejor manera,
    
    $contador = 1;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quienes somos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
  
</head>
<style>

    .navbar-nav .nav-item .nav-link {
    color: white;
    }

    .navbar-nav .nav-item.active .nav-link,
    .navbar-nav .nav-item:hover .nav-link {
    color: #efb85d;
    }

    .navbar-nav .nav-item.active .nav-link{
    color: #f0ad4e;
}

</style>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- INICIO MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid gx-5">
    <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" width="100">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link fw-bolder" href="index.php">Inicio</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link fw-bolder" href="quienes.php">Quienes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder" href="contacto/index.php">Contacto</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <button type="button" class="btn btn-warning fw-bold text-dark"><a class="text-decoration-none" href="views/login.php">INGRESAR</a></button>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- FIN MENU -->

<!-- INICIO CUERPO -->
<div class="d-flex justify-content-center align-items-center">
<img src="img/img_4.jpg" class="img-fluid" alt="...">
</div>

<div class="container mx-auto">
  <div class="row justify-content-center">

    <div class="col-12 mb-5 mt-5"> <h2 class="text-center text-dark"> Misión y Visión </h2>
    </div>

  </div>
</div>

<div class="container">
  <div class="row gx-4 justify-content-between mb-3">

    <div class="col-lg-4 col-md-12 d-flex"><div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-warning">COLEGIO NUEVOS HORIZONTES</h5>
    <p class="card-text">El Colegio Nuevos Horizontes, es una comunidad educativa, en la cual, el respeto hacia sus tradiciones es primordial, formando parte de su historia y de su cultura. Las tradiciones nos identifican y corresponden a momentos significativos, verdaderos hitos, en medio del quehacer cotidiano.</p>
  </div>
</div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex"> <div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary">MISIÓN</h5>
    <p class="card-text">Los alumnos del Colegio Nuevos Horizontes serán formados como personas competentes, de acuerdo con el marco curricular nacional sugerido por el Ministerio de Educación y la propuesta curricular del colegio, que favorezcan el aprendizaje y un desarrollo humano permanentes que les permitan proseguir sus estudios en la educación media, además de formar competencias para resolver problemas y conflictos cotidianos en su vida e interacción social.</p>
  </div>
</div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex"><div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary">VISIÓN</h5>
    <p class="card-text">Asegurar una educación de calidad, basada en valores humanistas, orientada a la formación de personas competentes para continuar estudios en la enseñanza media, con un enfoque integral de carácter biopsicosocial y mediante metodologías innovadoras en el aspecto pedagógico, curricular y tecnológico, teniendo en cuenta el contexto comunitario, social y económico.</p>
  </div>
</div>
    </div>

  </div>
</div>


<!-- TERMINO CUERPO -->

<br><br><br><br>
<!-- INICIO FOOTER -->
<div class="container-fluid">

   <div class="row p-5 bg-dark text-white">

      <div class="col-xs-12 col-md-6 col-lg-3">
         <p class="h4 text-info">Colegio Nuevos Horizontes</p>
         <img src="img/logoeduCode.png" class="w-50 mb-4" alt="...">
      </div>

      <div class="col-xs-12 col-md-6 col-lg-3">
         <p class="h5 mb-3 mt-2">Covid-19</p>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://www.gob.cl/pasoapaso/cifrasoficiales/" target="_blank">Casos diarios</a>
         </div>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://sigamosaprendiendo.mineduc.cl/wp-content/uploads/2022/02/ProtocoloMedidasSanitariasEE-2022.pdf" target="_blank">Protocolos</a>
         </div>
      </div>

      <div class="col-xs-12 col-md-6 col-lg-3">
      <p class="h5 mb-3 mt-2">Links</p>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://www.jovenesprogramadores.cl/" target="_blank">Jovenes Programadores</a>
         </div>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://eligecultura.gob.cl/cultural-sections/" target="_blank">Material Cultural</a>
         </div>
      </div>

      <div class="col-xs-12 col-md-6 col-lg-3">
      <p class="h5 mb-3 mt-2">Contacto</p>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://wa.me/56941773713" target="_blank">+569 4177 3713</a>
         </div>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://wa.me/56988938757" target="_blank">+569 8893 8757</a>
         </div>
      </div>

   </div>

</div>
<!-- FIN FOOTER -->

</body>
</html>