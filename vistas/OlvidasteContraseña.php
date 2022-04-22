<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de recuperar contraseña</title>
    <link rel="stylesheet" type="text/css" href="../estilos/estilo.css?<?php echo time(); ?>" >
</head>
<body>

<?php 
        
    if(!empty($error)){
           echo "<div style='width:100%;max-width:300px;margin:0 auto;background:green;color:#fff;padding:5px 10px;'>" . implode('<br />', $error) . '</div>';
    }
    
?>




    <form action="../codigos/restablecer1.php" method="POST" class="form-register"  id="formid">
       
        <h4  id="_titulo">Restablecer contraseña</h4>       
        <label for="_email">Ingresa tu correo electrónico</label> <br><br>
       
        <input   label="" type="text"  name="email"       placeholder= "Correo electronico"       id="_email" >
        
          
        <br><br>
        <div class="botones">
            <a class="salir" href="http://localhost/vistas/RegistroUsuarios.php">Cancelar</a>
            <input type="submit"  class="button"  value="Enviar"> 
        </div>
        
          

   </form>



    
</body>
</html>