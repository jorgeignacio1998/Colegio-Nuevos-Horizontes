<?php 

include '../../codes/connect.php';






    $input = $_POST['input'];

    if(empty($input)){
        $query = "SELECT *,
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
        ORDER BY ID_GRADO ";

        } else{
            
        
        $query = "SELECT *,
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
     
       
        WHERE matriculados.ID LIKE '{$input}%' OR 
        grados.NIVEL LIKE '{$input}%'  OR
        grados.NIVEL LIKE '{$input}%'  OR
        matriculados.RUT_ALUMNO LIKE '{$input}%'   OR
        apoderados.RUT LIKE '{$input}%'  OR

        CONCAT( matriculados.NOMBRE1_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO) LIKE '{$input}%' OR 
        CONCAT( matriculados.APELLIDO1_ALUMNO, ' ', matriculados.NOMBRE1_ALUMNO) LIKE '{$input}%' OR 
        CONCAT( matriculados.NOMBRE1_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO) LIKE '{$input}%' OR 
        CONCAT( matriculados.NOMBRE1_ALUMNO, ' ', matriculados.NOMBRE2_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO) LIKE '{$input}%' OR
        CONCAT( matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO, ' ', matriculados.NOMBRE1_ALUMNO) LIKE '{$input}%' OR
        CONCAT( matriculados.APELLIDO2_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.NOMBRE1_ALUMNO) LIKE '{$input}%' OR
        CONCAT( matriculados.NOMBRE2_ALUMNO, ' ', matriculados.APELLIDO1_ALUMNO, ' ', matriculados.APELLIDO2_ALUMNO) LIKE '{$input}%'



        ORDER BY grados.ID
         ";   
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>




<table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">ID ALUMNO</th>
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
   
                                while($fila =mysqli_fetch_array($result) ) {

                                    
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
            
        <?php 

    }else{
        echo'<h6 class="text-danger text-center mt-3">Datos no encontrados </h6>';
    }

?>