<?php 

include '../../codes/connect.php';



$inner = $mysqli->query("SELECT *,
 profesores.NOMBRE as prono

 FROM asignaturas_profes
 INNER JOIN profesores                 
 ON asignaturas_profes.ID_PROFESOR = profesores.ID
 INNER JOIN asignaturas
 ON asignaturas.ID_A = asignaturas_profes.ID_ASIGNATURA");







    $input = $_POST['input'];

    if(empty($input)){
        $query = "SELECT *,
        profesores.NOMBRE as prono
       
        FROM asignaturas_profes
        INNER JOIN profesores                 
        ON asignaturas_profes.ID_PROFESOR = profesores.ID
        INNER JOIN asignaturas
        ON asignaturas.ID_A = asignaturas_profes.ID_ASIGNATURA";

        } else{
            
        $query = "SELECT *,
        profesores.NOMBRE as prono
       
        FROM asignaturas_profes
        INNER JOIN profesores                 
        ON asignaturas_profes.ID_PROFESOR = profesores.ID
        INNER JOIN asignaturas
        ON asignaturas.ID_A = asignaturas_profes.ID_ASIGNATURA 
        WHERE profesores.NOMBRE LIKE '{$input}%'  ";   //OR ID LIKE '{$input}%' OR EMAIL LIKE '{$input}%' OR NIVEL LIKE '{$input}%'
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>




        <div  id="col1" class="p-4 ">
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Profesor</th>                              
                                    <th scope="col">Asignatura</th>

                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td
   
                                    while($fila =mysqli_fetch_array($result)  ) {
                                        
                                    ?>
                                    <tr >

                                        <td scope="row"><?php echo $fila['ID_ASIGNACION']; ?></td>
                                        <td ><?php echo $fila['prono']; ?></td>
                                        <td ><?php echo $fila['NOMBRE']; ?></td>


                                        
                                    <td><a class="text-primary" href="E_asignacion.php?id_asignacion=<?php echo $fila['ID_ASIGNACION']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a esta asignatura?')" class="text-danger" href="d_asignacion.php?id_asignacion=<?php echo $fila['ID_ASIGNACION']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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
        echo'<h6 class="text-danger text-center mt-3">Datos no encontrados </h6>';
    }

?>