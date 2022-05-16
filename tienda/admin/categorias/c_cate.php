<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.



    $nombre_categoria = $_POST['nombre'];
    

    


    $mysqli->query("INSERT INTO categorias (NOMBRE) VALUES ('{$nombre_categoria}') ");



    

    header('Location: index.php?mensaje=registrado');  //mensaje       
    
    
   


?>
