<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.



    $nombre_marca = $_POST['nombre'];
    

    


    $mysqli->query("INSERT INTO marcas (NOMBRE) VALUES ('{$nombre_marca}') ");



    

    header('Location: index.php?mensaje=registrado');  //mensaje       
    
    
   


?>
