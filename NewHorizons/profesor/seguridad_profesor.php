<?php  //seguridad de sesiones 
include '../codes/connect.php'; 
session_start(); //Paso 1 para utilizar sesiones
$usuario_logueado = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  echo'
        <script> 
              alert("tienes que iniciar sesion para entrar");
              window.location = "../views/login.php";
        </script>
  ';
  
  session_destroy();
  die();
}


$datos_usuarios = $mysqli->query("SELECT * FROM profesores WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
$sentencia2 = mysqli_fetch_array($datos_usuarios, MYSQLI_ASSOC); 


if($sentencia2['NIVEL'] == 10){                  
//deja entrar al alumno y al admin
}else{
      echo'
      <script> 
            alert("No tienes permiso para entrar");
            window.location = "../index.php";
      </script>
';
   
}



?>

