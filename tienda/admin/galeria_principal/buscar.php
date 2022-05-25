<?php 
include '../c_seguridad.php';     //Seguridad y Base de datos.




$id_producto = $_GET['id_producto'];







//$id_producto = $_POST['id_producto'];
$id_categoria = $_POST['id_categoria'];
$id_marca = $_POST['id_marca'];







header("Location: index.php?id_producto=$id_producto");













?>