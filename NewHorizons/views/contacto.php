






<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacto</title>
    <link rel="stylesheet" type="text/css" href="../styles/s1.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
</head>
<body> 
    <!-- scripts para boostrap y popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
<script src="https://www.google.com/recaptcha/api.js" async defer></script>    <!-- captcha -->









   

                                                <!-- FORMULARIO DE CONTACTO -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 ">


        
            <form  action="../codes/c_contacto.php" method="POST"  enctype="multipart/form-data "   class="form-register"  id="formid">
              




                <h4  id="_titulo"  >Contacto</h4>

                 <!-- 2.  alerta  mensaje enviado  exitosamente-->
               <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'exito') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>El mensaje fue enviado </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                 <!-- 2. alerta  mensaje enviado  exitosamente -->





                  <!-- 2.  alerta  error captcha   -->
               <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>El Captcha no ha sido realizado correctamente</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                 <!-- 2. aalerta  error captcha   -->



               
                <input    type="text" name="nombre"    placeholder="Nombre"   id="_nombre">
                <input    type="email" name="email"    placeholder="Correo electronico"   id="_email"           required  > 
                <textarea              name="mensaje"  placeholder="Mensaje" id="_mensaje"           required ></textarea   >  


                <div class="mb-3"> <!-- CAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="6Lc9qtkfAAAAALYqvcgRy83gZ2Qzmn9Pu1cTK3Ek">

                    </div>
                </div>

                <!--<label for='_archivo'>INGRESAR ARCHIVO(S)</label>
                <input type="file"  name="archivo[]" multiple id="_archivo" style='display:none;'> -->
                <br><br><input type="submit" value="Enviar" id="submit"> 

                
    
             </form>

             
        </div>
    </div>
        










<!-- 


    if(isset($_POST['g-recaptcha-response'])){
    $response = $_POST['g-recaptcha-response'];
}

function verify($response){
  $ip = $_SERVER['REMOTE_ADDR'];
  $key = '6Lc9qtkfAAAAALEPwbZNQR_bT0if8lKhdX9bHOl2';
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $full_url = $url.'?secret='.$key.'&response='.$response.'&remoteip='.$ip;

  $data = json_decode(file_get_contents($full_url));
  if(isset($data->success) && $data->success == true){
    
    echo '<script language="javascript">';
    echo 'alert(message successfully sent)';  //not showing an alert box.
    echo '</script>';
    exit;

  }else{
    echo 'chai';
  }

  
}
   
 -->










   <!-- este codigo es para hacerlo sin que se refresque la pagina -->


    <!-- <script type="text/javascript">

        $(document).ready(function() {
        $('#formid').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'correo.php',
            data: $(this).serialize(),
            success: function(data)
            {
                console.log('exito')

                if(data){
                    location.href = '#';

                }
 
                // user is logged in successfully in the back-end
                // let's redirect
                
                else
                {
                    alert('Error, formulario no enviado');
                }
           },
           error: function(result) {
            alert('error');
        }

       });
     });
});

    </script> -->


</body>
</html>