<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.



    $nombre_marca = $_POST['nombre'];
    $id_categoria = $_POST['categoria'];
    

    


    $mysqli->query("INSERT INTO marcas (NOMBRE, ID_CATEGORIA) VALUES ('{$nombre_marca}','{$id_categoria}' ) ");



    

    header('Location: index.php?mensaje=registrado');  //mensaje       
    
    
   


?>
