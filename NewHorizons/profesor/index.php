<?php 

include 'seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.


    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1"); //obteniendo los datos
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);  //colocando los datos del usuario en un array para asi luego gestionarlos de mejor manera,
    echo $array['NOMBRE'];
    

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar y navbar</title>
    <link rel="stylesheet" type="text/css" href="../styles/side.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
    
</head>
<body>
    <div id="navbar">
        <a href="#" class="menu-bars"  id="show-menu">
            <i class="fas fa-bars"></i>
       </a>
       <li class="cerrar"><a href="../codes/logout.php"><i class="fa-solid fa-right-from-bracket" >  cerrar sesion</i>
    </div>
    <nav id="nav-menu">
        <ul class="nav-menu-items">
            <div id="navbar-toggle">
                <a href="#" class="menu-bars" id="hide-menu"> 
                    <i class="fas fa-bars nav-icon"></i> 
               </a>
               
            
                </a>
            </div>
            <hr>
            <div class="nav-section">
                <li class="nav-text"><a href="../alumno/perfil.php"><i class="fa-solid fa-user-pen">  </i>  Editar perfil</a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-fire nav-icon"> </i> Trending</a></li>
                <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i>Subcriptions</a></li>
            </div>
            <hr>
            <div class="nav-section">
                <li class="nav-text"><a href="#"><i class="fas fa-home nav-icon"></i>esquisde </a></li>
                <li class="nav-text"><a href="#"><i class="fas fa-fire nav-icon"></i>etcc </a></li>
                <li class="nav-text"><a href="#"><i class="fab fa-youtube nav-icon"></i>Subcriptions</a></li>
            </div>
        </ul>
    </nav>

    <script src="../components/c_sidebar2.js"></script>



</body>
</html>