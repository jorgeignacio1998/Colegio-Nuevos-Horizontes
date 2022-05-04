<?php
require '../codes/connect.php';
session_start(); //Paso 1 para utilizar sesiones
$usuario_logueado = $_SESSION['usuario'];
$error = array();
//print_r($_POST);
//empty($_POST["oculto"]) || 



if(empty($_POST["txtNombre"])  || empty($_POST["txtCorreo"]) ||  empty($_POST["txtRut"]) || empty($_POST["txtTelefono"])  ){
    header('Location: gestionarUsuarios.php?mensaje=falta');
    exit();
}

$nombre = $_POST["txtNombre"];
$correo = $_POST["txtCorreo"];
$rut = $_POST["txtRut"];
$telefono = $_POST["txtTelefono"];

                


// VALIDACIONES CON LA QUERY BD
$query = "INSERT INTO usuarios (NOMBRE, EMAIL, TELEFONO, RUT) VALUES ('{$nombre}', '{$correo}', '{$telefono}', '{$rut}') ";
if(mysqli_query($mysqli, $query)){
    header('Location: gestionarUsuarios.php?mensaje=registrado');
}else{
    header('Location: gestionarUsuarios.php?mensaje=error');
    exit();
}
    //  $mysqli->query("INSERT INTO datos_usuarios (USERNAME, EMAIL, TELEFONO, RUT) 
    //   VALUES ('{$nombre}', '{$correo}', '{$telefono}', '{$rut}') ");
    



        
?>
