<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/s1.css?<?php echo time(); ?>" >
    <title>Login Administrador</title>
</head>
<body>


    <form action="../codes/c_loginAdmin.php" method="POST"  class="form-register"  id="_formid">
       
        <h4  id="_titulo">Login</h4>

           
            <input   label="" type="email"    name="email"        placeholder= "Correo electronico"  id="_email" >
            <input   label="" type="password" name="password"     placeholder= "Contraseña"   id="_password">
           
            <br><br>
            <input type="submit" value="INGRESAR" id="submit" > 
            <div class='olvidaste'> 
                <a href=''>¿Olvidaste tu contraseña?</a> <br>
            </div>

            
    </form>


    
</body>
</html>