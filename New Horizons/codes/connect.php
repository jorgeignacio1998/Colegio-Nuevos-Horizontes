<?php

    //Conexion a la base de datos RegistroUsuarios.

    $servidor = 'localhost';
    $usuario = 'root';
    $clave = '';
    $db =  'nuevos_horizontes';


    $mysqli = new mysqli($servidor, $usuario, $clave, $db);
    if(!$mysqli){
        die("conexion fallida");
    }


     
    
?>