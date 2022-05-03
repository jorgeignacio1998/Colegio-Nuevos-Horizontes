<title>Login del administrador</title>
<?php 
require '../components/head.php';
?>
<body>
    <form action="../codes/c_loginAdmin.php" method="POST"  class="form-register" id='formid' >

        <h4  id="_titulo">Login</h4>
        <input   label="" type="email"    name="email"        placeholder= "Correo Electronico"  id="_email" >
        <input   label="" type="password" name="password"     placeholder= "Contraseña"   id="_password">      <br><br>
        <input type="submit" value="Ingresar" id="submit" > 
        <div class='olvidaste'> 
            <a href='http://localhost/vistas/OlvidasteContrase%c3%b1a.php'>¿Olvidaste tu contraseña?</a> <br>
        </div>   

   </form>
</body>