<?php  //seguridad de sesiones 
session_start(); //Paso 1 para utilizar sesiones
$usuario_logueado = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  echo'
        <script> 
              alert("Tienes que iniciar sesión para entrar");
              window.location = "../views/index.php";
        </script>
  ';
  
  session_destroy();
  die();
}


$datos_usuarios = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$sentencia2 = mysqli_fetch_array($datos_usuarios, MYSQLI_ASSOC); 

?>