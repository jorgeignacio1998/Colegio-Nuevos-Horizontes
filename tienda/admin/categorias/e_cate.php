<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.

if(!isset($_POST['codigo'])){
    header('Location: index.php?mensaje=error');
}




$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];



$mysqli->query("UPDATE categorias SET  NOMBRE = '{$nombre}' WHERE ID = $codigo  ");
header('Location: index.php?mensaje=editado');



?>