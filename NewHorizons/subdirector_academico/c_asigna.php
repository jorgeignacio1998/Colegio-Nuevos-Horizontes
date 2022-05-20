<?php
require 'seguridad_subdirector.php';
$error = array();




    $nombre = $_POST["nombre"];
    $grado = $_POST["grado"];
   
  

    
    $query = "INSERT INTO asignaturas (NOMBRE,ID_GRADO) VALUES ('{$nombre}','{$grado}') ";
    if(mysqli_query($mysqli, $query)){
        header('Location: asignaturas.php?mensaje=registrado');
    }else{
        header('Location: asignaturas.php?mensaje=error');
        exit();
    }
    
?>