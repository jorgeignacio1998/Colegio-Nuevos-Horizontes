<?php
session_start(); //Paso 1 para utilizar sesiones
 require 'connect.php';

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
            window.location = "../index.php";
            </script>
        ';
        
        }else{ //si coinciden
        $query = "SELECT * FROM usuarios  WHERE EMAIL LIKE '{$email}' and  CONTRASENA = '{$password}'";
        $sentencia1 = $mysqli->query($query);
        $sentencia2 =mysqli_fetch_array($sentencia1);
        $id = $sentencia2['ID']; 
        $_SESSION['usuario'] = $id;      //variable de sesion




        //Las siguientes sentencias son para redirigir a los usuarios a sus vistas dependiendo su NIVEL

        // NIVEL 11 = INDEX DEL ALUMNO
        if($sentencia2['NIVEL'] == 11  ){
            header ('Location: ../alumno/index.php');
        }

        // NIVEL 10 = INDEX DEL Profesor JEFE
        if($sentencia2['NIVEL'] == 10  ){
            header ('Location: ../profesorJ/index.php');
        }
        // NIVEL 9 = INDEX DE PROFESOR REGULAR
        if($sentencia2['NIVEL'] == 9  ){
            header ('Location: ../profesor/index.php');
        }

        // NIVEL 1 = INDEX DEL ADMIN
        if($sentencia2['NIVEL'] == 1  ){
            header ('Location: ../admin/bienvenido.php');
        }






        }
        


        
        
       