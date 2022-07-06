<?php 

include 'seguridad_director.php';    //BD, SEGURIDAD NIVEL, SESSION.


    $usuario_logueado = $_SESSION['usuario'];
    $datos_usuario = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$usuario_logueado}' LIMIT 1"); //obteniendo los datos
    $array = mysqli_fetch_array($datos_usuario, MYSQLI_ASSOC);  //colocando los datos del usuario en un array para asi luego gestionarlos de mejor manera,
 


?>


<style>
    h2{
        padding: 20px;
        margin: 10px;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="../styles/navside.css?<?php echo time(); ?>" >  <!-- CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/d8159ea47a.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@500&family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>        <!-- jquery -->
    <!-- Estos dos son para el rut verificador -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../codes/jquery.rut.js"></script>  
    <!-- Estos dos son para el rut verificador -->
    





    <!-- Tipo de letra Manrope Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&display=swap" rel="stylesheet">
    <!-- Tipo de letra Manrope Google -->

    <style>
      
      body{
        background-color: #fca311;  /* fallback for old browsers */
      }
  
  
      img {
      vertical-align: middle;
      border-style: none;
      }
  
      .container{
          background: #fbfbfb; 
          margin-top: 20px;
          font-family: 'Roboto', sans-serif;
      }
  
      .center{
             
              margin-right: -105px;
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
  
      .lab2{
        font-family: 'Akshar', sans-serif;
      }
  
      .hidden{
        visibility:hidden;
      }
     
  
      .circle{
      float: center;
      display: block;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      border: 3px solid #ccc;
      overflow: hidden;
      position: relative;
      box-sizing: border-box;
      margin-left: 14%;
      }
  
      .bajando{
     margin-top: 30%;
      }
  
      
      .segundo{
        margin-left: 6%;
      }
  
      .primeroo{
         margin-top: 4px;
      }
      .fas{
          z-index:+99999;
      }
      

  
  
      </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="background-color:fff;">
   
    

    <?php 
    include 'navside.php';

    ?>

<div class="text-center mt-4">
    <h2 style="color:steelblue;font-family: 'Manrope', sans-serif;font-weight: 600;display: inline;">Bienvenido <?php  echo $array['NOMBRE'];?></h2>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>







    <!-- Inicio RUT VERIFICADOR con Jquery -->   
    <script>
            $(function() {
                $("#_rut").rut().on('rutValido', function(e, rut, dv) {
                $('#_rut').attr('style','border-color:green');
                $('#_boton').removeClass('estilo_deshabilitado').removeAttr('disabled')
                });

                $("#_rut").rut().on('rutInvalido', function(e) {
                $('#_rut').val('').attr('style','border-color:red');
                $('#_boton').addClass('estilo_deshabilitado').attr('disabled','disabled')
                }); 

                $('#_boton').click(function(){ 


                })
            })
        </script>

           

        <!-- Termino RUT VERIFICADOR con Jquery -->  







<div class=" container-fluid ">   
   <div class="d-flex flex-wrap " >              
      <div class="container center shadow ">           
            <!-- formulario  Pintar FOTO  -->
            <form action="perfil/c_perfil.php"  enctype="multipart/form-data" method="POST"  class="row g-3 p-2">
              
               <div class="row justify-content-center ">

               

               <!--INICIO  MENSAJES MENSAJES MENSAJES MENSAJES -->

             

            
              

               <?php include 'perfil/sendAlertas.php';
               ?>





               <!--TERMINO  MENSAJES MENSAJES MENSAJES MENSAJES -->
             
                  <div class="col-md-3 p-4 container-avatar2 mt-3" >     
                     <br>
                     <div class="primeroo">

                        <label class="form-label lab" for="inp2">FOTO DE PERFIL</label>
                        <br><br>
                        <div class="circle" >               
                           <div class="avatar " >
                             
                             <?php
                                 if(file_exists('../images/'.$array['FOTO'])){ 
                                    echo '  <label for="input"  >      <img class="thumb" id="thumb"  src="../images/'.$array['FOTO'].'" style=" min-width:250px; max-height:250px; position: relative; top: 0px;"  for="input1"         alt="avatar"    >  </label>'; 
                                 } 
                                 if($array['FOTO'] == ''){
                                    echo '<label for="input"   ><img class="thumb" id="thumb" src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_960_720.png"
                                       style=" min-width:310px; position: relative; top: -50px; max-height: 250px;"  for="input1"         alt="avatar" ></label>';
                                 }
                              ?>
                           </div>       
                           <input type="file" class="hidden center"  name="imagen" id="input" >   <!------------------ INPUT FILE  -->
                           <i class="fas fa-camera"></i>              
                           <label for="input" > </label>   
                           <!-- arreglar esto pls -->
                        </div>  
                     </div>
                  </div>    <!-- Termino primer col 3 -->


                  
                  <div class="col-md-4 p-4  ml-5 segundo"> 
                        <div class="row mt-5 ">
                           <div class="col-12">
                              <label class="form-label lab" for="inp1">NOMBRE COMPLETO</label>
                              <input class="form-control p-2" type="text" name="nombre" value="<?php echo  $array['NOMBRE']; ?>" id="inp1" pattern="[a-zA-Z]{3-40}" ><br>
                           </div>
                           <div >
                              <label class="form-label lab" for="inp2">CORREO ELECTRÓNICO</label>
                              <input class="form-control p-2 " type="text" name="email"  value="<?php echo $array['EMAIL']; ?>"id="inp2"> <br>
                           </div>
                        </div>
   
   
                        <div class="row">
                           <div class="col-6">
                           <label class="form-label lab" for="_rut">RUT</label>
                           <input class="form-control p-2" type="text" name="rut" id="_rut" value="<?php echo  $array['RUT']; ?>">  <br>
                              
                           </div>
                           <div class="col-6 ">
                              <label class="form-label lab" for="inp3">TELÉFONO</label>
                              <input class="form-control p-2" type="text" name="telefono" value="<?php echo  $array['TELEFONO']; ?>" id="inp3">  
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

</div>



</body>
</html>


