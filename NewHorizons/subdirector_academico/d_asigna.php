<?php
include 'seguridad_subdirector.php';     //Seguridad y Base de datos.
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error ');
        exit();
    }

   
    $codigo = $_GET['codigo'];

    //Eliminando los datos
$query = "DELETE FROM asignaturas WHERE ID = $codigo ";



if(mysqli_query($mysqli, $query)){
    header('Location: asignaturas.php?mensaje=eliminado');
}else{
    header('Location: asignaturas.php?mensaje=error');
}
?>