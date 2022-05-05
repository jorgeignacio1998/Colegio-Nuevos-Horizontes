<?php
require '../codes/connect.php';
//print_r($_POST);
if(!isset($_POST['codigo'])){
    header('Location: ../admin/gestionarUsuarios.php?mensaje=error');
}

$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$rut = $_POST['txtRut'];
$correo = $_POST['txtCorreo'];
$contraseña1 = $_POST['txtPass'];
$contraseña2 = md5($contraseña1);
$telefono = $_POST['txtTelefono'];
$nivel = $_POST['txtNivel'];

//Editando los datos
$query = "UPDATE usuarios SET  NOMBRE = '{$nombre}', EMAIL = '{$correo}', TELEFONO = '{$telefono}', RUT = '{$rut}', CONTRASENA = '{$contraseña2}', NIVEL ='{$nivel}'  WHERE ID = $codigo ";
//$sentencia = $mysqli->query($query);


if(mysqli_query($mysqli, $query)){
    header('Location: gestionarUsuarios.php?mensaje=editado');
}else{
    header('Location: gestionarUsuarios.php?mensaje=error');
}



?>