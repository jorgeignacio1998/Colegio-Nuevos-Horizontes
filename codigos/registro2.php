<?php

    require 'connect.php';

        $error = array();

        if(isset($_POST['username']) && 
            isset($_POST['email']) &&
            isset($_POST ['password']) &&
            isset($_POST ['cpassword'])
            
            ) {
            
                if(empty($_POST['username'])){
                    array_push($error, "El nombre de usuario no puede estar vacío");
                }


                if(empty($_POST['email'])){
                    array_push($error, "El correo electronico no puede estar vacío ");
                }


                if(empty($_POST['password'])){
                    array_push($error, "La contraseña no puede estar vacía");
                }

                
                if($_POST['password'] != $_POST['cpassword']){  
                     array_push($error, "Las contraseñas no coinciden");
                }
                

            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password = md5($password);
            

            

            if (count($error)==0){ 
                $existencia = $mysqli->query("SELECT * FROM datos_usuarios WHERE USERNAME Like '{$username}' OR EMAIL LIKE '{$email}' ");
                if(empty($existencia->num_rows)){ 
                    $mysqli->query("INSERT INTO datos_usuarios (USERNAME, EMAIL, QPASSWORD) 
                    VALUES ('{$username}', '{$email}', '{$password}') ");
                    
                    echo'
                     <script> 
                          alert("Usuario registrado exitosamente");
                          window.location = "../vistas/Login.php";
                     </script>
   ';

                } else{ 
                    array_push($error, "El usuario o email ya existe en la base de datos");
                }
            } 
            
            
           include '../vistas/RegistroUsuarios.php';

        }

    
    ?>