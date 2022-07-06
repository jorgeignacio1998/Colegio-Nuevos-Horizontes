<?php 
require '../seguridad_subdirector.php';
$datos_cursos = $mysqli->query("SELECT * FROM cursos");

$curso = '';
if(isset($_GET['curso'])) {
$curso = $_GET['curso'];

}












?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Alumnos </title>
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
                                            <label class="form-label lab" for="_6"> Filtrar por curso</label > 
                                            <select name="curso" class="form-control"  required  id="_6" >
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
                                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                                <option value="<?php echo $data["curid"]; ?>"><?php echo utf8_encode($data['graniv'] . ' ' .$data['curnom'] ); ?>
                                                        
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


                        if(!empty($curso)){
                          
                                
                            $query = "SELECT *,
                            apoderados.NOMBRE as nombrapo,
                            apoderados.TELEFONO as telefono,
                            alumnos.ID as idalumno,
                            alumnos.RUT as rutalum,
                            cursos.LEEIBLE as leeible
                            

                            FROM alumnos
                            INNER JOIN apoderados
                            ON alumnos.ID_APODERADO = apoderados.ID
                            INNER JOIN cursos ON alumnos.ID_CURSO = cursos.ID
                       
                            WHERE ID_CURSO LIKE $curso  ";   //OR ID LIKE '{$input}%' OR EMAIL LIKE '{$input}%' OR NIVEL LIKE '{$input}%'
                           



                        $result = mysqli_query($mysqli, $query);
                        if(mysqli_num_rows($result) > 0 ){?>




                            <div class="p-4  col1">
                                        <table class="table align-middle">
                                            
                                                <thead>
                                                    <tr>
                                                        
                                                        
                                                        <th scope="col">Nombre Alumno</th>                              
                                                        <th scope="col">Rut</th>                              
                                                        <th scope="col">Nombre Apoderado</th>                              
                                                        <th scope="col">Telefono Apoderado</th>                              
                                                        <th scope="col">Curso</th>                              


                                                        <th scope="col" colspan="2">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody >
                                                    <?php     //IMPRIMIR DATOS EN LOS td
                    
                                                    while($fila =mysqli_fetch_assoc($result) ) {
                        
                                                    ?>
                                                    <tr >

                                                        
                                                        <td ><?php echo $fila['NOMBRE_1'] . ' ' . $fila['NOMBRE_2'] . ' ' .$fila['APELLIDO_1'] . ' ' . $fila['APELLIDO_2'] ; ?></td>
                                                        <td ><?php echo $fila['rutalum'] ; ?></td>
                                                        <td ><?php echo $fila['nombrapo'] ; ?></td>
                                                        <td ><?php echo $fila['telefono'] ; ?></td>
                                                        <td ><?php echo $fila['leeible'] ; ?></td>
                                                        
                                                    

                                                        <td><a class="text-primary" href="editar.php?id_alumno=<?php echo $fila['idalumno']; ?>">        <i class="bi bi-pencil-square boton"></i></a>  </td>
                                                        <td><a onclick="return confirm('¿estas seguro que quieres desvincular al alumno del curso?')" class="text-danger" href="c_eliminar.php?id_alumno=<?php echo $fila['idalumno']; ?>&rut=<?php echo $fila['rutalum']; ?>&curso=<?php echo $curso ; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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
                       Asignar alumno al curso:
                   </div>
                   <form action="c_asignar.php" method="POST" class="p-4" >

                        <div class="mb-3">
                            <label for="id_alumno" class="form-label" >Alumno: </label>
                            <select  name="alumno" class="form-control"  required id="id_alumno">


                       
                    

                            <option value=""   >

                                        <?php
                                        $sqlAlumno = "SELECT *,
                                        grados.NIVEL as grado,
                                        matriculados.ID as matriculaid
                                        FROM matriculados
                                        INNER JOIN grados
                                        ON matriculados.ID_GRADO = grados.ID  WHERE ASIGNADO LIKE '' order by matriculados.ID";
                                        $dataProfe = mysqli_query($mysqli, $sqlAlumno);

                                        
                                        while($data = mysqli_fetch_array($dataProfe)){ 
                                        ?>


                                        <!-- y este option las opciones -->
                                        <option  

                                        value="<?php   echo $data["matriculaid"]; ?>"><?php echo utf8_encode( $data['NOMBRE1_ALUMNO'] . ' '. $data['NOMBRE2_ALUMNO'] . ' '. $data['APELLIDO1_ALUMNO'] 
                                        . ' '. $data['APELLIDO2_ALUMNO'] . '  -  '. $data['grado'] ); ?>

                                        <?php } 
                                        ?>

                                       

                           </select>

                          
                           <!-- if(empty($validar_login->num_rows))     
                         -->

                        </div>
                            
                        <div class="mb-3">
                            <label class="form-label lab" for="_6">Curso</label > 
                            <select name="curso" class="form-control"  required  id="_6" >
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
                                    //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                    //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                    while($data = mysqli_fetch_array($dataNivel)){ ?>
                                <option value="<?php echo $data["curid"]; ?>"><?php echo utf8_encode($data['graniv'] . ' ' .$data['curnom'] ); ?>

                                    <?php } ?>
                            </select>  
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


     
