<?php
require '../codes/connect.php';
//print_r($_POST);
if(!isset($_POST['codigo'])){
    header('Location: ../admin/gestionarUsuarios.php?mensaje=error');
}

$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$correo = $_POST['txtCorreo'];
$contraseña1 = $_POST['txtPass'];
$contraseña2 = md5($contraseña1);
$nivel = $_POST['txtNivel'];

//Editando los datos
$query = "UPDATE usuarios SET  NOMBRE = '{$nombre}', EMAIL = '{$correo}', CONTRASENA = '{$contraseña2}', NIVEL ='{$nivel}'  WHERE ID = $codigo ";
//$sentencia = $mysqli->query($query);


if(mysqli_query($mysqli, $query)){
    header('Location: gestionarUsuarios.php?mensaje=editado');
}else{
    header('Location: gestionarUsuarios.php?mensaje=error');
}



?>