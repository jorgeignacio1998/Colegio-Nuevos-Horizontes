<?php
require '../seguridad_subdirector.php';//base de datos y permisos 
$datos_usuario = $mysqli->query("SELECT * FROM usuarios ORDER BY NIVEL"); //obtiene datos de todos los usuarios MENOS los tipos de usuario Nivel 1 (servirá para pintar los datos en la tabla (250 fila))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestionar usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
    
    <!-- Estos dos son para el rut verificador -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../codes/jquery.rut.js"></script>  
    <!-- Estos dos son para el rut verificador -->
    
    <style>
      

     
        *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
}

body{
    background: #7F7FD5;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

.col1{
            Height:650px; overflow-y:scroll;
        }


    </style>
</head>
<body>











<!-- scripts para boostrap y popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    

<!-- Inicio del Navbar admin -->
<nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
        <div class="container-fluid ">
              <a href="bienvenido.php" class="navbar-brand">Admin</a>
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
                       <li> <a class="dropdown-item" href="../admin/gestionarUsuarios.php">Gestionar usuarios</a></li>
                       <li> <a class="dropdown-item" href="#">Opcion 2</a></li>
                       <li> <a class="dropdown-item" href="#">Opcion 3</a></li>
                       
                       <li> <a class="dropdown-item" href="../codes/logout.php">Cerrar sesión</a></li>
                       </ul>
                    </li>
                 </ul>
              </div>
        </div>
     </nav>
<!-- Termino del Navbar  admin -->   





<!-- Inicio filtros con Jquery -->   
    <script type="text/javascript">
        $(document).ready(function(){
            // $("#live_search").keyup(function(){             
                $(document).ready(function() {
                $("#id_curso").change(function() {

                // var selectedVal = $("#myselect option:selected").text();
                var selectedVal = $("#id_curso option:selected").val();
                //   alert($('#id_curso').val());
                //   alert(selectedVal);

                $.ajax({
            
                        url:"2.php",
                        method: "POST",
                        data: {variable:selectedVal},

                        success:function(data){
                            $("#searchResult3").html(data);
                            $("#searchResult3").css("display","block");
                        }

                    });
                });             
                });
        });
    </script>
<!-- Termino filtros con Jquery -->   












<!-- Inicio Gestor de usuarios--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-3">  

               <div  class="card ">
                 
                  


                   <form action="../admin/c_registrar.php" method="POST" class="p-4" >
                       

                        <div class="mb-3">
                            <label class="form-label lab" for="id_curso">Curso</label > 
                            <select name="curso" class="form-control"  required  id="id_curso" >
                                <option disabled selected value >  </option>
                                    <?php
                                    $sqlTipo = "SELECT *,
                                    cursos.ID as curid,
                                    cursos.NOMBRE as curnom,
                                    grados.NIVEL as graniv
                                    FROM cursos 
                                    INNER JOIN grados 
                                    ON cursos.ID_GRADO  = grados.ID";
                                    $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                <option value="<?php echo $data["curid"]; ?>"><?php echo utf8_encode($data['graniv'] . ' ' .$data['curnom'] ); ?>

                                    <?php } ?>
                            </select>  
                        </div>  



                        <div id="searchResult3">
                        
                        </div>


                   

                   </form>

               </div>
               <br>
           </div>
       </div>
   </div>
</body>
</html>