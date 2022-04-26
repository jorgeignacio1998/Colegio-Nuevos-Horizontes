<?php
require 'connect.php';
//print_r($_POST);
if(!isset($_POST['codigo'])){
    header('Location: ../vistas/usuarios.php?mensaje=error');
}

$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$correo = $_POST['txtCorreo'];
$rut = $_POST['txtRut'];
$telefono = $_POST['txtTelefono'];


//Editando los datos
$query = "UPDATE datos_usuarios SET  USERNAME = '{$nombre}', EMAIL = '{$correo}', TELEFONO = '{$telefono}', RUT = '{$rut}'  WHERE ID = $codigo ";
//$sentencia = $mysqli->query($query);


if(mysqli_query($mysqli, $query)){
    header('Location: ../vistas/usuarios.php?mensaje=editado');
}else{
    header('Location: ../vistas/usuarios.php?mensaje=error');
}



?>