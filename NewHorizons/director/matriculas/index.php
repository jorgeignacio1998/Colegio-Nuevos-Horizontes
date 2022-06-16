<?php
include '../seguridad_director.php'; 
$datos_matriculas = $mysqli->query("SELECT *, 
matriculas.ID as matrid,
grados.ID as gradid,
grados.NIVEL as graniv,
periodos.SEMESTRE as perise,
periodos.ANO as periano
FROM matriculas
INNER JOIN grados
ON matriculas.ID_GRADO = grados.ID
INNER JOIN periodos
ON matriculas.ID_PERIODO = periodos.ID
ORDER BY ID_PERIODO  DESC , ID_GRADO "); 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Matriculas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
    
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
                include 'alertas.php';
           ?>


                
               <div  class="card ">
                   <div class="card-header">
                       Lista de usuarios                                     
                       <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Buscar...">                          <!-- aca-->
                   </div>

                   <div  id="searchResult" class="p-4 col1 ">                                        <!-- aca-->
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                 
                                    <th scope="col">GRADO</th>       
                                    <th scope="col">CUPOS</th>       
                                    <th scope="col">PERIODO</th>
                                    <th scope="col">FECHA INICIO</th>
                                    <th scope="col">FECHA FINAL</th>
                                    <th scope="col">PRECIO MATRICULA</th>
                                
                                    <th scope="col" colspan="2">Editar</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($datos_matriculas) ) {

                                    
                                ?>
                                <tr >

                                   
                                    <td ><?php echo $fila['graniv']; ?></td>
                                    <td ><?php echo $fila['CUPOS']; ?></td>
                                    <td ><?php echo $fila['perise']  . ' SEMESTRE DEL AÑO ' . $fila['periano']; ?></td>
                                    <td ><?php echo $fila['FECHA_INICIO']; ?></td>
                                    <td ><?php echo $fila['FECHA_FINAL']; ?></td>
                                    <td ><?php echo  '$' .$fila['PRECIO_MATRICULA']; ?></td>

                                    <td><a class="text-primary" href="editar.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
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
                       Agregar matricula:
                   </div>
                   <form action="c_registrar.php" method="POST" class="p-4" >

                        <div class="row">

                            <div class="mb-3 col-6">
                                <label class="form-label lab" for="1">Grado:</label > 
                                <select name="id_grado" class="form-control"  required  id="1" >
                                    <option disabled selected value >  </option>
                                        <?php
                                        $sqlGrado = "SELECT * FROM grados order by ID";
                                        $dataNivel = mysqli_query($mysqli, $sqlGrado);
                                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                        while($data = mysqli_fetch_array($dataNivel)){ ?>
                                    <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NIVEL']); ?>

                                        <?php } ?>
                                </select>  
                            </div>  
                                    
                            <div class="mb-3 col-6">
                                    <label class="form-label lab" for="2">Periodo:</label > 
                                    <select name="id_periodo" class="form-control"  required  id="2" >
                                        <option disabled selected value >  </option>
                                            <?php
                                            $sqlPeriodo = "SELECT * FROM periodos order by ID";
                                            $dataPeriodo = mysqli_query($mysqli, $sqlPeriodo);
                                            //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                            //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                            while($data = mysqli_fetch_array($dataPeriodo)){ ?>
                                        <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['SEMESTRE']  . ' SEMESTRE DEL ' . $data['ANO']) ;?>
                                            
                                            <?php } ?>
                                    </select>  
                            </div>  
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="3" class="form-label">Cupos: </label>
                                <input class="form-control" type="text" name="cupos"  autofocus required id="3" >
                            </div>

                            <div class="mb-3 col-6">
                                <label for="4" class="form-label">Precio Matricula: </label>
                                <input class="form-control" type="text" name="precio_matricula"  autofocus required id="4" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="5" class="form-label">Fecha inicio: </label>
                                <input class="form-control" type="date" name="f_inicio"  autofocus required id="5" >
                            </div>

                            <div class="mb-3 col-6">
                                <label for="6" class="form-label">Fecha Final: </label>
                                <input class="form-control" type="date" name="f_final"  autofocus required id="6" >
                            </div>
                        </div>


                        
                        <div class="d-grid mt-5">
                            <input type="submit" class="btn btn-primary" value="Registrar matricula">
                        </div>

                   </form>

               </div>
               <br>
           </div>
       </div>
   </div>

</body>
</html>