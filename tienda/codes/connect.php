<?php

    //Conexion a la base de datos

    $servidor = 'localhost';
    $usuario = 'root';
    $clave = '';
    $db =  'tienda';


    $mysqli = new mysqli($servidor, $usuario, $clave, $db);
    if(!$mysqli){
        die("conexion fallida");
    }


     
    

    