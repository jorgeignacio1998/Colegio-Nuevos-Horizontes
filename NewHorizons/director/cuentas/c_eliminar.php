<?php
include '../seguridad_director.php'; 
    if(!isset($_GET['codigo'])){
        echo "<script>location.href='index.php?mensaje=error';</script>";
        exit();
    }

    $codigo = $_GET['codigo'];

    //Eliminando los datos
$query = "DELETE FROM usuarios WHERE ID = $codigo ";



if(mysqli_query($mysqli, $query)){

    echo "<script>location.href='index.php?mensaje=eliminado';</script>";
}else{
    
    echo "<script>location.href='index.php?mensaje=error';</script>";
}
?>