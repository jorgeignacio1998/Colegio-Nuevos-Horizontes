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
        echo "<script>location.href='../views/login.php?mensaje=credenciales';</script>";
        die();

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

        // NIVEL 10 = INDEX DE PROFESOR REGULAR
        if($sentencia2['NIVEL'] == 10  ){
            header ('Location: ../profesor/index.php');
        }

          // NIVEL 10 = INDEX DEL Profesor JEFE
        if($sentencia2['NIVEL'] == 9  ){
            header ('Location: ../profesor_jefe/index.php');
        }

        if($sentencia2['NIVEL'] == 8  ){
            header ('Location: ../apoderado/index.php');
        }
        if($sentencia2['NIVEL'] == 7  ){
            header ('Location: ../sostenedor/index.php');
        }
        if($sentencia2['NIVEL'] == 6  ){
            header ('Location: ../director/index.php');
        }
        if($sentencia2['NIVEL'] == 5  ){
            header ('Location: ../subdirector_academico/index.php');
        }
        if($sentencia2['NIVEL'] == 4  ){
            header ('Location: ../subdirector_administrativo/index.php');
        }
        if($sentencia2['NIVEL'] == 3  ){
            header ('Location: ../asistente_admision/index.php');
        }
        if($sentencia2['NIVEL'] == 2  ){
            header ('Location: ../asistente_administracion/index.php');
        }


        // NIVEL 1 = INDEX DEL ADMIN
        if($sentencia2['NIVEL'] == 1  ){
            header ('Location: ../admin/bienvenido.php');
        }






        }
        


        
        
       