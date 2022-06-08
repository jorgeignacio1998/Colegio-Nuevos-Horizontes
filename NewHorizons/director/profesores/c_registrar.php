<?php
include '../seguridad_director.php';    //BD, SEGURIDAD NIVEL, SESSION.

//Esto es para extrar el ID del director y asi asignarle el ID al profesor
$datos_usuarios = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$sentencia5 = mysqli_fetch_array($datos_usuarios, MYSQLI_ASSOC); 
$id_sede = $sentencia5['ID_SEDE'];
//Esto es para extrar el ID del director y asi asignarle el ID al profesor

$error = array();


$ruts = "SELECT RUT FROM profesores"; 
$sentencia1 = $mysqli->query($ruts);
$sentencia2 =mysqli_fetch_array($sentencia1);



$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";


$nombre=$_POST['nombre'];
$rut = $_POST['rut'];

//1.-  NOMBRE VALIDACIONES                     
if(!preg_match("/^[a-zA-Z\s]+$/", $nombre)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_nombre';</script>";
    
}  
//-   NOMBRE VALIDACIONES   


//1.-  RUT VALIDACIONES                     
if(!preg_match($regexRut, $rut)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_rut';</script>";
}  
//-  RUT VALIDACIONES   






//3.- rut existe
    
    $validar_rut = $mysqli->query("SELECT * FROM profesores WHERE RUT LIKE '{$rut}' ");
    if(empty($validar_rut->num_rows)){ 
        //esta ok, el mail si está disponible para registar.
    }else{
        array_push($error, "El Rut ya esta en uso, el profesor ya existe ");
        echo "<script>location.href='index.php?mensaje=rut_repetido';</script>";
    }
//3.- rut existe





if(count($error)==0){


    
    $query = "INSERT INTO profesores (NOMBRE, RUT, ID_SEDE) VALUES ('{$nombre}', '{$rut}','{$id_sede}') ";







    if(mysqli_query($mysqli, $query)){
      
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
    }else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
        exit();
    }
    
    
}



        
?>



