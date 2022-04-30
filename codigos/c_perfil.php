<?php
require 'connect.php';  //coneccion BD
session_start(); //Paso 1 para utilizar sesiones
//manejar los datos del usuario
$usuario_logueado = $_SESSION['usuario'];
$datos_usuario = $mysqli->query("SELECT * FROM datos_usuarios WHERE EMAIL LIKE '{$usuario_logueado}' LIMIT 1");
$row = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); 
#print_r($_POST);
$error = array();
$ruta = 'D:/XAMPP/htdocs/images/';





//Editar nombre
if(isset($_POST['nombre'])){

    //validacion campo nombre no este vacio
    if(empty($_POST['nombre'])){
    array_push($error, "El nombre de usuario no puede estar vacío");
    echo'
    <script> 
          alert("El nombre de usuario no puede estar vacío");
          window.location = "../vistas/perfil.php";
    </script> ';
                
    }
    if (count($error)==0){ 
        $username = $_POST["nombre"];
        $mysqli->query("UPDATE datos_usuarios SET USERNAME = '{$username}' WHERE ID = $row[ID]");
        // Editando nombre de usuario desde la vista 
    }
}



// editar la contraseña
if(isset($_POST['contraseña1'])){


    $contraseña1 = $_POST["contraseña1"];



    if(!empty($_POST['contraseña1'])){
            $contraseña1 = md5($contraseña1);  
            $mysqli->query("UPDATE datos_usuarios SET QPASSWORD = '{$contraseña1}' WHERE ID = $row[ID]");
            echo'
            <script> 
               alert("La contraseña ha sido restablecida exitosamente");
               window.location = "../vistas/perfil.php";
            </script>
           ';
    }
     // Cambiando la contraseña
    
};



// Cambiando el mayoria de datos
if(isset($_POST['telefono']) &&
isset($_POST['rut']) &&   
isset($_POST['banco']) &&
isset($_POST['direccion']) &&
isset($_POST['sitioweb']) &&
isset($_POST['tipocuenta']) &&    
isset($_POST['numerocuenta']) &&
isset($_POST['cargo'])
){



    $telefono = $_POST["telefono"];
    $rut = $_POST["rut"];
    $banco = $_POST["banco"];
    $direccion = $_POST["direccion"];
    $sitioweb = $_POST["sitioweb"];
    $tipocuenta = $_POST["tipocuenta"];
    $numerocuenta = $_POST["numerocuenta"];
    $cargo = $_POST["cargo"];


    $mysqli->query("UPDATE datos_usuarios SET TELEFONO = '{$telefono}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET RUT = '{$rut}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET BANCO = '{$banco}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET DIRECCION = '{$direccion}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET SITIO_WEB = '{$sitioweb}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET TIPO_CUENTA = '{$tipocuenta}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET NUMERO_CUENTA = '{$numerocuenta}' WHERE ID = $row[ID]");
    $mysqli->query("UPDATE datos_usuarios SET CARGO = '{$cargo}' WHERE ID = $row[ID]");
    header('Location: ../vistas/perfil.php?mensaje=guardado');  //mensaje

}  


    
    $nombre_img = $_FILES['imagen']['name'];
    if(!empty($nombre_img)){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],"../images/{$nombre_img}")){ 
            $mysqli->query("UPDATE datos_usuarios SET FOTO = '{$nombre_img}' WHERE ID = $row[ID]");
            header('Location: ../vistas/perfil.php?mensaje=guardado');  //mensaje

        }
    }


 
    
    
    
 
  















?>