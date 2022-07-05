<?php 

include '../../codes/connect.php';



$inner = $mysqli->query("SELECT *, apoderados.ID AS idap FROM apoderados INNER JOIN matriculados ON apoderados.ID_MATRICULADO = matriculados.ID  ORDER BY  apoderados.ID");



    $input = $_POST['input'];

    if(empty($input)){
        $query =  "SELECT *, apoderados.ID AS idap FROM apoderados INNER JOIN matriculados ON apoderados.ID_MATRICULADO = matriculados.ID  ORDER BY  apoderados.ID";

        } else{
            
        $query = "SELECT *, apoderados.ID AS idap FROM apoderados INNER JOIN matriculados ON apoderados.ID_MATRICULADO = matriculados.ID 
        WHERE NOMBRE LIKE '{$input}%' OR RUT LIKE '{$input}%' OR EMAIL LIKE '{$input}%' OR TELEFONO LIKE '{$input}%' OR DIRECCION 
        LIKE '{$input}%' OR matriculados.RUT_ALUMNO LIKE '{$input}%' OR CONCAT( matriculados.NOMBRE1_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO) LIKE '{$input}%' OR 
        CONCAT( matriculados.APELLIDO1_ALUMNO, ' ', matriculados.NOMBRE1_ALUMNO) LIKE '{$input}%' OR 
        CONCAT( matriculados.NOMBRE1_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO) LIKE '{$input}%' OR 
        CONCAT( matriculados.NOMBRE1_ALUMNO, ' ', matriculados.NOMBRE2_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO) LIKE '{$input}%' OR
        CONCAT( matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO, ' ', matriculados.NOMBRE1_ALUMNO) LIKE '{$input}%' OR
        CONCAT( matriculados.APELLIDO2_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.NOMBRE1_ALUMNO) LIKE '{$input}%' OR
        CONCAT( matriculados.NOMBRE2_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO) LIKE '{$input}%'  ORDER BY  apoderados.ID";
    }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>


                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                 
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">RUT</th>                                        
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">TELEFONO</th>
                                    <th scope="col">DIRECCION</th>
                                    <th scope="col">ALUMNO</th>
                                   


                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($result) ) {

                                    
                                ?>
                                <tr >

                                   
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                                    <td ><?php echo $fila['RUT']; ?></td>
                                    <td ><?php echo $fila['EMAIL']; ?></td>
                                    <td ><?php echo $fila['TELEFONO']; ?></td>
                                    <td ><?php echo $fila['DIRECCION']; ?></td>
                                    <td ><?php echo $fila['NOMBRE1_ALUMNO']. ' '.$fila['NOMBRE2_ALUMNO']. ' '.$fila['APELLIDO1_ALUMNO']. ' '.$fila['APELLIDO2_ALUMNO']  ?></td>
                                    


                                    <td><a class="text-primary" href="editar.php?id_apoderado=<?php echo $fila['idap'] ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿Estás seguro de eliminar a esta apoderado?')" class="text-danger" href="c_eliminar.php?id_apoderado=<?php echo $fila['idap'] ?>">   <i class="bi bi-trash"></i></a>  </td>  
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