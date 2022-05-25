<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.

if(!isset($_POST['codigo'])){
    header('Location: index.php?mensaje=error');
}




$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];




$mysqli->query("UPDATE marcas SET  NOMBRE  = '{$nombre}' ,  ID_CATEGORIA = '{$categoria}'  WHERE ID = $codigo  ");
header('Location: index.php?mensaje=editado');



?>