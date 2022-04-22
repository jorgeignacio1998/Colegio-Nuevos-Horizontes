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
if(isset($_POST['contraseña1']) &&
   isset($_POST['contraseña2'])){


    $contraseña1 = $_POST["contraseña1"];
    $contraseña2 = $_POST["contraseña2"];


    if(!empty($_POST['contraseña2'])){
        if($_POST['contraseña1'] != $_POST['contraseña2']){  
            array_push($error, "Las contraseñas no coinciden");
            echo'
             <script> 
                alert("Las contraseñas no coinciden");
                window.location = "../vistas/perfil.php";
             </script>
            ';
        }else{
            $contraseña1 = md5($contraseña1);  
            $mysqli->query("UPDATE datos_usuarios SET QPASSWORD = '{$contraseña1}' WHERE ID = $row[ID]");
            echo'
            <script> 
               alert("La contraseña ha sido restablecida exitosamente");
               window.location = "../vistas/perfil.php";
            </script>
           ';
        }
    } // Cambiando la contraseña
};



// Cambiando el telefono
if(isset($_POST['telefono'])){
    $telefono = $_POST["telefono"];

    $mysqli->query("UPDATE datos_usuarios SET TELEFONO = '{$telefono}' WHERE ID = $row[ID]");
   
}  






//subiendo imagen
if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])){

    echo 'No upload';
}else{
        echo 'uploaded ';
    
   
   
         // Recibo los datos de la imagen
        $nombre_img = $_FILES['imagen']['name'];
        $tipo = $_FILES['imagen']['type'];
        $tamano = $_FILES['imagen']['size'];
        
       
        //Si existe imagen y tiene un tamaño correcto
        if (!empty($nombre_img)) 
        {
            
            
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif")
            || ($_FILES["imagen"]["type"] == "image/jpeg")
            || ($_FILES["imagen"]["type"] == "image/jpg")
            || ($_FILES["imagen"]["type"] == "image/png"))
            {
                
            // Ruta donde se guardarán las imágenes que subamos
            $directorio = $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
            // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
            move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta.$nombre_img);
           
            } 
            else 
            {
                //si no cumple con el formato
                echo "No se puede subir una imagen con ese formato ";
            }
        } 

}























?>