<?php
if($_SERVER['SERVER_NAME'] =='localhost'){
 //Conexion a la base de datos RegistroUsuarios.

 $servidor = 'localhost';
 $usuario = 'root';
 $clave = '';
 $db =  'nuevos_horizontes';


 $mysqli = new mysqli($servidor, $usuario, $clave, $db);
 if(!$mysqli){
     die("conexion fallida");
 }

}else{
    $servidor = 'localhost';
    $usuario = 'doiscl_admin';
    $clave = 'DJx4Jsl2N34g';
    $db =  'doiscl_nuevos_horizontes';


    $mysqli = new mysqli($servidor, $usuario, $clave, $db);
    if(!$mysqli){
        die("conexion fallida");
    }
}



   

     
