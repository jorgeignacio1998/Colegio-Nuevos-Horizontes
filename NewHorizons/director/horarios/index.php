<?php 
include '../seguridad_director.php';    //BD, SEGURIDAD NIVEL, SESSION.

$id_clase = '';
if(isset($_GET['id_clase'])) {
$id_clase = $_GET['id_clase'];
}

$horarios = $mysqli->query("SELECT *,dias.ID AS iddia  FROM horarios_clases INNER JOIN clases ON horarios_clases.ID_CLASE = clases.ID 
INNER JOIN dias ON dias.ID = horarios_clases.ID_DIA
WHERE clases.ID LIKE '{$id_clase}' ");


//   echo '<script language="javascript">alert("' .  $evaluaciones   . '");</script>';
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
    <script src="../../codes/jquery.rut.js"></script>  
    <!-- Estos dos son para el rut verificador -->
    
    <style>
      

     
        *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
}



.col1{
            Height:650px; overflow-y:scroll;
        }







    </style>
</head>
<body>


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

            <style>
                .estilo_deshabilitado { background:#aaa!important; }
            </style>

        <!-- Termino RUT VERIFICADOR con Jquery -->  



        <?php 
        include 'navside.php';
        ?>
    







<!-- scripts para boostrap y popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    





<!-- Inicio BUSQUEDA con Jquery -->   
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){

            var input = $(this).val();
            //alert(input);   

                $.ajax({

                    url:"liveSearch.php",
                    method: "POST",
                    data: {input:input},

                    success:function(data){
                        $("#searchResult").html(data);
                        $("#searchResult").css("display","block");
                    }

                });
         
        });

    });
</script>
<!-- Termino BUSQUEDA con Jquery -->   











<!-- Inicio Gestor de usuarios--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-7">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->


                <!--  1. Primera ALERTA, campos no vacios para el registro -->
           
                <!-- siguiendo con la estructura de la tabla (primer col) -->
               <div  class="card ">
                   <div class="card-header">
                       Lista de Horarios                                     
                       <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                   </div>

                   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                 
                                    <th scope="col">CLASE</th>
                                    <th scope="col">DIA</th>
                                    <th scope="col">HORA INICIO</th>
                                    <th scope="col">HORA TERMINO</th>
                               

                                    
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($horarios) ) {

                                    
                                ?>
                                <tr >

                                  
                                    <td scope="row"><?php echo $fila['NOMBRE']; ?></td>
                                    <td scope="row"><?php echo $fila['NOMBRE_DIA']; ?></td>
                                    <td scope="row"><?php echo $fila['HORA_INICIO']; ?></td>
                                    <td scope="row"><?php echo $fila['HORA_TERMINO']; ?></td>
                                    

                                    <td><a class="text-primary" href="editar.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a este usuario?')" class="text-danger" href="c_eliminar.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
                                    <!-- le envia por la url el id del usuario al c_eliminar -->
                                    
                                </tr>
                                <?php
                                }
                                ?>
                               
                            </tbody>
                       </table>
                   </div>
               </div>
               <br>  <br>
           </div> <!-- TERMINO PRIMER COL  --> 















           

           <div class="col-md-4">    <!-- INICIO SEGUNDO COL  -->
               <div class="card">
                 
                   <div class="card-header">
                       Ingresar datos:
                   </div>
                   <form action="c_registrar.php" method="POST" class="p-4" >
                        <div class="mb-3">
                            <label for="_1" class="form-label">Nombre completo: </label>
                            <input type="text" class="form-control" name="txtNombre" autofocus required id="_1">
                        </div>   
                                
                        <div class="mb-3">
                            <label for="_rut" class="form-label">Rut: </label>
                            <input  label="_rut" class="form-control" type="text" name="rut"  autofocus required id="_rut" >
                        </div>

                        <div class="mb-3">
                            <label for="_2" class="form-label">Correo electrónico: </label>
                            <input type="email" class="form-control" name="txtCorreo" autofocus required id="_2">
                        </div>
                        <div class="mb-3">
                            <label for="_5" class="form-label">Contraseña: </label>
                            <input type="password" class="form-control" name="txtPass" autofocus required id="_5">
                        </div>
                        
                        
                        <div class="d-grid mt-5">
                            <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>" >
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>

                   </form>

               </div>
               <br>
           </div>
       </div>
   </div>


    <!-- Bootstrap JavaScript Libraries -->

</body>
</html>