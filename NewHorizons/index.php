<?php
include 'codes/connect.php';
session_start();

$contador = 0;
if(isset($_SESSION['usuario'])){  //en el caso que exista alguien logueado va a cargar sus datos y meterlos en un array, si no hay ninguna sesion abierta entonces no hara nada.              

    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1"); //obteniendo los datos
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);  //colocando los datos del usuario en un array para asi luego gestionarlos de mejor manera,
    // echo $array['NOMBRE'];
    $contador = 1;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevos Horizontes</title>
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
      <li class="nav-item active">
          <a class="nav-link fw-bolder" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder" href="quienes.php">Quienes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder" href="contacto/index.php">Contacto</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
      <li class="nav-item">
      <a class="text-decoration-none" href="views/login.php"><button type="button" class="btn btn-warning fw-bold text-primary">INGRESAR</button></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- FIN MENU -->

<!--  INICIO SLIDER  -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img_banner_1.jpg" class="d-block w-100" alt="img banner" >
      <div class="carousel-caption d-none d-md-block">
        <h5 class="shadow-xl">FELICES VACACIONES DE INVIERNO</h5>
        <p class="shadow-xl">¡Nos volveremos a encontrar en la sala de clases!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/img_banner_2.jpg" class="d-block w-100" alt="img banner">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="shadow-xl">COVID-19</h3>
        <p class="shadow-xl">Tenemos las medidas necesarias para combatir el Covid en las salas de clases</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/img_banner_3.jpg" class="d-block w-100" alt="img banner">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="shadow-xl">GRADUACIONES DE CUARTOS MEDIOS</h5>
        <p class="shadow-xl">Ahora es cuando empieza la verdadera aventura de la vida. ¡Adelante!</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!--  FINAL SLIDER  -->

<!-- INICIO CUERPO -->
<div class="container mx-auto">
  <div class="row justify-content-center">

    <div class="col-12 mb-5 mt-5"> <h2 class="text-center text-dark"> ¡Gracias por ser parte de Colegio Nuevos Horizontes! </h2>
    </div>

  </div>
</div>

<div class="container">
  <div class="row gx-4 justify-content-between mb-3">
    <div class="col-lg-4 col-md-12 d-flex"> <div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary text-primary">ADMISIÓN 2023</h5>
    <p class="card-text">En el colegio Nuevos Horizontes estamos preparados para recibir a nuevos estudiantes en la comunidad educativa. Puedes encontrar más información en el sitio web del colegio para saber como continuar con las matriculas de alumnos ya ingresados.</p>
  </div>
</div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex"> <div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary">PROTOCOLO COVID</h5>
    <p class="card-text">En el colegio contamos con un protocolo respecto a las medidas sanitarias siguiendo el lineamiento del Gobierno de Chile en este año 2022 en el cual las clases serán presenciales.</p>
  </div>
</div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex"> <div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary">CERTIFICADOS</h5>
    <p class="card-text">Contamos con tramites en linea en el sitio web principal del colegio Nuevos Horizontes en el cual puedes solicitar certificados de Alumno Regular para este año 2022 para diversas necesidades.</p>
  </div>
</div>
    </div>

  </div>
</div>

<div class="container">
  <div class="row gx-4 justify-content-between mb-3">

    <div class="col-lg-4 col-md-12 d-flex"><div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary">INFRAESTRUCTURA</h5>
    <p class="card-text">Somos una institucion preocupada de nuestros estudiantes, por lo cual cumplimos con todas las medidas de seguridad en la infraestructura del establecimiento además de contar con Laboratorios de computación, espacios recreativos amplios, casino, etc.</p>
  </div>
</div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex"> <div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary">BIBLIOTECA</h5>
    <p class="card-text">En el establecimiento tenemos una Biblioteca para nuestros estudiantes, en la cual existen fechas programadas en las cuales se realizaran actividades interactivas para los diferentes cursos y asignaturas. Además contamos con libros para prestamo de los estudiantes.</p>
  </div>
</div>
    </div>

    <div class="col-lg-4 col-md-6 d-flex"><div class="card w-80 mb-3">
  <div class="card-body">
    <h5 class="card-title text-primary">NOTICIAS</h5>
    <p class="card-text">En nuestro sitio web principal podrás revisar nuestras principales noticias actualizadas día a día contando nuestras actividades o comunicados del establecimiento disponible para todos.</p>
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