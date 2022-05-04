<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/s1.css?<?php echo time(); ?>" >
    <title>login</title>
</head>
<body>


    <form action="../codes/c_login.php" method="POST"  class="form-register"  id="_formid">
       
        <h4  id="_titulo">Iniciar sesion</h4>

           
            <input   label="" type="email"    name="email"        placeholder= "Correo electronico"  id="_email" >
            <input   label="" type="password" name="password"     placeholder= "Contraseña"   id="_password">
           
            <br><br>
            <input type="submit" value="Ingresar" id="submit" > 
            <div class='olvidaste'> 
                <a href=''>¿Olvidaste tu contraseña?</a> <br>
            </div>

            
    </form>

  
    
</body>
</html>