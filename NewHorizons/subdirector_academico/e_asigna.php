<?php
require 'seguridad_subdirector.php';
if(!isset($_POST['codigo'])){
    header('Location: index.php?mensaje=error');
}

$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$grado= $_POST["grado"];

//Editando los datos
$query = "UPDATE asignaturas SET  NOMBRE = '{$nombre}', ID_GRADO = '{$grado}'  WHERE ID_A = $codigo ";
//$sentencia = $mysqli->query($query);


if(mysqli_query($mysqli, $query)){
    header('Location: asignaturas.php?mensaje=editado');
}else{
    header('Location: asignaturas.php?mensaje=error');
}



?>
