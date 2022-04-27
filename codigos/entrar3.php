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


        $query = "SELECT * FROM datos_usuarios  WHERE EMAIL LIKE '{$email}' and  QPASSWORD = '{$password}'";
        $sentencia1 = $mysqli->query($query);
        //print_r($sentencia1);  no entrega nada importante la sentencia es importante para la segunda.
        $sentencia2 =mysqli_fetch_array($sentencia1);
        //print_r($sentencia2['NIVEL']);    nivel
        
        if($sentencia2['NIVEL'] == 1){
            header("location: ../vistas/usuarios.php");
        }

        if($sentencia2['NIVEL'] == 2){
            header("location: ../vistas/welcome.php");
        }
        
        if($sentencia2['NIVEL'] == 3){
            header("location: ../vistas/welcome.php");
        }
        
        


        

        }
        exit;




 
?>