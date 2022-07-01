<?php 

include '../../codes/connect.php';


$datos_asignaturas = $mysqli->query("SELECT * FROM asignaturas"); //obteniendo los datos
$datos_grados = $mysqli->query("SELECT * FROM grados"); //obteniendo los datos

$query2 = "SELECT * FROM asignaturas
INNER JOIN grados
ON asignaturas.ID_GRADO = grados.ID";






    $input = $_POST['input'];

    if(empty($input)){
        $query =  "SELECT * FROM asignaturas
        INNER JOIN grados
        ON asignaturas.ID_GRADO = grados.ID  ";

        } else{
            
        $query = "SELECT * FROM asignaturas
                    INNER JOIN grados
                    ON asignaturas.ID_GRADO = grados.ID WHERE NOMBRE LIKE '{$input}%'OR NIVEL LIKE '{$input}%' ";  
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>




        <div  id="col1" class="p-4 ">
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Asignatura</th>                              
                                    <th scope="col">Grado</th>

                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td
   
                                    while($fila =mysqli_fetch_array($result)  ) {
                                        
                                    ?>
                                    <tr >

                                        <td scope="row"><?php echo $fila['ID_A']; ?></td>
                                        <td ><?php echo $fila['NOMBRE']; ?></td>
                                        <td ><?php echo $fila['NIVEL']; ?></td>


                                        
                                    <td><a class="text-primary" href="E_asignatura.php?codigo=<?php echo $fila['ID_A']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a esta asignatura?')" class="text-danger" href="d_asigna.php?codigo=<?php echo $fila['ID_A']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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