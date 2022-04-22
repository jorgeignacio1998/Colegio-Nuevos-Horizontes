<?php  //seguridad de sesiones 
session_start(); //Paso 1 para utilizar sesiones
 require '../codigos/connect.php';
$usuario_logueado = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
   echo'
         <script> 
               alert("Tienes que iniciar sesión para entrar");
               window.location = "Login.php";
         </script>
   ';
   
   session_destroy();
   die();
}



   
   $datos_usuario = $mysqli->query("SELECT * FROM datos_usuarios WHERE EMAIL LIKE '{$usuario_logueado}' LIMIT 1");
   $row = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC); 
   //print_r($row['ID']);


   ## listado de usuarios registrados

   
   
   // $datos_usuario2 = $mysqli->query("SELECT * FROM datos_usuarios ");
   // $row2 = mysqli_fetch_array($datos_usuario2, MYSQLI_ASSOC);  
   // print_r($rows);


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mi perfil</title>

   <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>

  
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet"> 


    <style>
      
    body{
        background: #7F7FD5;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }


    img {
    vertical-align: middle;
    border-style: none;
    }

    .container{
        background: white; 
        margin-top: 70px;
        font-family: 'Roboto', sans-serif;
    }


    h4{
        font-family: 'Roboto', sans-serif;
    }

    .lab{
      font-family: 'Akshar', sans-serif;

      
    }

    .circle{
    float: left;
    display: block;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    border: 3px solid #ccc;
    overflow: hidden;
    position: relative;
    box-sizing: border-box;
    }

 



    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <!-- Inicio del Navbar -->

 <div class="container-fluid ">
      <nav class="navbar navbar-dark bg-primary navbar-expand-md border-primary">
         <div class="container-fluid">
               <a href="welcome.php" class="navbar-brand">Inicio</a>
               <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNav" >
                  <span class="navbar-toggler-icon"></span>
               </button>
               
               <div id="MenuNav" class="collapse navbar-collapse d-flex flex-row-reverse">
                  <ul class="navbar-nav" ms-3>
                     <!--  <li class="nav-item"> <a class="nav-link" href="perfil.php">Perfíl</a></li> -->
                     
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                           Opciones de soporte
                        </a>
                        <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="perfil.php">Perfíl</a></li>
                        <li> <a class="dropdown-item" href="#">Opcion 2</a></li>
                        <li> <a class="dropdown-item" href="#">Opcion 3</a></li>
                        <li> <a class="dropdown-item" href="../codigos/logout.php">Cerrar sesión</a></li>
                        </ul>
                     </li>
                     
                     
                  </ul>
               </div>
         </div>
      </nav>
   </div> 
   <!-- Termino del Navbar  -->
  <div class="d-flex flex-wrap " style="">      
        <div class="container ">








                <!-- formulario  -->
               <form action="../codigos/c_perfil.php"  enctype="multipart/form-data" method="POST"  class="row g-3 p-2 mt-4">


                  <div class="col-md-3 p-4 mt-3 container-avatar">
                     <label for="file" style="position:relative;float:left;cursor:pointer;"></label>
                     <input type="file" id="file" name="imagen">           <!------------------ INPUT FILE -->
                     
                     <div class="circle">
                        <div class="avatar">
                           <img class="thumb" id="thumb" src="https://mox.cl/thumb/250-anonymous.png" alt="avatar">
                        </div>
                        
                        <i class="fas fa-camera"></i>
                     </div>   
                  </div>    <!-- Termino primer col 3 -->



                  <div class="col-md-4 p-4">

                     <h4>Informacion Personal</h4>
                     <br>
                     <label class="form-label lab" for="inp1">NOMBRE COMPLETO</label>
                     <input class="form-control p-2" type="text" name="nombre" value="<?php echo  $row['USERNAME']; ?>" id="inp1"><br>
                     


                        <div class="row">
                           <div class="col-8">
                                    
                              <label class="form-label lab" for="inp2">CORREO ELECTRÓNICO</label>
                              <input class="form-control p-2 " type="text" name="email" value="<?php echo $row['EMAIL']; ?>"id="inp2">
                           </div>
                           <div class="col-4 ">
                              <label class="form-label lab" for="inp3">TELÉFONO</label>
                              <input class="form-control p-2" type="text" name="telefono" value="<?php echo  $row['TELEFONO']; ?>" id="inp3">  
                              <br>
                           </div>
                        </div>


                        <div class="row">
                           <div class="col-6">
                                 
                           <label class="form-label lab lab" for="inp4">RESTABLECER CONTRASEÑA</label>
                           <input class="form-control p-2" type="password" name="contraseña1" id="inp4">
                           </div>
                           <div class="col-6 ">
                               <label class="form-label lab" for="inp4">REPETIR CONTRASEÑA</label>
                               <input class="form-control p-2" type="password" name="contraseña2" id="inp4">
                               <br>
                           </div>
                        </div>
                        
                     

                  </div>  <!-- Termino segunda col 4 -->

                  <div class="col-md-4 p-4">
                     <h4>Informacion Laboral</h4>
                     <br>
                     <label class="form-label lab"         for="inp5">DIRECCIÓN</label>
                     <input class="form-control p-2" type="text" name="direccion" id="inp5"><br>
                     

                        <div class="row">
                           <div class="col-6">
                                 
                              <label class="form-label lab" for="inp6">BANCO</label>
                              <input class="form-control p-2 " type="text" name="banco" id="inp6">
                           </div>
                           <div class="col-6 ">
                               <label class="form-label lab" for="inp7">RUT</label>
                               <input class="form-control p-2" type="text" name="rut" id="inp7">  
                               <br>
                           </div>
                        </div>
                     
                     <label class="form-label lab"         for="inp8">SITIO WEB</label>
                     <input class="form-control p-2" type="text" name="sitioweb" id="inp8"><br>

                  </div>  <!-- Termino tercera col 4 -->


                  <div class="col-12 d-flex justify-content-center">
                     <button class="btn btn-primary btn-lg"  name="submit" type="submit">Guardar cambios</button>
                  </div>



               </form> <!-- Termino Form -->
            









            
            <br><br> <br> <br> <br>

            <div class="row mt-2 p-12 ">
               <div class="col-12 ">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur a fuga exercitationem laboriosam soluta rem enim? Iusto corrupti nesciunt accusantium facilis ullam perspiciatis repudiandae culpa recusandae. Vero dolorem cumque aliquam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor, et placeat doloremque vero amet aperiam illum corrupti? Dolore magni natus, a sed placeat nesciunt possimus assumenda nemo tempore similique fugit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum consequuntur dolore blanditiis alias praesentium cupiditate illum tempora, eos ex voluptates nesciunt beatae inventore repudiandae deleniti, totam rem exercitationem. Saepe, nihil.
               </div>
            </div>




        </div>         
  </div>







</body>
</html>