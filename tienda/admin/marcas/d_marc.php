<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error ');
        exit();
    }

   
    $codigo = $_GET['codigo'];

    //Eliminando los datos
$query = "DELETE FROM marcas WHERE ID = $codigo ";



if(mysqli_query($mysqli, $query)){
    header('Location: index.php?mensaje=eliminado');
}else{
    header('Location: index.php?mensaje=error');
}
?>