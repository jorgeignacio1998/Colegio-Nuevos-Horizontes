<?php
require '../seguridad_director.php';
$error = array();


if(!isset($_POST['id_horario'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}

$id_horario = $_POST['id_horario'];


$id_clase = $_POST["id_clase"];
$id_dia = $_POST["id_dia"];
$inicio = $_POST["inicio"];
$termino = $_POST["termino"];





  
    //Editando los datos
    $query = "UPDATE horarios_clases SET  ID_CLASE = '{$id_clase}', ID_DIA = '{$id_dia}' , HORA_INICIO ='{$inicio}', HORA_TERMINO = '{$termino}'
    WHERE ID = $id_horario ";
    //$sentencia = $mysqli->query($query);

    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='index.php?id_horario=$id_horario&id_clase=$id_clase&mensaje=editado';</script>";

        die();
    }
    else{
        echo "<script>location.href='index.php?id_horario=$id_horario&id_clase=$id_clase&mensaje=error';</script>";

        die();
    
    }
   

    

