<?php 

include 'seguridad_alumno.php';    //BD, SEGURIDAD NIVEL, SESSION.


    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1"); //obteniendo los datos
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);  //colocando los datos del usuario en un array para asi luego gestionarlos de mejor manera,
    echo $array['NOMBRE'];
    

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar y navbar</title>
    <link rel="stylesheet" type="text/css" href="../styles/navside.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
    
</head>
<body>




<?php 
   include 'navside.php';
   ?>

   <H4>BIENVENIDO </H4>


   

</body>
</html>