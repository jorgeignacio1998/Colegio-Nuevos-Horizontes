<?php
require '../codes/connect.php';
session_start(); //Paso 1 para utilizar sesiones
$usuario_logueado = $_SESSION['usuario'];
$error = array();
//print_r($_POST);
//empty($_POST["oculto"]) || 



$nombre = $_POST["txtNombre"];
$correo = $_POST["txtCorreo"];
$contrasena1 = $_POST["txtPass"];
$contrasena2 = md5($contrasena1);
$nivel = $_POST["txtNivel"];


                


// VALIDACIONES CON LA QUERY BD
$query = "INSERT INTO usuarios (NOMBRE, EMAIL, CONTRASENA, NIVEL) VALUES ('{$nombre}', '{$correo}', '{$contrasena2}', '{$nivel}') ";
if(mysqli_query($mysqli, $query)){
    header('Location: gestionarUsuarios.php?mensaje=registrado');
}else{
    header('Location: gestionarUsuarios.php?mensaje=error');
    exit();
}
   
    
        
?>
