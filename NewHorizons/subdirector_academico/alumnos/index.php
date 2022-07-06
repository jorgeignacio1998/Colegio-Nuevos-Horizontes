<?php
require '../seguridad_subdirector.php';
$datos_matriculados = $mysqli->query("SELECT *,
grados.NIVEL as graniv,
periodos.ANO as periano,
periodos.SEMESTRE as perise,
matriculados.ID as matrid,
apoderados.NOMBRE as aponom,
apoderados.RUT as aporut
FROM matriculados 
INNER JOIN grados 
ON matriculados.ID_GRADO = grados.ID
INNER JOIN periodos
ON matriculados.ID_PERIODO = periodos.ID
INNER JOIN apoderados
ON matriculados.ID = apoderados.ID_MATRICULADO
ORDER BY ID_GRADO "); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestionar Alumnos</title>
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


    <!-- Inicio RUT VERIFICADOR con Jquery (alumno)  -->   
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

    <!-- Inicio RUT VERIFICADOR con Jquery (apoderado)  -->   
        <script>
            $(function() {
                $("#_rut1").rut().on('rutValido', function(e, rut, dv) {
                $('#_rut1').attr('style','border-color:green');
                $('#_boton').removeClass('estilo_deshabilitado').removeAttr('disabled')
                });

                $("#_rut1").rut().on('rutInvalido', function(e) {
                $('#_rut1').val('').attr('style','border-color:red');
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


            <?php 
            include 'alertas.php' ;
            ?>


                <!-- siguiendo con la estructura de la tabla (primer col) -->
               <div  class="card ">
                   <div class="card-header">
                       Lista de usuarios                                     
                       <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                   </div>

                   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre alumno</th>       
                                    <th scope="col">Rut alumno</th>    
                                    <th scope="col">Grado</th>    
                                    <th scope="col">Nombre apoderado</th>
                                    <th scope="col">Rut apoderado</th>
                                    <th scope="col">Periodo</th>

            
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($datos_matriculados) ) {

                                    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['matrid']; ?></td>
                                    <td ><?php echo $fila['NOMBRE1_ALUMNO'] . ' ' . $fila['NOMBRE2_ALUMNO'] . ' ' .  $fila['APELLIDO1_ALUMNO'] . ' ' . $fila['APELLIDO2_ALUMNO']  ; ?></td>
                                    <td ><?php echo $fila['RUT_ALUMNO']; ?></td>
                                    <td ><?php echo $fila['graniv']; ?></td>
                                    <td ><?php echo $fila['aponom']; ?></td>
                                    <td ><?php echo $fila['aporut']; ?></td>
                                    <td ><?php echo $fila['perise']  . ' SEMESTRE DEL AÑO ' . $fila['periano']; ?></td>
                                    
                                    <td><a class="text-primary" href="editar.php?id_matriculado=<?php echo $fila['matrid']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar esta matricula?')" class="text-danger" href="c_eliminar.php?id_matriculado=<?php echo $fila['matrid']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="1" class="form-label">Primer Nombre del Alumno:  </label>
                                <input type="text" class="form-control" name="nombre1" autofocus required id="1">
                            </div>   
                            <div class="mb-3 col-6">
                                <label for="2" class="form-label">Segundo Nombre del Alumno: </label>
                                <input type="text" class="form-control" name="nombre2" autofocus required id="2">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="3" class="form-label">Apellido Paterno del Alumno: </label>
                                <input type="text" class="form-control" name="apellido1" autofocus required id="3">
                            </div>   
                            <div class="mb-3 col-6">
                                <label for="4" class="form-label">Apellido Materno del Alumno: </label>
                                <input type="text" class="form-control" name="apellido2" autofocus required id="4">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="_rut" class="form-label">Rut del Alumno: </label>
                                <input  label="_rut" class="form-control" type="text" name="rut_alumno"  autofocus required id="_rut" >
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label lab" for="6">Grado:</label > 
                                <select name="grado" class="form-control"  required  id="6" >
                                    <option disabled selected value >  </option>
                                        <?php
                                        $sqlTipo = "SELECT * FROM grados order by ID";
                                        $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                        while($data = mysqli_fetch_array($dataNivel)){ ?>
                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NIVEL']); ?>

                                        <?php } ?>
                                </select>  
                            </div> 
                        </div>
                      
                            <div class="mb-3">
                               <label for="7" class="form-label">Nombre Completo del Apoderado: </label>
                               <input type="text" class="form-control" name="nombre_apoderado" autofocus required id="7">
                            </div> 
                            <div class="row">
                                <div class="mb-3 col-6 ">
                                    <label for="_rut1" class="form-label">Rut del Apoderado: </label>
                                    <input  label="_rut" class="form-control" type="text" name="rut_apoderado"  autofocus required id="_rut1" >
                                </div>
                                <div class="mb-3 col-6 ">
                                    <label for="9" class="form-label">Email del Apoderado: </label>
                                    <input class="form-control" type="email" name="email"  autofocus required id="9" >
                                </div>


                            </div>
                            <div class="row">
                                <div class="mb-3 col-6 ">
                                    <label for="t1" class="form-label">Telefono Apoderado: </label>
                                    <input  label="_rut" class="form-control" type="text" name="telefono"  autofocus required id="t1" >
                                </div>
                                <div class="mb-3 col-6 ">
                                    <label for="d1" class="form-label">Dirección: </label>
                                    <input class="form-control" type="text" name="direccion"  autofocus required id="d1" >
                                </div>


                            </div>
                           
                       
                      
                        <?php 
                            $sqlPeriodo = "SELECT * FROM periodos WHERE ESTADO = 'VIGENTE'";
                            $sentencia100 = $mysqli->query($sqlPeriodo);
                            $sentencia101 =mysqli_fetch_array($sentencia100);
                        ?>

                        <div class="d-grid mt-5">
                            <input type="hidden" name="periodo_id" value=" <?php echo $sentencia101['ID'];  ?>">
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