<?php
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.
$error = array();



$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];
$alumno = $_POST["alumno"];
$id_clase = $_POST["id_clase"];
$id_anotacion = $_POST["id_anotacion"];




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
    




if(count($error)==0) {     
    
    $query = "UPDATE anotaciones SET  FECHA = '{$fecha}' , ANOTACION = '{$descripcion}' WHERE ID  = $id_anotacion ";

    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=editado';</script>";

        die();
    }
    else{
        echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=error';</script>";

        die();
    
    }
   
}

?>