<?php
require '../seguridad_subdirector.php';

$error = array();
$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";


$ruts = "SELECT RUT FROM profesores"; 
$sentencia1 = $mysqli->query($ruts);
$sentencia2 =mysqli_fetch_array($sentencia1);

$id_profesor=$_POST['id_profesor'];
$nombre=$_POST['nombre'];
$rut = $_POST['rut'];



//1.-  NOMBRE VALIDACIONES                     
if(!preg_match("/^[a-zA-Z\s]+$/", $nombre)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='E_profesor.php?mensaje=formato_nombre';</script>";
    
}  
//-   NOMBRE VALIDACIONES   


//2.-  RUT VALIDACIONES                     
if(!preg_match($regexRut, $rut)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='editar.php?codigo=$codigo&mensaje=formato_nombre';</script>";    
}  
//-  RUT VALIDACIONES   





// 2.- Validacion profesor ya existe
$datos = $mysqli->query("SELECT * FROM profesores WHERE ID LIKE '{$id_profesor}' ");
$row =mysqli_fetch_array($datos);


if($row['RUT'] !== $rut ){
    $query2 = $mysqli->query("SELECT * FROM profesores WHERE RUT LIKE '{$rut}' ");
    $res2 = mysqli_num_rows($query2);
    if($res2 > 0){
        array_push($error, "Profesor ya existe");
        echo "<script>location.href='E_profesor.php?id_profesor=$id_profesor&mensaje=profesor_clonado';</script>";
    }
}
// 2.- Validacion sala ya en uso








if(count($error)==0){

    
    $query = "UPDATE profesores SET NOMBRE = '{$nombre}', RUT = '{$rut}'   WHERE ID  = $id_profesor ";


    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='E_profesor.php?mensaje=editado&id_profesor=$id_profesor';</script>";

        die();
    }
    else{
        echo "<script>location.href='E_profesor.php?mensaje=error&id_profesor=$id_profesor';</script>";

        die();
    
    }
}
