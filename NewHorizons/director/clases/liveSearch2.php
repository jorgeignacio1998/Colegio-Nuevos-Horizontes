<?php 

include '../../codes/connect.php';











    $input = $_POST['input'];

    if(empty($input)){
        $query = "SELECT *, clases.NOMBRE AS nombrecla,
        grados.NIVEL AS gradoniv,cursos.NOMBRE AS nombrecurs,
        asignaturas.NOMBRE AS nombreasig, profesores.NOMBRE AS 
        nombreprofe, clases.ID AS claseid FROM clases INNER JOIN asignaturas ON
        clases.ID_ASIGNATURA = asignaturas.ID_A INNER JOIN 
        profesores ON profesores.ID = clases.ID_PROFESOR
        INNER JOIN cursos ON cursos.ID = clases.ID_CURSO
        INNER JOIN grados ON grados.ID = cursos.ID_GRADO
        ORDER BY grados.ID";

        } else{
            
        
        $query = "SELECT *, clases.NOMBRE AS nombrecla,
        grados.NIVEL AS gradoniv,cursos.NOMBRE AS nombrecurs,
        asignaturas.NOMBRE AS nombreasig, profesores.NOMBRE AS 
        nombreprofe, clases.ID AS claseid  FROM clases INNER JOIN asignaturas ON
        clases.ID_ASIGNATURA = asignaturas.ID_A INNER JOIN 
        profesores ON profesores.ID = clases.ID_PROFESOR
        INNER JOIN cursos ON cursos.ID = clases.ID_CURSO
        INNER JOIN grados ON grados.ID = cursos.ID_GRADO 
        WHERE profesores.NOMBRE LIKE '{$input}%' OR 
        clases.NOMBRE LIKE '{$input}%' OR grados.NIVEL LIKE '{$input}%' 
        OR asignaturas.NOMBRE LIKE '{$input}%' OR cursos.NOMBRE LIKE '{$input}%' OR LEEIBLE LIKE '{$input}%'
        ORDER BY grados.ID, cursos.NOMBRE
         ";   
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>




                    <table class="table align-middle">
                        <thead>
                            <tr>


                                <th scope="col">Clase</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Asignatura</th>    
                                <th scope="col">Profesor</th>                              
                             
                            
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($result)  ) {
                            
                                
                                
                            
                                
                            ?>
                            <tr >

                                <td scope="row"><?php echo $fila['nombrecla']; ?></td>
                                <td ><?php echo $fila['gradoniv'] . ' ' . $fila['nombrecurs'] ?></td>
                                <td ><?php echo $fila['nombreasig']; ?></td>
                                <td ><?php echo $fila['nombreprofe']; ?></td>
                               



                            

                                <td><a class="text-primary" href="editar.php?=">        <i class="bi bi-pencil-square"></i></a>  </td>
                                <td><a onclick="return confirm('¿estas seguro de eliminar a esta clase?')" class="text-danger" href="c_eliminar.php?id_clase=<?php echo $fila['claseid']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
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