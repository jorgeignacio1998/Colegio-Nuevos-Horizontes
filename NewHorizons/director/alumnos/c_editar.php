<?php
require '../seguridad_director.php';

$error = array();
$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";
$regexTelefono = "/^[+56|9][0-9]{8,11}$/";
$regexDireccion = "/^[A-Za-z0-9'\.\-\s\,]+$/";
// $ruts = "SELECT RUT FROM profesores"; 
// $sentencia1 = $mysqli->query($ruts);
// $sentencia2 =mysqli_fetch_array($sentencia1);

$id_matriculado = $_POST['id_matriculado'];
$nombre1 = $_POST['nombre1'];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$rut_alumno = $_POST['rut_alumno'];
$grado = $_POST['grado'];
$nombre_apoderado = $_POST['nombre_apoderado'];
$rut_apoderado = $_POST['rut_apoderado'];
$email_apoderado = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];





// VALIDACIONES FORMATO DE LOS 5 NOMBRES                    
    if(!preg_match($regexNombre,$nombre1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=nombre1';</script>";
    } 
    if(!preg_match($regexNombre,$nombre2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=nombre2';</script>";
    } 
    if(!preg_match($regexNombre,$apellido1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=apellido1';</script>";
    } 
    if(!preg_match($regexNombre,$apellido2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=apellido2';</script>";
    } 
    if(!preg_match($regexNombre,$nombre_apoderado )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=nombre_apoderado';</script>";
    } 
// VALIDACIONES FORMATO DE LOS 5 NOMBRES   


//VALIDACIONES FORMATO DE TELEFONO
if(!preg_match($regexTelefono,$telefono )){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=telefono_incorrecto';</script>";
} 
//VALIDACIONES FORMATO DE TELEFONO


//VALIDACIONES FORMATO DE DIRECCION
if(!preg_match($regexDireccion,$direccion )){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=direccion_incorrecta';</script>";
} 
//VALIDACIONES FORMATO DE DIRECCION


//  FORMATO CORREO ELECTRONICO 
    if(!preg_match($regexEmail, $email_apoderado )){
        array_push($error, "El formato del correo es invalido");  //este mensaje no es visible al usuario, se llena en la lista error, la cual sí está vacia hara cambios en la base de datos.
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=correo1';</script>";
    };
//  FORMATO CORREO ELECTRONICO 



// VALIDACIONES FORMATO DE LOS 2 RUTS                  
    if(!preg_match($regexRut, $rut_alumno)){
        array_push($error, "El RUT del estudiante es invalido");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=rut1';</script>";
    }  
    if(!preg_match($regexRut, $rut_apoderado)){
        array_push($error, "El RUT del apoderado es invalido");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=rut2';</script>";
    }  
// VALIDACIONES FORMATO DE LOS 2 RUTS    



// VALIDACIONES AMBOS RUT NO SEAN IGUALES  
    if($rut_alumno == $rut_apoderado){
        array_push($error, "ambos rut son iguales");
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=rut3';</script>";
    }
// VALIDACIONES AMBOS RUT NO SEAN IGUALES  



// VALIDACION RUT ALUMNO YA MATRICULADO
    $datos = $mysqli->query("SELECT * FROM matriculados WHERE ID LIKE '{$id_matriculado}' ");
    $row =mysqli_fetch_array($datos);


    if($row['RUT_ALUMNO'] !== $rut_alumno ){
        $query2 = $mysqli->query("SELECT * FROM matriculados WHERE RUT_ALUMNO LIKE '{$rut_alumno}' ");
        $res2 = mysqli_num_rows($query2);
        if($res2 > 0){
            array_push($error, "El alumno ya ha sido matriculado anteriormente");
            echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=rut4';</script>";
        }
    }
// VALIDACION RUT ALUMNO YA MATRICULADO


if(count($error)==0){

    // Buscando ID periodo Vigente y guardandolo para usarlo despues
    $sqlPeriodo = "SELECT * FROM periodos WHERE ESTADO = 'VIGENTE'";
    $sentencia100 = $mysqli->query($sqlPeriodo);
    $sentencia101 =mysqli_fetch_array($sentencia100);
    $id_periodo = $sentencia101['ID'];
    // Buscando periodo Vigente y guardandolo para usarlo despues



 // Este if es para saber si el ID_GRADO es el mismo o diferente.
    if($row['ID_GRADO'] !== $grado ){
        $id_grado_anterior = $row['ID_GRADO'];

        //Buscando el numero de cupos que tiene el curso que el estudiante se va a cambiar para restarle - 1 al momento que se cambie de grado
        $query4 = "SELECT * FROM matriculas WHERE ID_PERIODO LIKE $id_periodo AND ID_GRADO LIKE $grado";
        $sentencia4 = $mysqli->query($query4);
        $sentencia44 =mysqli_fetch_array($sentencia4);
        $cupos_grado_nuevo = $sentencia44['CUPOS'];
        //Buscando el numero de cupos que tiene el curso que el estudiante se va a cambiar  para restarle - 1 al momento que se cambie de grado
        

        //Buscando el numero de cupos que tiene el grado que tiene actualmente para sumarle +1 al momento que se cambie de grado.
        $query5 = "SELECT * FROM matriculas WHERE ID_PERIODO LIKE $id_periodo AND ID_GRADO LIKE $id_grado_anterior";
        $sentencia5 = $mysqli->query($query5);
        $sentencia55 =mysqli_fetch_array($sentencia5);
        $cupos_grado_anterior = $sentencia55['CUPOS'];
        //Buscando el numero de cupos que tiene el grado que tiene actualmente para sumarle+ 1 al momento que se cambie de grado

        
        if($cupos_grado_nuevo == NULL){
            echo "<script>location.href='index.php?mensaje=matricula_no_existe';</script>";
            exit();
        }else{
            $cupos_actualizados_nuevo = $cupos_grado_nuevo -1;
            if($cupos_actualizados_nuevo < 1){
                echo "<script>location.href='index.php?mensaje=no_cupos_disponibles';</script>";
                exit();
            }else{
                //actualizando el numero de cupos del grado anterior
                 
                $cupos_actualizados_anterior = $cupos_grado_anterior +1;
                $query6 = "UPDATE matriculas  SET  CUPOS = $cupos_actualizados_anterior WHERE ID_PERIODO LIKE $id_periodo AND ID_GRADO LIKE $id_grado_anterior ";

                if(mysqli_query($mysqli, $query6)){
                    $query7 = "UPDATE matriculas  SET  CUPOS = $cupos_actualizados_nuevo WHERE ID_PERIODO LIKE $id_periodo AND ID_GRADO LIKE $grado ";         
                    if(mysqli_query($mysqli, $query7)){
                        //todo ok. se termina eso 
                    }
                }
            }
        }
    }
    // Este if era para saber si el dato que se cambiara va a ser el grado, y actualizara los cupos de el grado anterior y el grado a modificar.
  


   




    
    $query = "UPDATE matriculados SET NOMBRE1_ALUMNO = '{$nombre1}', NOMBRE2_ALUMNO = '{$nombre2}', APELLIDO1_ALUMNO = '{$apellido1}', APELLIDO2_ALUMNO = '{$apellido2}', 
    RUT_ALUMNO = '{$rut_alumno}', ID_GRADO = '{$grado}'
    WHERE ID  LIKE $id_matriculado ";


    if(mysqli_query($mysqli, $query)){



        $query3 = "UPDATE apoderados  SET RUT =  '{$rut_apoderado}' , NOMBRE  = '{$nombre_apoderado}' , 
        EMAIL = '{$email_apoderado}',TELEFONO = '{$telefono}',DIRECCION = '{$direccion}' WHERE ID_MATRICULADO = $id_matriculado ";
        if(mysqli_query($mysqli, $query3)){

        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=editado';</script>";

        die();
        }
        else{
            echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=error44';</script>";
        }
    }
    else{
        echo "<script>location.href='E_profesor.php?id_matriculado=$id_matriculado&mensaje=error';</script>";

        die();
    
    }
}
