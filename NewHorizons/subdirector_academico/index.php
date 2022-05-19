<?php 

include 'seguridad_subdirector.php';    //BD, SEGURIDAD NIVEL, SESSION.


    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1"); //obteniendo los datos
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);  //colocando los datos del usuario en un array para asi luego gestionarlos de mejor manera,
    echo $array['NOMBRE'];
    

?>
