<?php
require 'connect.php';  //coneccion BD
session_start(); //Paso 1 para utilizar sesiones
//manejar los datos del usuario
$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM datos_usuarios WHERE EMAIL LIKE '{$usuario_logueado}' LIMIT 1");
$row = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); 






$error = array();
$ruta = 'D:/XAMPP/htdocs/images/';
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,}+$/";
$regexNombre = "/^[a-zA-Z\s]+$/";
$regexTelefono = "/\A(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}\z/" ;
$regexRut = "/^[0-9.]+[-]?+[0-9kK]{1}/";







//1.- EDITAR NOMBRE VALIDACIONES                     
    if(!preg_match("/^[a-zA-Z\s]+$/", $_POST['nombre'])){
        array_push($error, "El formato es invalido");
        header('Location: ../vistas/perfil.php?mensaje=error1'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
        
    }  
//- fin EDITAR NOMBRE VALIDACIONES   
    





//2.- EDITAR CONTRASEÑA VALIDACIONES
if(isset($_POST['contraseña1'])){

    $contraseña1 = $_POST["contraseña1"];
    if(!empty($_POST['contraseña1'])){
        $contraseña1 = md5($contraseña1);  
        $mysqli->query("UPDATE datos_usuarios SET QPASSWORD = '{$contraseña1}' WHERE ID = $row[ID]");
    }else{ // no muestra alerta porque esto ira en otro lado seguramente  
    }
};
// fin EDITAR CONTRASEÑA VALIDACIONES






//3.- EDITAR CORREO ELECTRONICO VALIDACIONES
// falta una validacion por si el correo modificado esta en la base de datos. ademas mejorar el formato.  .algo(lengh 3 ) com  cl  pero no 4 letras.
if(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST['email'])){
    array_push($error, "El formato del correo es invalido");  //este mensaje no es visible al usuario, se llena en la lista error, la cual sí está vacia hara cambios en la base de datos.
    header('Location: ../vistas/perfil.php?mensaje=error3'); //Enviandole ALERTA metodo GET(error3), REDIRECCION 
}
// fin EDITAR CORREO ELECTRONICO VALIDACIONES








//4.- EDITAR TELEFONO CON FORMATO, No es un campo obligatorio.
if(!empty($_POST['telefono'])){
    if(!preg_match("$regexTelefono", $_POST['telefono'])){
        array_push($error, "El formato del telefono es invalido");
        header('Location: ../vistas/perfil.php?mensaje=error4'); //Enviandole ALERTA metodo GET(error4), REDIRECCION
    }else{
        echo 'Buen formato';
    }
}
//4.- EDITAR TELEFONO








//5.- EDITAR RUT VALIDACIONES                     
if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $_POST['rut'])){
    array_push($error, "El formato es invalido");
    header('Location: ../vistas/perfil.php?mensaje=error5'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
}  
//- fin EDITAR RUT  








//Si no hay errores en el llenado de los campos entonces guardara los datos.
if(count($error)==0){ 

    $nombre_img = $_FILES['imagen']['name'];
    if(!empty($nombre_img)){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],"../images/{$nombre_img}")){ 
            $mysqli->query("UPDATE datos_usuarios SET FOTO = '{$nombre_img}' WHERE ID = $row[ID]");
        }
    }

    $username = $_POST['nombre'];
    $telefono = $_POST["telefono"];
    $rut = $_POST["rut"];
    $banco = $_POST["banco"];
    $direccion = $_POST["direccion"];
    $sitioweb = $_POST["sitioweb"];
    $tipocuenta = $_POST["tipocuenta"];
    $numerocuenta = $_POST["numerocuenta"];
    $cargo = $_POST["cargo"];
  //$email = $_POST['email'];       SE CAE EL SISTEMA SI ACTUALIZO EL CORREO, es POR LA SESION.

    $mysqli->query("UPDATE datos_usuarios SET USERNAME = '{$username}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET RUT = '{$rut}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET TELEFONO = '{$telefono}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET BANCO = '{$banco}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET DIRECCION = '{$direccion}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET SITIO_WEB = '{$sitioweb}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET TIPO_CUENTA = '{$tipocuenta}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET NUMERO_CUENTA = '{$numerocuenta}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET CARGO = '{$cargo}' WHERE ID = $row[ID]");
    header('Location: ../vistas/perfil.php?mensaje=guardado');  //mensaje       
    
    
   
}


                                                          
    // $mysqli->query("INSERT INTO datos_usuarios (USERNAME, RUT, TELEFONO, BANCO, DIRECCION, SITIO_WEB, TIPO_CUENTA, NUMERO_CUENTA, CARGO) 
    // VALUES ('{$username}', '{$rut}', '{$telefono}','{$banco}', '{$direccion}', '{$sitioweb}','{$tipocuenta}', '{$numerocuenta}', '{$cargo}') WHERE ID = $row[ID] ");
                                                                                    



?>