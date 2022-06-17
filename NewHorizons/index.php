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
    <link rel="stylesheet" type="text/css" href="navbar_1/styles.css?<?php echo time(); ?>" >  <!-- CSS  del navbar-->
    <title>Nuevos Horizontes</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    
</head>


<style>
   .logo{
      height: 6rem;
      width: 6rem;
   }

   


</style>


<body>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


   <!-- Navbar  -->
      <header>
         <div class="logo-header" >
            <img src="img/logo.png"  >
         </div>
         <nav class="nav-menu">
            <ul>
               <li class="ingresar"><a href="views/login.php">INGRESAR</a></li>
            </ul>
         </nav>
      </header>
   <!-- Navbar  -->

   
   <!--  SLIDER  -->
      <?php  
         include 'slider_1/index.php';
      ?>
   <!--  SLIDER  -->


   <!--  CUERPO  -->
      <br> <br> <br> 
      <div class="grid-layout-prin">
         <h2>¡Gracias por ser parte de Colegio Nuevos Horizontes!</h2>
      </div> <br>

      <div class="row d-flex justify-content-center">
         <div class="caja col-sm-3">
               <h2>ADMISIÓN 2023</h2>
               <p> En el colegio Nuevos Horizontes estamos preparados para recibir a nuevos estudiantes en la comunidad educativa. Puedes encontrar más información en el sitio web del colegio para saber como continuar con las matriculas de alumnos ya ingresados. </p>
         </div>

         <div class="caja col-sm-3">
            
               <h2>PROTOCOLO COVID</h2>
               <p> En el colegio contamos con un protocolo respecto a las medidas sanitarias siguiendo el lineamiento del Gobierno de Chile en este año 2022 en el cual las clases serán presenciales. </p>
         </div>

         <div class="caja col-sm-3">
               
               <h2>CERTIFICADOS</h2>
               <p> Contamos con tramites en linea en el sitio web principal del colegio Nuevos Horizontes en el cual puedes solicitar certificados de Alumno Regular para este año 2022 para diversas necesidades. </p>
         </div>
      </div>
      <br> <br>
      <div class="row d-flex justify-content-center">
         <div class="caja col-sm-3">
               
               <h2>INFRAESTRUCTURA</h2>
               <p> Somos una institucion preocupada de nuestros estudiantes, por lo cual cumplimos con todas las medidas de seguridad en la infraestructura del establecimiento además de contar con Laboratorios de computación, espacios recreativos amplios, casino, etc. </p>
         </div>

         <div class="caja col-sm-3">
               
               <h2>BIBLIOTECA</h2>
               <p> En el establecimiento tenemos una Biblioteca para nuestros estudiantes, en la cual existen fechas programadas en las cuales se realizaran actividades interactivas para los diferentes cursos y asignaturas. Además contamos con libros para prestamo de los estudiantes. </p>
         </div>

         <div class="caja col-sm-3">
            
               <h2>NOTICIAS</h2>
               <p> En nuestro sitio web principal podrás revisar nuestras principales noticias actualizadas día a día contando nuestras actividades o comunicados del establecimiento disponible para todos. </p>
         </div>
      </div>
      <br> <br>
      

         

         
     
   <!--  CUERPO  -->

   
  

</body>
</html>


