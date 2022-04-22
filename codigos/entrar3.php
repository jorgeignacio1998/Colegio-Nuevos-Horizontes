<?php
session_start(); //Paso 1 para utilizar sesiones
 require 'connect.php';

 $email = $_POST['email'];
 $password = $_POST['password'];
 $password = md5($password);
 $error = array();

            
 
    $validar_login = $mysqli->query("SELECT * FROM datos_usuarios WHERE EMAIL LIKE '{$email}'
     and  QPASSWORD = '{$password}' ");
    if(empty($validar_login->num_rows)){ 
        array_push($error, "Las credenciales no coinciden ");
        echo'
            <script>
            alert("Las credenciales no son validas");
            window.location = "../vistas/Login.php";
            </script>
        ';
        
        }else{ //si coinciden
        $_SESSION['usuario'] = $email;      //variable de sesion
        
        header("location: ../vistas/welcome.php");
        }
        exit;




 
?>