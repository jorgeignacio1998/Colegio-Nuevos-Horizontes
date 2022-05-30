<?php 
include '../c_seguridad.php';     //Seguridad y Base de datos.

if(!isset($_GET['id_foto'])){
    header('Location: index.php?mensaje=error ');
    exit();
}
$id_foto = $_GET['id_foto'];

if(!isset($_GET['id_producto'])){
    header('Location: index.php?mensaje=error ');
    exit();
}
$id_producto = $_GET['id_producto'];


$query1 =  "UPDATE galeria SET  PRINCIPAL = '1'  WHERE ID_G = $id_foto ";




if(mysqli_query($mysqli, $query1)){
        
    echo "<script>location.href='index.php?id_producto=$id_producto&mensaje=success';</script>";

    die();
}
?>