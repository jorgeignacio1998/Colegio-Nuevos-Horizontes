<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/s1.css?<?php echo time(); ?>" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../img/edufavicon.ico">
    <title>Login</title>
</head>
<style>
    #close { position:relative;     font-size: 30px; cursor: pointer; }
    #close:hover { position:relative;     font-size: 30px; cursor: pointer; color: #1f53c5; }

</style>
<body>
    
<div class="col-md-4 text-center mx-auto mt-5 mb-5">
    <a href="../index.php">
    <img src="../img/logoHorizontes.png" class="w-10" alt="...">
    </a>
    </div>

    <form action="../codes/c_login.php" method="POST"  class="form-register"  id="_formid">
        <div>
            <a href="../index.php"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a>
            <h4  id="_titulo">Iniciar Sesión</h4>
        </div>
        

           
            <input   label="" type="email"    name="email"        placeholder= "Correo electronico"  id="_email" >
            <input   label="" type="password" name="password"     placeholder= "Contraseña"   id="_password">
           
            <br><br>
            <input type="submit" value="Ingresar" id="submit" > 
            <!-- <div class='olvidaste'> 
                <a href=''>¿Olvidaste tu contraseña?</a> <br>
            </div> -->

            
    </form>

    <div class="col-md-4 text-center mx-auto mb-5 mt-5">
    <img src="../img/logoeduCode.png" class="w-50" alt="...">
    </div>

  
    
</body>
</html>