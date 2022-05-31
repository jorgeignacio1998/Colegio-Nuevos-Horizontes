<?php 
include '../c_seguridad.php';     //Seguridad y Base de datos.

if(!isset($_GET['id_imagen'])){
    header('Location: index.php?mensaje=error ');
    exit();
}
$id_imagen = $_GET['id_imagen'];


$query1 = "SELECT * FROM slider_imagenes WHERE ID = $id_imagen";
$sentencia1 = mysqli_query($mysqli, $query1);
$sentencia2 = mysqli_fetch_array($sentencia1);

$nombre_imagen = $sentencia2['NOMBRE_IMAGEN'];



$query2 =  "DELETE FROM slider_imagenes WHERE ID = $id_imagen ";




if(mysqli_query($mysqli, $query2)){
    unlink("../../slider/img/$nombre_imagen");   
    echo "<script>location.href='index.php?mensaje=eliminado';</script>";

    die();
}
?>