<?php
session_start(); //Paso 1 para utilizar sesiones
require '/XAMPP/htdocs/tienda/codes/connect.php';





 $email = $_POST['email'];
 $password = $_POST['password'];
 $password = md5($password);
 $error = array();

            
 
    $validar_login = $mysqli->query("SELECT * FROM usuarios WHERE EMAIL LIKE '{$email}'
     and  CONTRASENA = '{$password}' ");

     
    if(empty($validar_login->num_rows)){ 
        array_push($error, "Las credenciales no coinciden ");
        echo'
            <script>
            alert("Las credenciales no son validas");
            window.location = "login.php";
            </script>
        ';
        
        }else{ //si coinciden
        $query = "SELECT * FROM usuarios  WHERE EMAIL LIKE '{$email}' and  CONTRASENA = '{$password}'";
        $sentencia1 = $mysqli->query($query);
        $sentencia2 =mysqli_fetch_array($sentencia1);
        if($sentencia2['NIVEL'] == 1){
            $id = $sentencia2['ID']; 
            $_SESSION['usuario'] = $id;      //variable de sesion
            header("location: index.php");
        }else{
        array_push($error, "INTRUSO DETECTADO");
        echo'
            <script>
            alert("Tu direccion IP se ha registrado en la Base de datos, colaboramos con la policia de investigaciones");
            window.location = "login.php";
            </script>
        ';

        }
        }
        


 
?>