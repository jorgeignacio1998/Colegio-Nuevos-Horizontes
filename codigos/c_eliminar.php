<?php
require 'connect.php';  //coneccion BD
    if(!isset($_GET['codigo'])){
        header('Location: ../vistas/usuarios.php?mensaje=error ');
        exit();
    }

   
    $codigo = $_GET['codigo'];

    //Eliminando los datos
$query = "DELETE FROM datos_usuarios WHERE ID = $codigo ";



if(mysqli_query($mysqli, $query)){
    header('Location: ../vistas/usuarios.php?mensaje=eliminado');
}else{
    header('Location: ../vistas/usuarios.php?mensaje=error');
}
?>