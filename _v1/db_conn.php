<?php
    //Conexion a la base de datos Formulario de datos e insertar de datos

    $sname = 'localhost';
    $uname = 'root';
    $password = '';
    $bd_name =  'doiscl_formulario';

    
    
    $mysqli = new mysqli($sname, $uname, $password, $bd_name);
    if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    #echo $mysqli->host_info . "\n";
    #print_r($_POST);
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];


    $mysqli->query("INSERT INTO datos (NOMBRE, RUT, TELEFONO, EMAIL, ASUNTO, MENSAJE) 
    VALUES ('{$nombre}', '{$rut}', '{$telefono}','{$email}', '{$asunto}', '{$mensaje}' ) ");
                                                                                               








?>