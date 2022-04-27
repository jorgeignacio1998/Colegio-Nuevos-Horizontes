<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>






       <!-- estilos css -->
    <style>
    body{
        background: #7F7FD5;  
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    </style>








<?php   
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


$datos_usuario = $mysqli->query("SELECT * FROM datos_usuarios WHERE EMAIL LIKE '{$usuario_logueado}' LIMIT 1");
$sentencia2 = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); 

if($sentencia2['NIVEL'] == 1){
  echo "<h1>hola Bienvenido admin</h1>";
}
if($sentencia2['NIVEL'] == 2){
  header("location: ../vistas/welcome.php");
}
if($sentencia2['NIVEL'] == 3){
  header("location: ../vistas/welcome.php");
}

?>



ADMIN





  </body>
</html>