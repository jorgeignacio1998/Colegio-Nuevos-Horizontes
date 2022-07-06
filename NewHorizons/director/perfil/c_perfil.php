<?php
require '../seguridad_director.php';  //coneccion BD


$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$row = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); 

$error = array();
$ruta = 'D:/XAMPP/htdocs/NewHorizons/images/';

$regexNombre2 = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";
$regexTelefono = "/^[+56|9][0-9]{8,11}$/";
$regexDireccion = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9'\.\-\s\,]+$/";

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
        echo "<script>location.href='../index.php?mensaje=pass';</script>";
        $c = 1;

    }else{ // no muestra alerta porque esto ira en otro lado seguramente  LO ULTIMO QUE VOY A HACER.
    }
};
// fin EDITAR CONTRASEÑA VALIDACIONES

//1.-formato nombre                      
if(!preg_match($regexNombre2, $nombre)){
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
if($telefono !== '')  {
    if(!preg_match($regexTelefono, $telefono)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='../index.php?mensaje=formato_telefono';</script>";  
        die;  
    }
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
  






        $query6 = "UPDATE usuarios  SET  NOMBRE = '{$nombre}' , EMAIL = '{$email}' ,RUT = '{$rut}'  WHERE ID LIKE '{$usuario_logueado}' ";

                if(mysqli_query($mysqli, $query6)){
                   
                  
                    echo "<script>location.href='../index.php?mensaje=guardado';</script>";
                }else{
                    echo "<script>location.href='../index.php?mensaje=error1111';</script>";
                }


             








   
}

                                                                                    



?>