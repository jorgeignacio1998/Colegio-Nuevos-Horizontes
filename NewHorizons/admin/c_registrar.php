<?php
require '../codes/connect.php';
session_start(); //Paso 1 para utilizar sesiones
$usuario_logueado = $_SESSION['usuario'];
$error = array();

$correos = "SELECT EMAIL FROM usuarios"; 
$sentencia1 = $mysqli->query($correos);
$sentencia2 =mysqli_fetch_array($sentencia1);



$regexNombre = "/^[a-zA-Z\s]+$/";
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";


$email=$_POST['txtCorreo'];
$rut = $_POST['rut'];

//1.-  NOMBRE VALIDACIONES                     
if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['txtNombre'])){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='gestionarUsuarios.php?mensaje=formato1';</script>";  //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-   NOMBRE VALIDACIONES   


//1.-  RUT VALIDACIONES                     
if(!preg_match($regexRut, $_POST['rut'])){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='gestionarUsuarios.php?mensaje=formato3';</script>"; //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-  RUT VALIDACIONES   






//3.-  CORREO ELECTRONICO VALIDACIONES


if(!preg_match($regexEmail, $_POST['txtCorreo'])){
    array_push($error, "El formato del correo es invalido");  //este mensaje no es visible al usuario, se llena en la lista error, la cual sí está vacia hara cambios en la base de datos.
    echo "<script>location.href='gestionarUsuarios.php?mensaje=formato2';</script>";
};
    
    $validar_correo = $mysqli->query("SELECT * FROM usuarios WHERE EMAIL LIKE '{$email}' ");
    if(empty($validar_correo->num_rows)){ 
        //esta ok, el mail si está disponible para registar.
    }else{
        array_push($error, "El correo electronico ya esta en uso ");
        echo "<script>location.href='gestionarUsuarios.php?mensaje=error9';</script>";
    }

//  CORREO ELECTRONICO VALIDACIONES



// 4  RUT DUPLICADO
$rut_existe = $mysqli->query("SELECT * FROM usuarios WHERE RUT LIKE '{$rut}' ");
if(empty($rut_existe->num_rows)){ 
    //esta ok, el rut si está disponible para registar.
}else{
    array_push($error, "El rut ya esta en uso ");
    echo "<script>location.href='gestionarUsuarios.php?mensaje=error10';</script>";
}
// 4  RUT DUPLICADO



if(count($error)==0){

    $nombre = $_POST["txtNombre"];
    $correo = $_POST["txtCorreo"];
    $contrasena1 = $_POST["txtPass"];
    $contrasena2 = md5($contrasena1);
    $nivel = $_POST["txtNivel"];

    
    $query = "INSERT INTO usuarios (NOMBRE, RUT, EMAIL, CONTRASENA, NIVEL) VALUES ('{$nombre}', '{$rut}', '{$correo}', '{$contrasena2}', '{$nivel}') ";







    if(mysqli_query($mysqli, $query)){
        echo "<script>location.href='gestionarUsuarios.php?mensaje=registrado';</script>";
    }else{
        echo "<script>location.href='gestionarUsuarios.php?mensaje=error';</script>";
        exit();
    }
    
    
}



        
?>



