<?php
include '../seguridad_director.php'; 
//print_r($_POST);
if(!isset($_POST['codigo'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}

$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$rut = $_POST['rut'];
$correo = $_POST['txtCorreo'];
$contraseña1 = $_POST['txtPass'];
$contraseña2 = md5($contraseña1);
$nivel = $_POST['txtNivel'];

//Editando los datos
$query = "UPDATE usuarios SET  NOMBRE = '{$nombre}', RUT = '{$rut}', EMAIL = '{$correo}', CONTRASENA = '{$contraseña2}', NIVEL ='{$nivel}'  WHERE ID = $codigo ";
//$sentencia = $mysqli->query($query);


if(mysqli_query($mysqli, $query)){
  
    echo "<script>location.href='index.php?mensaje=editado';</script>";
}else{
    echo "<script>location.href='index.php?mensaje=error';</script>";
}



?>