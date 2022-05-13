<?php  //seguridad de sesiones Y BD
include '/XAMPP/htdocs/tienda/codes/connect.php'; 
session_start(); //Paso 1 para utilizar sesiones
$usuario_logueado = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  echo'
        <script> 
              alert("no tienes permiso para entrar");
              window.location = "./index.php";
        </script>
  ';
  
  session_destroy();
  die();
}


$datos_usuarios = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$sentencia2 = mysqli_fetch_array($datos_usuarios, MYSQLI_ASSOC); 


if($sentencia2['NIVEL'] == 1){
//nada, solo dejar entrar.
}else{
      echo'
      <script> 
            alert("No tienes permiso para entrar");
            window.location = "./index.php";
      </script>
';
   
}



?>

