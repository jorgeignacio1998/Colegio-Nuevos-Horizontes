<?php 

include '../seguridad_alumno.php';

//INYECCIONSQL
$datita = $mysqli->query("SELECT * FROM  usuarios WHERE ID LIKE '{$usuario_logueado}'");
$sentencia2 =mysqli_fetch_array($datita);
$rut_alumno = $sentencia2['RUT'];

//INYECCIONSQL

//INYECCIONSQL
$datita2 = $mysqli->query("SELECT * FROM alumnos WHERE RUT LIKE '{$rut_alumno}'");
$sentencia3 =mysqli_fetch_array($datita2);
$id_alumno = $sentencia3['ID'];
//INYECCIONSQL

$inner = $mysqli->query("SELECT *, alumnos.NOMBRE_1 AS nom1, alumnos.NOMBRE_2 AS nom2, alumnos.APELLIDO_1 AS nom3,alumnos.APELLIDO_2 AS nom4,
clases.NOMBRE AS nombreclass, asignaturas.NOMBRE AS nomasig, cursos.LEEIBLE AS cursoleible,
calificaciones.ID AS id_nota, evaluaciones.ID AS ideva
FROM calificaciones INNER JOIN clases ON calificaciones.ID_CLASE = clases.ID
INNER JOIN alumnos ON calificaciones.ID_ALUMNO = alumnos.ID INNER JOIN evaluaciones ON calificaciones.ID_EVALUACION = evaluaciones.ID
INNER JOIN asignaturas ON clases.ID_ASIGNATURA = asignaturas.ID_A
INNER JOIN cursos ON clases.ID_CURSO = cursos.ID
WHERE alumnos.RUT LIKE '{$rut_alumno}'
ORDER BY clases.ID, cursos.ID, alumnos.ID,   alumnos.APELLIDO_1, evaluaciones.NUMERO   ");





    $input = $_POST['input'];

    if(empty($input)){
        $query =  "SELECT *, alumnos.NOMBRE_1 AS nom1, alumnos.NOMBRE_2 
        AS nom2, alumnos.APELLIDO_1 AS nom3, alumnos.APELLIDO_2 AS nom4,
        asignaturas.NOMBRE AS nomasig, clases.NOMBRE AS nombreclass
        FROM calificaciones 
        INNER JOIN alumnos ON alumnos.ID = calificaciones.ID_ALUMNO 
        INNER JOIN clases ON clases.ID = calificaciones.ID_CLASE
        INNER JOIN asignaturas ON asignaturas.ID_A = clases.ID_ASIGNATURA
        INNER JOIN evaluaciones ON evaluaciones.ID_ASIGNATURA = asignaturas.ID_A
        WHERE alumnos.ID LIKE '{$id_alumno}'";

        } else{
            
        $query = "SELECT *, alumnos.NOMBRE_1 AS nom1, alumnos.NOMBRE_2 
        AS nom2, alumnos.APELLIDO_1 AS nom3, alumnos.APELLIDO_2 AS nom4,
        asignaturas.NOMBRE AS nomasig, clases.NOMBRE AS nombreclass
        FROM calificaciones 
        INNER JOIN alumnos ON alumnos.ID = calificaciones.ID_ALUMNO 
        INNER JOIN clases ON clases.ID = calificaciones.ID_CLASE
        INNER JOIN asignaturas ON asignaturas.ID_A = clases.ID_ASIGNATURA
        INNER JOIN evaluaciones ON evaluaciones.ID_ASIGNATURA = asignaturas.ID_A
        WHERE alumnos.NOMBRE_1 LIKE '{$input}%'
        OR NOTA LIKE '{$input}%' OR evaluaciones.NUMERO LIKE '{$input}%' OR asignaturas.NOMBRE LIKE '{$input}%'
        OR clases.NOMBRE LIKE '{$input}%' OR
        CONCAT( alumnos.NOMBRE_1, ' ', alumnos.APELLIDO_1, ' ', alumnos.APELLIDO_2) LIKE '{$input}%' OR
        CONCAT( alumnos.NOMBRE_2, ' ', alumnos.APELLIDO_1, ' ', alumnos.APELLIDO_2) LIKE '{$input}%' OR
        CONCAT( alumnos.APELLIDO_1, ' ', alumnos.APELLIDO_1, ' ', alumnos.APELLIDO_2) LIKE '{$input}%' OR
        CONCAT( alumnos.NOMBRE_1, ' ', alumnos.NOMBRE_2, ' ', alumnos.APELLIDO_1) LIKE '{$input}%' OR
        CONCAT( alumnos.NOMBRE_1, ' ', alumnos.NOMBRE_2, ' ', alumnos.APELLIDO_1, ' ', alumnos.APELLIDO_2) LIKE '{$input}%' OR
        CONCAT( alumnos.NOMBRE_2, ' ', alumnos.APELLIDO_1, ' ', alumnos.APELLIDO_2) LIKE '{$input}%'
        AND alumnos.RUT LIKE '{$rut_alumno}'
        ORDER BY clases.ID, alumnos.ID,   alumnos.APELLIDO_1, evaluaciones.NUMERO";
        
    }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>

<table class="table align-middle">
                        <thead>
                            <tr>
                                
                            
                                <th scope="col">NOMBRE DEL ALUMNO</th>
                                <th scope="col">NOTA</th>                                        
                                <th scope="col"> N° EVALUACIÓN </th>
                                <th scope="col">ASIGNATURA </th>

                                <th scope="col">CLASE </th>
                            

                            
                            </tr>
                        </thead>
                        <tbody >
                            <?php     //IMPRIMIR DATOS EN LOS td

                            while($fila =mysqli_fetch_array($inner) ) {

                                $nombreCompleto = $fila['nom1'] . ' ' . $fila['nom2']  . ' ' .$fila['nom3'] . ' ' . $fila['nom4'];
                                
                                
                            ?>
                            <tr >

                            
                                <td ><?php echo $nombreCompleto ?></td>
                                <td ><?php echo $fila['NOTA']; ?></td>
                                <td ><?php  echo 'EVALUACIÓN  ' .  $fila['NUMERO']; ?></td>
                                <td ><?php echo $fila['nomasig']; ?></td>

                                <td ><?php echo $fila['nombreclass']; ?></td>



 
                                
                                
                            
                            


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