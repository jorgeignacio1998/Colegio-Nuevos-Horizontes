<?php
require '../seguridad_director.php';  //coneccion BD
session_start(); //Paso 1 para utilizar sesiones
//manejar los datos del usuario
$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$row = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); 

$error = array();
$ruta = 'D:/XAMPP/htdocs/NewHorizons/images/';

$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";
$regexTelefono = "/^[+56|9][0-9]{8,11}$/";
$regexDireccion = "/^[A-Za-z0-9'\.\-\s\,]+$/";

$nombre = $_POST["nombre"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];

$nombre_img = $_FILES['imagen']['name'];
$contraseña1 = 0;

//.- EDITAR CONTRASEÑA VALIDACIONES
if(isset($_POST['contraseña1'])){

    $contraseña1 = $_POST["contraseña1"];
    if(!empty($_POST['contraseña1'])){
        $contraseña1 = md5($contraseña1);  
        $mysqli->query("UPDATE usuarios SET CONTRASENA = '{$contraseña1}' WHERE ID = $row[ID]");
        echo "<script>location.href='index.php?mensaje=pass';</script>";
        $c = 1;

    }else{ // no muestra alerta porque esto ira en otro lado seguramente  LO ULTIMO QUE VOY A HACER.
    }
};
// fin EDITAR CONTRASEÑA VALIDACIONES

//1.-formato nombre                      
if(!preg_match($regexNombre, $nombre)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='../index.php?mensaje=formato_nombre';</script>";  
    die;  
}  
//- formato nombre    

//1.-formato rut                  
if(!preg_match($regexRut, $rut)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='../index.php?mensaje=formato_rut';</script>";  
    die;  
}  
//- formato rut 

//1.-formato email                  
if(!preg_match($regexEmail, $email)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='../index.php?mensaje=formato_email';</script>";  
    die;  
}  
//- formato email

//1.-formato telefono               
if(!preg_match($regexTelefono, $telefono)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='../index.php?mensaje=formato_telefono';</script>";  
    die;  
}  
//- formato telefono

//1 .- EDITAR TELEFONO CON FORMATO, No es un campo obligatorio.
if(!empty($_POST['telefono'])){
    if(!preg_match("$regexTelefono", $_POST['telefono'])){
        array_push($error, "El formato del telefono es invalido");
        echo "<script>location.href='../index.php?mensaje=error4';</script>";
      
       
    }else{
        echo 'Buen formato';
    }
}
//1.- EDITAR TELEFONO














if(count($error)==0) //NO ERRORES DE FORMATO
{ 
    if(empty($nombre_img) and $telefono == $row['TELEFONO'] ){ 
        if($contraseña1 == $row['CONTRASENA']){
            echo "<script>location.href='index.php?mensaje=error6';</script>";
        }
        if($nombre_img == '' and  $telefono == $row['TELEFONO'] and $_POST['contraseña1']== ''){
            //ALERTA NO CAMBIOS REALIZADOS PORQUE TODOS LOS DATOS ESTAN VACIOS
            echo "<script>location.href='index.php?mensaje=error6';</script>";
        }
    
    

    }else{

      
        $nombre_img = $_FILES['imagen']['name'];
        $mysqli->query("UPDATE usuarios SET TELEFONO = '{$telefono}' WHERE ID = $row[ID]");


        
        if(!empty($nombre_img)){
            if(move_uploaded_file($_FILES['imagen']['tmp_name'],"../images/{$nombre_img}")){ 
            $mysqli->query("UPDATE usuarios SET FOTO = '{$nombre_img}' WHERE ID = $row[ID]");
        }
        }

       
        echo "<script>location.href='../index.php?mensaje=guardado';</script>";
    }


   
}

                                                                                    



?>