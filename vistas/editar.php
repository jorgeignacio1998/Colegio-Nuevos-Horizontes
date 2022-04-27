<?php
session_start(); // SESSIONES
require '../codigos/connect.php';  //BD
$usuario_logueado = $_SESSION['usuario'];   
if(!isset($_SESSION['usuario'])){
  echo'
        <script> 
              alert("Tienes que iniciar sesión para entrar");
              window.location = "Login.php";
        </script>
  ';
} //El graciosito que quiere entrar sin permiso. validacion 1.




// 
$codigo = $_GET['codigo'];
if(!isset($_GET['codigo'])) {

    header('Location: usuarios.php?mensaje=error');
    exit();
}


//Pintando datos Del ID = GET
$query = "SELECT USERNAME, EMAIL, TELEFONO, RUT FROM datos_usuarios  WHERE ID = $codigo ";
$sentencia1 = $mysqli->query($query);
//print_r($sentencia1);  no entrega nada importante la sentencia es importante para la segunda.
$sentencia2 =mysqli_fetch_array($sentencia1);
//print_r($sentencia2);   //TIENE LOS DATOS ahora se pintan en lo value.
?>















<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body{
        background: #7F7FD5;  
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }






</style>
  </head>
  <body>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>




                



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="">Editar datos</h3>
                </div>
                <form action="../codigos/c_editar.php" method="POST" class="p-4" >
                    <div class="mb-3">
                        <label for="_1" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required id="_1" value="<?php echo $sentencia2['USERNAME'];  ?>">
                    </div>
                    <div class="mb-3">
                        <label for="_2" class="form-label">Correo electrónico: </label>
                        <input type="email" class="form-control" name="txtCorreo" autofocus required id="_2" value="<?php echo $sentencia2['EMAIL'];  ?>" >
                    </div>
                    <div class="mb-3">
                        <label for="_3" class="form-label">Rut: </label>
                        <input type="text" class="form-control" name="txtRut" autofocus required id="_3" value="<?php echo $sentencia2['RUT'];  ?>" >
                    </div>
                    <div class="mb-4">
                        <label for="_4" class="form-label">Numero teléfonico: </label>
                        <input type="text" class="form-control" name="txtTelefono"  id="_4" autofocus required value="<?php echo $sentencia2['TELEFONO'];  ?>" >
                    </div>
                    <div class="d-grid">
                        <input type="hidden"  name="codigo" value="<?php echo $codigo;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
                        <input type="submit" class="btn btn-primary" value="Guardar cambios">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>