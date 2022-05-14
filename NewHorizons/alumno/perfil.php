<?php  //seguridad de sesiones 

include 'seguridad_alumno.php';    //BD, SEGURIDAD NIVEL, SESSION.
$usuario_logueado = $_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
   echo'
         <script> 
               alert("Tienes que iniciar sesión para entrar");
               window.location = "../views/login.php";
         </script>
   ';
   
   session_destroy();
   die();
}



   
   $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1");
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


   

      <div class=" mt-4 container-fluid">   
         <div class="d-flex flex-wrap " >              
            <div class="container ">           
                  <!-- formulario  Pintar FOTO  -->
                  <form action="c_perfil.php"  enctype="multipart/form-data" method="POST"  class="row g-3 p-2 mt-4">
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



                       
                     <!-- PASS CHANGED -->

                     <?php
                     if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'pass') {
                     ?>

                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SE HA CAMBIADO LA CONTRASEÑA</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     
                     <?php
                     }
                     ?>
                                    
                     <!-- PASS CHANGED -->



















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








                     <!-- MENSAJE  sin cambios -->
                   
                         <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error6') {
                                    ?>

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                       <strong>NO SE HAN REALIZADO CAMBIOS </strong> <br>
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                        ?> 

                      <!-- MENSAJE  sin cambios -->
                  













                     <!--TERMINO  MENSAJES MENSAJES MENSAJES MENSAJES -->
                        <div class="col-md-3 p-4 container-avatar" >
                           <br><br>
                           <div class="circle" >               
                              <div class="avatar" >
                                
                                 <?php
                                    if(file_exists('../images/'.$row['FOTO'])){ 
                                       echo '  <label for="input"  >      <img class="thumb" id="thumb"  src="../images/'.$row['FOTO'].'" style=" min-width:250px; max-width:250px; position: relative; top: 0px;  left: 0px;"  for="input1"         alt="avatar"    >  </label>'; 
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
                                    <label class="form-label lab" for="inp1">NOMBRE COMPLETO</label>
                                    <input class="form-control p-2" type="text" name="nombre"  disabled value="<?php echo  $row['NOMBRE']; ?>" id="inp1" pattern="[a-zA-Z]{3-40}" ><br>
                                 </div>
                                 <div >
                                    <label class="form-label lab" for="inp2">CORREO ELECTRÓNICO</label>
                                    <input class="form-control p-2 " type="text" name="email"  disabled  value="<?php echo $row['EMAIL']; ?>"id="inp2"> <br>
                                 </div>
                              </div>
         
         
                              <div class="row">
                                 <div class="col-6">
                                 <label class="form-label lab" for="_rut">RUT</label>
                                 <input class="form-control p-2" type="text" name="rut" id="_rut"  disabled value="<?php echo  $row['RUT']; ?>">  <br>
                                    
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
                                                      <label class="form-label lab" for="inp9">SEDE</label>
                                                      <input class="form-control p-2 " type="text" disabled  name="cargo" id="inp9" value=""> </BR>
                                                   </div>
                                                   <div class="col-12">
                                                      <label class="form-label lab"         for="inp5">CURSO</label>
                                                      <input class="form-control p-2" type="text" disabled  name="direccion" id="inp5" value="" ?> <br>
                                                   </div>
                                                </div>



                                                <div class="row">
                                                      <div class="col-6"> 
                                                         <label class="form-label lab"    for="inp8">DATO </label>
                                                         <input class="form-control p-2" type="text"   name="sitioweb" id="inp8" value=""><br>
                                                      </div>

                                                      <div class="col-6 ">
                                                         <label class="form-label lab" for="123">DATO</label > 
                                                         <input class="form-control p-2" type="text" name="sitioweb" id="123" value=""><br>
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
      </div>       <br><br> <br> <br> 
     
</div>  <!-- Termino CONTAINER 1 -->    
</body>
</html>