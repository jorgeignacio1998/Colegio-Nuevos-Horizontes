<?php 
include '../seguridad_director.php';    //BD, SEGURIDAD NIVEL, SESSION.
$evaluaciones = $mysqli->query("SELECT * FROM evaluaciones");
$id_grado = '';
if(isset($_GET['grado'])) {
$id_grado = $_GET['grado'];
}




//   echo '<script language="javascript">alert("' .  $evaluaciones   . '");</script>';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Evaluaciones </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> <!-- Jquery -->
    
   

    <!-- Funciion para obtener el ID seleccionado por el cliente -->
    <script>
        $(document).ready(function() {
	    $("#id_alumno").change(function() {

		// var selectedVal = $("#myselect option:selected").text();
		var selectedVal = $("#id_alumno option:selected").val();
        //  alert($('#id_alumno').val());


        });
     });
        
     
    </script>
    <!-- Funciion para obtener el ID seleccionado por el cliente -->

   



    

    <style>
        .col1{
            Height:650px; overflow-y:scroll;
        }

        .busc{
            margin-top: 31px;
        }



        .texta{
    flex: auto;
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border-radius: 4px;
    font-family: 'calibri';
    font-size: 18px;
    color:black;
    min-height: 150px;
    max-height: 150px ;
    min-width: 250px;
    max-width: 800px;   /* da igual el ancho ya que nunca se sobrepasara de la caja principal*/
}







    </style>

</head>
<body>
<!-- scripts para boostrap y popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    





    <?php 
    include 'navside.php';
    ?>




<!-- Inicio Gestor de usuarios--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-7">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->

            
            <?php 
            include 'alertas.php';
            ?>


                    <div  class="card ">
                        <div class=" card-header">

                        
                            <form action="">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label lab" for="_6"> Filtrar por Grado</label > 
                                            <select name="grado" class="form-control"  required  id="_6" >
                                                <option disabled selected value >  </option>
                                                    <?php
                                                    $sqlTipo = "SELECT *  FROM grados ";
                                                    
                                                    $dataNivel = mysqli_query($mysqli, $sqlTipo);
                                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                                <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NIVEL']); ?>
                                                        
                                                    <?php } ?>
                                            </select>  
                                        </div>   
                                        
                                    </div>
                                    <div class="col-6">           
                                        <input type="submit" class="btn btn-primary busc" value="buscar">
                                    </div>
                                
                                </div>
                            </form>
                        </div>




                                                        
                    <?php 


                        if(!empty($id_grado)){
                          
                                
                            $query = "SELECT *,
                            evaluaciones.NOMBRE as nombreasigna,
                            evaluaciones.ID_GRADO AS idgrado,
                            asignaturas.NOMBRE as asignanom,
                            evaluaciones.ID AS evaid
                            FROM evaluaciones
                            INNER JOIN asignaturas
                            ON asignaturas.ID_A = evaluaciones.ID_ASIGNATURA
                            INNER JOIN grados
                            ON grados.ID = evaluaciones.ID_GRADO
                            WHERE evaluaciones.ID_GRADO = $id_grado 
                            ORDER BY  asignaturas.NOMBRE , NUMERO   ";   //OR ID LIKE '{$input}%' OR EMAIL LIKE '{$input}%' OR NIVEL LIKE '{$input}%'
                           



                        $result = mysqli_query($mysqli, $query);
                        if(mysqli_num_rows($result) > 0 ){?>




                            <div class="p-4  col1">
                                        <table class="table align-middle">
                                            
                                                <thead>
                                                    <tr>
                                                        
                                                        <th scope="col">NUMERO</th>  
                                                        <th scope="col">NOMBRE </th>                                                  
                                                        <th scope="col">ASIGNATURA</th>                              
                                                        <th scope="col">GRADO</th>
                                                        <th scope="col">DESCRIPCION</th>                                 


                                                        <th scope="col" colspan="2">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody >
                                                    <?php     //IMPRIMIR DATOS EN LOS td
                    
                                                    while($fila =mysqli_fetch_assoc($result) ) {
                        
                                                    ?>
                                                    <tr >

                                                        <td ><?php echo $fila['NUMERO']; ?></td>
                                                        <td ><?php echo $fila['nombreasigna']; ?></td>
                                                        <td ><?php echo $fila['asignanom']; ?></td>
                                                        <td ><?php echo $fila['NIVEL']; ?></td>
                                                        <td ><?php echo $fila['DESCRIPCION']; ?></td>
                                                   
                                                    

                                                        <td><a class="text-primary" href="editar.php?id_eva=<?php echo $fila['evaid']; ?>">        <i class="bi bi-pencil-square boton"></i></a>  </td>
                                                        <td><a onclick="return confirm('¿estas seguro que quieres desvincular al alumno del curso?')" class="text-danger" href="c_eliminar.php?id_eva=<?php echo $fila['evaid']; ?>&grado=<?php echo $fila['ID_GRADO']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
                                                        <!-- le envia por la url el id del usuario al c_eliminar -->
                                                        
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                
                                                </tbody>
                                        </table>
                                    </div>
                            <?php 

                        }else{
                            echo'<h6 class="text-danger text-center mt-3">No hay datos para mostrar</h6>';
                        }

                    ?>


                    <?php  } ?>


                    
               </div>
               <br>  <br>
           </div> <!-- TERMINO PRIMER COL  --> 







                    







           

           <div class="col-md-4">    <!-- INICIO SEGUNDO COL  -->
               <div class="card">
                 
                   <div class="card-header">
                       Crear evaluación:
                   </div>
                   <form action="c_crear.php" method="POST" class="p-4" >

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="2" class="form-label">Numero evaluacion </label>
                                <input type="text" class="form-control" name="numero" autofocus required id="2">
                            </div> 
                            <div class="mb-3 col-6">
                                <label for="1" class="form-label">Nombre evaluación </label>
                                <input type="text" class="form-control" name="nombre" autofocus required id="1">
                            </div>            
                        </div>


                        <div class="mb-3">
                            <label for="3" class="form-label">Nombre Asignatura: </label>
                            <select name="asignatura" class="form-control"  required id="3">


                            <!-- Este option es el dato del profesor -->
                         

                            <option value="">

                                        <?php
                                        $sqlAsi = "SELECT *,
                                        grados.NIVEL AS nivelgrado
                                        FROM asignaturas INNER JOIN grados
                                        ON asignaturas.ID_GRADO = grados.ID
                                        order by grados.ID";
                                        $dataAsi = mysqli_query($mysqli, $sqlAsi);

                                        
                                        while($data = mysqli_fetch_array($dataAsi)){ 
                                        ?>


                                        <!-- y este option las opciones -->
                                        <option value="<?php echo $data["ID_A"]; ?>"><?php echo utf8_encode( $data['NOMBRE'] . ' - ' . $data['nivelgrado'] ); ?>
                                        <?php } ?>

                           </select>
                        </div>
                        
                            <div class="mb-3 ">
                                <label for="4" class="form-label">Descripción</label>
                                <textarea class="form-control texta" name="descripcion"  id="4"></textarea   > 
                            </div>     
                        
        

                      

                        
                        <div class="d-grid mt-5">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>

                   </form>

            
                 




               </div>
               <br>
           </div>
       </div>
   </div>



</body>
</html>


     
