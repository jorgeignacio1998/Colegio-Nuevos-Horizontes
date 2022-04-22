<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo.css?<?php echo time(); ?>" >
    <style>
        .estilo_deshabilitado { background:#aaa!important; }
        label[for=_archivo]{ background:green;color:#fff;padding:5px 10px; border-radius:5px; font-size:20px }
    </style>
</head>
<body>
    

    <?php 
        
        if(!empty($error)){
           echo "<div style='width:100%;max-width:300px;margin:0 auto;background:green;color:#fff;padding:5px 10px;'>" . implode('<br />', $error) . '</div>';
        }
    
    ?>
    <form action="../codigos/registro2.php" method="POST" enctype="multipart/form-data "   class="form-register"  id="formid">
       
        <h4  id="_titulo">Registrarse</h4>

            <br>
            <input   label="" type="text"  name="username"       placeholder= "Nombre completo"       id="_username" >
            <input   label="" type="email"  name="email"        placeholder= "Correo electronico"  id="_email" >
            <input   label="" type="password" name="password"     placeholder= "Contraseña"   id="_password">
            <input   label="" type="password"  name="cpassword"    placeholder= "Repetir contraseña"   id="_cpassword">
           
            <br><br>
            <input type="submit" value="Enviar" id="submit" > 
            <div class='olvidaste'> 
                <a href='http://localhost/vistas/Login.php'>¿Ya tienes cuenta?</a>
            </div>

            
    </form>
    


<script scr="main.js?<?php echo time(); ?>s"></script>
</body>
</html>