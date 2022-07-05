
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Contacto</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
</head>
<body> 
    <!-- scripts para boostrap y popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
<script src="https://www.google.com/recaptcha/api.js" async defer></script>    <!-- captcha -->


<style>
    .texta{
    flex: auto;
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border-radius: 4px;
    font-family: 'calibri';
    font-size: 18px;
    color:black;
    height: 7rem;
    min-height: 10rem ;
    max-height: 7rem ;
    min-width: 250px;
    max-width: 800px;  
    }
    #_titulo {
    font-size: 28px;
    font-family: 'Roboto', sans-serif;
    font-family: 'Yanone Kaffeesatz', sans-serif;
    margin-bottom: 20px;
    text-align: center;
    }
    .navbar-nav .nav-item .nav-link {
    color: white;
    }

    .navbar-nav .nav-item.active .nav-link,
    .navbar-nav .nav-item:hover .nav-link {
    color: #efb85d;
    }

    .navbar-nav .nav-item.active .nav-link{
    color: #f0ad4e;
}

</style>


<!-- INICIO MENU -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid gx-5">
    <a class="navbar-brand" href="../index.php">
        <img src="../img/logo.png" width="100">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link fw-bolder" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder" href="../quienes.php">Quienes Somos</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link fw-bolder" href="contacto/index.php">Contacto</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <button type="button" class="btn btn-warning fw-bold text-dark"><a class="text-decoration-none" href="../views/login.php">INGRESAR</a></button>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- FIN MENU -->

   
          <br><br>                             <!-- FORMULARIO DE CONTACTO -->
<div class="container-fluid mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-4  col-sm-12">
   
            <?php 
            include 'alertContact.php';
            ?>

            <div  class="card">
                <div class=" card-header">

        
                <form  action="c_contacto.php" method="POST"    class="form-register"  >
                    <h4  id="_titulo"  >Contacto</h4>
                    <div class="row">
                        <div class="mb-3 col-md-6 col-sm-12 ">
                            <label for="2" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" autofocus required id="2">
                        </div> 
                        <div class="mb-3 col-md-6 col-sm-12">
                            <label for="1" class="form-label">Correo electrónico: </label>
                            <input type="email" class="form-control" name="email" autofocus required id="1">
                        </div>            
                    </div>
                    <div class="mb-3 ">
                        <label for="4" class="form-label">Mensaje:</label>
                        <textarea class="form-control texta" name="mensaje"  id="4"></textarea   > 
                    </div> 





                    <div class="mb-3"> <!-- CAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6Lc9qtkfAAAAALYqvcgRy83gZ2Qzmn9Pu1cTK3Ek">

                        </div>
                    </div>

                    
                        <center>
                            <div class="d-grid gap-2 col-6 mx-auto ">
                                <input type="submit" class="btn btn-primary " value="Enviar">
                            </div>
                        </center>       
                        <br> 
             

                    
        
                </form>
                </div>
             </div>
        </div>
    </div>
</div>
 <br><br><br><br>
<!-- INICIO FOOTER -->
<div class="container-fluid  ">

   <div class="row p-5 bg-dark text-white ">

      <div class="col-xs-12 col-md-6 col-lg-3">
         <p class="h4 text-info">Colegio Nuevos Horizontes</p>
         <img src="../img/logoeduCode.png" class="w-50 mb-4" alt="...">
      </div>

      <div class="col-xs-12 col-md-6 col-lg-3">
         <p class="h5 mb-3 mt-2">Covid-19</p>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://www.gob.cl/pasoapaso/cifrasoficiales/" target="_blank">Casos diarios</a>
         </div>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://sigamosaprendiendo.mineduc.cl/wp-content/uploads/2022/02/ProtocoloMedidasSanitariasEE-2022.pdf" target="_blank">Protocolos</a>
         </div>
      </div>

      <div class="col-xs-12 col-md-6 col-lg-3">
      <p class="h5 mb-3 mt-2">Links</p>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://www.jovenesprogramadores.cl/" target="_blank">Jovenes Programadores</a>
         </div>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://eligecultura.gob.cl/cultural-sections/" target="_blank">Material Cultural</a>
         </div>
      </div>

      <div class="col-xs-12 col-md-6 col-lg-3">
      <p class="h5 mb-3 mt-2">Contacto</p>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://wa.me/56941773713" target="_blank">+569 4177 3713</a>
         </div>
         <div class="mb-2">
         <a class="text-secondary text-decoration-none" href="https://wa.me/56988938757" target="_blank">+569 8893 8757</a>
         </div>
      </div>

   </div>

</div>
<!-- FIN FOOTER -->

</body>
</html>