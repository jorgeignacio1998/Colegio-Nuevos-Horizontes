<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.
    if(!isset($_GET['codigo'])){
        header('Location: R_producto.php?mensaje=error ');
        exit();
    }

   
    $codigo = $_GET['codigo'];

    //Eliminando los datos
$query = "DELETE FROM productos WHERE ID = $codigo ";



if(mysqli_query($mysqli, $query)){
    header('Location: R_producto.php?mensaje=eliminado');
}else{
    header('Location: R_producto.php?mensaje=error');
}
?>