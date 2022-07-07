<?php
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.
$error = array();




$id_clase = $_POST["id_clase"];
$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];
$alumno = $_POST["alumno"];

$regexDescripcion = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9?¿!\.\s\-\,]+$/";

// VALIDACIONES
    //1.-formato formato_descripcion                      
    if(!preg_match($regexDescripcion, $descripcion)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=formato_descripcion';</script>";  
        die;  
    }  
    //- formato formato_descripcion       

// VALIDACIONES
    



$query = "INSERT INTO anotaciones (ID_ALUMNO,ID_CLASE,ANOTACION,FECHA) VALUES ('{$alumno}','{$id_clase}','{$descripcion}' , '{$fecha}'   ) ";
    


if(count($error)==0) {     
    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=error';</script>";
    
        die();
      
    }
}
    
?>