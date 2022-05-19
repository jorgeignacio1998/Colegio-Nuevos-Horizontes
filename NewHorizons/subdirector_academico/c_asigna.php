<?php
require 'seguridad_subdirector.php';
$error = array();




    $nombre = $_POST["nombre"];
    $profesor = $_POST["profesor"];
    $sala = $_POST["sala"];
  

    
    $query = "INSERT INTO asignaturas (NOMBRE, ID_PROFESOR, ID_SALA) VALUES ('{$nombre}', '{$profesor}', '{$sala}') ";
    if(mysqli_query($mysqli, $query)){
        header('Location: asignaturas.php?mensaje=registrado');
    }else{
        header('Location: asignaturas.php?mensaje=error');
        exit();
    }
    
?>