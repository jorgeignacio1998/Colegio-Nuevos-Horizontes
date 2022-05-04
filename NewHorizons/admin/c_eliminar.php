<?php
require '../codes/connect.php';  //coneccion BD
    if(!isset($_GET['codigo'])){
        header('Location: gestionarUsuarios.php?mensaje=error ');
        exit();
    }

    $codigo = $_GET['codigo'];

    //Eliminando los datos
$query = "DELETE FROM usuarios WHERE ID = $codigo ";



if(mysqli_query($mysqli, $query)){
    header('Location: gestionarUsuarios.php?mensaje=eliminado');
}else{
    header('Location: gestionarUsuarios.php?mensaje=error');
}
?>