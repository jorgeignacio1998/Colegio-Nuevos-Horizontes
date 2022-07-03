<?php 

include '../../codes/connect.php';



$inner = $mysqli->query("SELECT *, sedes.NOMBRE_SEDE AS nombresede  FROM salas INNER JOIN sedes ON salas.ID_SEDE = sedes.ID_SEDE");



    $input = $_POST['input'];

    if(empty($input)){
        $query =  "SELECT *, sedes.NOMBRE_SEDE AS nombresede  FROM salas INNER JOIN sedes ON salas.ID_SEDE = sedes.ID_SEDE  ";

        } else{
            
        $query = "SELECT *, sedes.NOMBRE_SEDE AS nombresede  FROM salas INNER JOIN sedes ON salas.ID_SEDE = sedes.ID_SEDE WHERE NUMERO LIKE '{$input}%' OR PISO LIKE '{$input}%' OR NOMBRE_SEDE LIKE '{$input}%' ";  
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>


                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                 
                                    <th scope="col">NUMERO</th>
                                    <th scope="col">PISO</th>                                        
                                    <th scope="col">SEDE</th>
                                   


                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($result) ) {

                                    
                                ?>
                                <tr >

                                   
                                    <td ><?php echo $fila['NUMERO']; ?></td>
                                    <td ><?php echo $fila['PISO']; ?></td>
                                    <td ><?php echo $fila['nombresede']; ?></td>
                                    


                                    <td><a class="text-primary" href="editar.php?id_sala=<?php echo $fila['ID'] ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a esta sala?')" class="text-danger" href="c_eliminar.php?id_sala=<?php echo $fila['ID'] ?>">   <i class="bi bi-trash"></i></a>  </td>  
                                    <!-- le envia por la url el id del usuario al c_eliminar -->
                                    
                                </tr>
                                <?php
                                }
                                ?>
                               
                            </tbody>
                       </table>
                
        <?php 

    }else{
        echo'<h6 class="text-danger text-center mt-3">Datos no encontrados </h6>';
    }

?>