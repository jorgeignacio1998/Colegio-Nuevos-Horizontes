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

   <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>        <!-- jquery -->
   <script src="../assets/jquery.rut.js"></script>     <!-- aca carga el archivo rut.js -->



   <!-- usando funciones de si el rut es valido -->
   <script>
    $(function() {
        $("#_rut").rut().on('rutValido', function(e, rut, dv) {
           $('#_rut').attr('style','border-color:green');
           
          
        });

        $("#_rut").rut().on('rutInvalido', function(e) {
           $('#_rut').val('').attr('style','border-color:red');
           
        }); 
    });
    </script>
  





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

    .fp{
      text-align: center;
    }

    .lab{
      font-family: 'Akshar', sans-serif;


      
    }
    .hidden{
      visibility:hidden;
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
                        <li> <a class="dropdown-item" href="usuarios.php">Gestionar usuarios</a></li>
                        <li> <a class="dropdown-item" href="#">Opcion 3</a></li>
                        <li> <a class="dropdown-item" href="../codigos/logout.php">Cerrar sesión</a></li>
                        </ul>
                     </li>
                     
                     
                  </ul>
               </div>
         </div>
      </nav> <!-- Termino del Navbar  -->

   

      <div class=" mt-4 container-fluid">   
         <div class="d-flex flex-wrap " >              
            <div class="container ">           
                  <!-- formulario  Pintar FOTO  -->
                  <form action="../codigos/c_perfil.php"  enctype="multipart/form-data" method="POST"  class="row g-3 p-2 mt-4">
                     <div class="row justify-content-center">

                     

                     <!--INICIO  MENSAJES MENSAJES MENSAJES MENSAJES -->
                     <!-- CAMBIOS REALIZADOS CON EXITO -->

                     <?php
                     if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'guardado') {
                     ?>

                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>CAMBIOS REALIZADOS CON EXITO!</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     
                     <?php
                     }
                     ?>
                                    
                     <!-- CAMBIOS REALIZADOS CON EXITO-->






                     <!-- MENSAJE ERROR FORMATO DE NOMBRE  -->
                                    <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error1') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>ERROR, FORMATO INVALIDO.</strong> <br> El nombre NO puede estar vacio o contener simbologias ni numeros.
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?>

                     <!-- MENSAJE ERROR FORMATO DE NOMBRE  -->








                      <!-- MENSAJE NO NUMEROS NI SIMBOLOS  -->

                                    <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error3') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>ERROR, FORMATO INVALIDO.</strong> <br> El correo electronico NO cumple con el formato requerido ni menos puede estar vacio. 
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?>

                     <!-- MENSAJE NO NUMEROS NI SIMBOLOS -->









                     <!-- MENSAJE  FORMATO MALO DEL TELEFONO-->
                   
                     <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error4') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>ERROR, FORMATO INVALIDO.</strong> <br> El numero telefonico NO cumple con el formato requerido.
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?> 

                     <!-- MENSAJE  FORMATO MALO DEL TELEFONO  -->






                     
                     <!-- MENSAJE  FORMATO RUT-->
                   
                     <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error5') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>RUT MALO.</strong> <br> El rut NO cumple con el formato requerido.
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?> 

                     <!-- MENSAJE  FORMATO RUT  -->

                  













                     <!--TERMINO  MENSAJES MENSAJES MENSAJES MENSAJES -->
                        <div class="col-md-3 p-4 container-avatar" >
                           <br><br>
                           <div class="circle" >               
                              <div class="avatar" >
                                
                                 <?php
                                    if(file_exists('../images/'.$row['FOTO'])){ 
                                       echo '  <label for="input"  >      <img class="thumb" id="thumb"  src="/images/'.$row['FOTO'].'" style=" min-width:250px; max-width:250px; position: relative; top: 0px;  left: 0px;"  for="input1"         alt="avatar"    >  </label>'; 
                                    } 
                                    if($row['FOTO'] == ''){
                                       echo '<label for="input"   ><img class="thumb" id="thumb" src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_960_720.png"  
                                          style=" min-width:310px; max-width:100%; position: relative; top: -50px;  left: -35px;"  for="input1"         alt="avatar" ></label>';         
                                    }      
                                 ?>
                              </div>       
                              <input type="file" class="hidden"  name="imagen" id="input" >   <!------------------ INPUT FILE  -->
                              <i class="fas fa-camera"></i>              
                              <label for="input" > </label>
                           </div>  
                        </div>    <!-- Termino primer col 3 -->


                        
                        <div class="col-md-4 p-4"> 
                              <div class="row mt-5">
                                 <div class="col-12">
                                    <label class="form-label lab" for="inp1">*NOMBRE COMPLETO</label>
                                    <input class="form-control p-2" type="text" name="nombre" value="<?php echo  $row['USERNAME']; ?>" id="inp1" pattern="[a-zA-Z]{3-40}" ><br>
                                 </div>
                                 <div >
                                    <label class="form-label lab" for="inp2">*CORREO ELECTRÓNICO</label>
                                    <input class="form-control p-2 " type="text" name="email" value="<?php echo $row['EMAIL']; ?>"id="inp2"> <br>
                                 </div>
                              </div>
         
         
                              <div class="row">
                                 <div class="col-6">
                                 <label class="form-label lab" for="_rut">*RUT</label>
                                 <input class="form-control p-2" type="text" name="rut" id="_rut" value="<?php echo  $row['RUT']; ?>">  <br>
                                    
                                 </div>
                                 <div class="col-6 ">
                                    <label class="form-label lab" for="inp3">TELÉFONO</label>
                                    <input class="form-control p-2" type="text" name="telefono" value="<?php echo  $row['TELEFONO']; ?>" id="inp3">  
                                    <br>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-12">
                                       
                                    <label class="form-label lab" for="inp4" >CAMBIAR CONTRASEÑA</label>
                                    <input class="form-control p-2" type="password" name="contraseña1" id="inp4">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="mostrar()">        
                                       <label class="form-check-label" for="flexCheckDefault">
                                          Mostrar contraseña
                                       </label>
                                    </div>
                                 </div>
                                 <!-- <div class="col-6 ">
                                    <label class="form-label lab" for="inp4">REPETIR CONTRASEÑA</label>
                                    <input class="form-control p-2" type="password" name="contraseña2" id="inp4">
                                 </div> -->
         
                               
                              </div>
                              
                           </div>  <!-- Termino segunda col 4 --> 
                           
                                          <div class="col-md-4 p-4  "> 
                                          
                                                <div class="row mt-5"> 
                                                   <div class="col-12" >                                               
                                                      <label class="form-label lab" for="inp9">CARGO</label>
                                                      <input class="form-control p-2 " type="text" name="cargo" id="inp9" value="<?php echo  $row['CARGO']; ?>"> </BR>
                                                   </div>
                                                   <div class="col-12">
                                                      <label class="form-label lab"         for="inp5">DIRECCIÓN</label>
                                                      <input class="form-control p-2" type="text" name="direccion" id="inp5" value="<?php echo  $row['DIRECCION']; ?>"> <br>
                                                   </div>
                                                </div>



                                                <div class="row">
                                                      <div class="col-6"> 
                                                         <label class="form-label lab"    for="inp8">SITIO WEB</label>
                                                         <input class="form-control p-2" type="text" name="sitioweb" id="inp8" value="<?php echo  $row['SITIO_WEB']; ?>"><br>
                                                      </div>

                                                      <div class="col-6 ">
                                                      <label class="form-label lab" for="idbanco">BANCO</label > 
                                                      <?php  $opciones = array('BANCO ESTADO','SCOTIABANK CHILE','BANCO DE CREDITO E INVERSIONES','BANCO SANTANDER','BANCO DE CHILE');
                                                             $seleccionado = $row['BANCO'];
                                                      echo'
                                                      <select class="form-select" aria-label="Disabled select example"  name="banco"  id="idbanco">';
                                                     
                                                       foreach($opciones as $opcion){
                                                          
                                                         if($seleccionado == $opcion){
                                                            echo "<option selected='$seleccionado'           value='$opcion'>$opcion</option>";
                                                         }else{
                                                            echo "<option        value='$opcion'>$opcion</option>";
                                                         }
                                                       }
                                                       echo"</select>"
                                                      ?>
                                                      </div>
                                                </div>



                                                <div class="row">
                                                      <div class="col-6">
                                                        <label class="form-label lab" for="inp8">TIPO DE CUENTA</label>
                                                        <?php  $opciones = array('Cuenta corriente','Cuenta vista','Cuenta de ahorro','Cuenta RUT');
                                                             $seleccionado = $row['TIPO_CUENTA'];
                                                      echo'
                                                      <select class="form-select" aria-label="Disabled select example"  name="tipocuenta"  id="inp8">';
                                                     
                                                       foreach($opciones as $opcion){
                                                          
                                                         if($seleccionado == $opcion){
                                                            echo "<option selected='$seleccionado'           value='$opcion'>$opcion</option>";
                                                         }else{
                                                            echo "<option        value='$opcion'>$opcion</option>";
                                                         }
                                                       }
                                                       echo"</select>"
                                                      ?>
                                                        
                                                      </div>
                                                      <div class="col-6 ">
                                                         <label class="form-label lab" for="inp99">NUMERO DE CUENTA</label>
                                                         <input class="form-control p-2" type="text" name="numerocuenta" id="inp99" value="<?php echo  $row['NUMERO_CUENTA']; ?>">  
                                                         <br>
                                                      </div>
                                                </div>
                                             
                                             
                           
                                          </div>  <!-- Termino tercera col 4 --> 
                     </div> <!-- Row principal -->
        
                     <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-primary btn-lg mt-2 estilo_deshabilitado"  name="submit" type="submit" id="_boton"  >Guardar cambios</button>
                     </div>
                  </form> <!-- Termino Form -->








<!-- mostrar contraseña  con el checkbox-->
<script type="text/javascript">
   function mostrar(){
      var tipo = document.getElementById("inp4");  //le puse la id del input de la contraseña.
      if(tipo.type == "password"){
         tipo.type = 'text';

      }else{
         tipo.type = 'password';
      }

   }
</script>
<!-- mostrar contraseña -->




            <br>
            </div> <!-- Termino CONTAINER -->    
      </div>
      <br><br> <br> <br> 
</div>  <!-- Termino CONTAINER 1 -->    
</body>
</html>