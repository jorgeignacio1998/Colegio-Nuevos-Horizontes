<?php
require '../codes/connect.php';  //coneccion BD
session_start(); //Paso 1 para utilizar sesiones
//manejar los datos del usuario
$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$row = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); 






$error = array();
$ruta = 'D:/XAMPP/htdocs/NewHorizons/images/';
$regexTelefono = "/\A(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}\z/" ;














//1.- EDITAR CONTRASEÑA VALIDACIONES
if(isset($_POST['contraseña1'])){

    $contraseña1 = $_POST["contraseña1"];
    if(!empty($_POST['contraseña1'])){
        $contraseña1 = md5($contraseña1);  
        $mysqli->query("UPDATE usuarios SET CONTRASENA = '{$contraseña1}' WHERE ID = $row[ID]");

    }else{ // no muestra alerta porque esto ira en otro lado seguramente  LO ULTIMO QUE VOY A HACER.
    }
};
// fin EDITAR CONTRASEÑA VALIDACIONES













//2 .- EDITAR TELEFONO CON FORMATO, No es un campo obligatorio.
if(!empty($_POST['telefono'])){
    if(!preg_match("$regexTelefono", $_POST['telefono'])){
        array_push($error, "El formato del telefono es invalido");
        header('Location:  perfil.php?mensaje=error4'); //Enviandole ALERTA metodo GET(error4), REDIRECCION
    }else{
        echo 'Buen formato';
    }
}
//4.- EDITAR TELEFONO






$telefono = $_POST["telefono"];
$nombre_img = $_FILES['imagen']['name'];






if(count($error)==0)




{ 
    if(empty($nombre_img) and $telefono == $row['TELEFONO']  ){ 
    header('Location:  perfil.php?mensaje=error6'); //Enviandole ALERTA QUE NO SE HAN DETECTADO Cambios
    

    }else{

      
        $nombre_img = $_FILES['imagen']['name'];
        $mysqli->query("UPDATE usuarios SET TELEFONO = '{$telefono}' WHERE ID = $row[ID]");


        
        if(!empty($nombre_img)){
            if(move_uploaded_file($_FILES['imagen']['tmp_name'],"../images/{$nombre_img}")){ 
            $mysqli->query("UPDATE usuarios SET FOTO = '{$nombre_img}' WHERE ID = $row[ID]");
        }
        }

        header('Location: perfil.php?mensaje=guardado');  //mensaje 
        
    }


   
}

                                                                                    



?>