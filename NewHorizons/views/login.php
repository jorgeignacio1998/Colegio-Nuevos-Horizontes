<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/s1.css?<?php echo time(); ?>" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>login</title>
</head>
<style>
    #close { position:relative;     font-size: 30px; cursor: pointer; }
    #close:hover { position:relative;     font-size: 30px; cursor: pointer; color: #1f53c5; }

</style>
<body>
    

    <br><br><br><br>
    <form action="../codes/c_login.php" method="POST"  class="form-register"  id="_formid">
        <div>
            <a href="../index.php"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a>
            <h4  id="_titulo">  Iniciar sesion</h4>
        </div>
        

           
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