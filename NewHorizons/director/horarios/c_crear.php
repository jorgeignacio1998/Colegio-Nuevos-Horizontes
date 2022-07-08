<?php
require '../seguridad_director.php';
$error = array();

$id_clase = $_POST["id_clase"];

$id_dia = $_POST["id_dia"];
$inicio = $_POST["inicio"];
$termino = $_POST["termino"];





    
    

    $query = "INSERT INTO horarios_clases (ID_CLASE , ID_DIA,HORA_INICIO ,HORA_TERMINO) VALUES ('{$id_clase}','{$id_dia}','{$inicio}','{$termino}' )";

       
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=error';</script>";
    
        die();
      
    }
   













    
?>