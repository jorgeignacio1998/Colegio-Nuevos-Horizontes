<?php
session_start();
if(isset($_SESSION['usuario'])){
    header("location: welcome.php ");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo.css?<?php echo time(); ?>" >
    <title>Document</title>
</head>
<body>


    <form action="../codigos/entrar3.php" method="POST"  class="form-register"  id="formid">
       
        <h4  id="_titulo">Login</h4>

           
            <input   label="" type="email"    name="email"        placeholder= "Correo Electronico"  id="_email" >
            <input   label="" type="password" name="password"     placeholder= "Contraseña"   id="_password">
           
            <br><br>
            <input type="submit" value="Ingresar" id="submit" > 
            <div class='olvidaste'> 
                <a href='http://localhost/vistas/OlvidasteContrase%c3%b1a.php'>¿Olvidaste tu contraseña?</a> <br>
                <a href='http://localhost/vistas/RegistroUsuarios.php'>Crear cuenta </a>
            </div>

            
    </form>











    
</body>
</html>