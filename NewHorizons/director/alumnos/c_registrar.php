<?php
include '../seguridad_director.php'; 
$error = array();

$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";


$nombre1 = $_POST["nombre1"];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$rut_alumno = $_POST['rut_alumno'];
$grado = $_POST['grado'];
$nombre_apoderado = $_POST['nombre_apoderado'];
$rut_apoderado = $_POST['rut_apoderado'];
$periodo_id = $_POST['periodo_id'];
$email_apoderado = $_POST['email'];



// VALIDACIONES FORMATO DE LOS 5 NOMBRES                    
    if(!preg_match($regexNombre,$nombre1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=nombre1';</script>";
    } 
    if(!preg_match($regexNombre,$nombre2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=nombre2';</script>";
    } 
    if(!preg_match($regexNombre,$apellido1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=apellido1';</script>";
    } 
    if(!preg_match($regexNombre,$apellido2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=apellido2';</script>";
    } 
    if(!preg_match($regexNombre,$nombre_apoderado )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=nombre_apoderado';</script>";
    } 
// VALIDACIONES FORMATO DE LOS 5 NOMBRES    




// VALIDACIONES FORMATO DE LOS 2 RUTS                  
    if(!preg_match($regexRut, $rut_alumno)){
        array_push($error, "El RUT del estudiante es invalido");
        echo "<script>location.href='index.php?mensaje=rut1';</script>";
    }  
    if(!preg_match($regexRut, $rut_apoderado)){
        array_push($error, "El RUT del apoderado es invalido");
        echo "<script>location.href='index.php?mensaje=rut2';</script>";
    }  
// VALIDACIONES FORMATO DE LOS 2 RUTS    




// VALIDACIONES AMBOS RUT NO SEAN IGUALES  
    if($rut_alumno == $rut_apoderado){
        array_push($error, "ambos rut son iguales");
        echo "<script>location.href='index.php?mensaje=rut3';</script>";
    }
// VALIDACIONES AMBOS RUT NO SEAN IGUALES  




// VALIDACION RUT ALUMNO YA MATRICULADO
    $rut_existe = $mysqli->query("SELECT * FROM matriculados WHERE RUT_ALUMNO LIKE '{$rut_alumno}' AND ID_PERIODO LIKE $periodo_id");
    if(empty($rut_existe->num_rows)){ 
        //esta ok, el rut si está disponible para registar.
    }else{
        array_push($error, "El estudiante ya esta matriculado ");
        echo "<script>location.href='index.php?mensaje=rut4';</script>";
    }
// VALIDACION RUT ALUMNO YA MATRICULADO


//  FORMATO CORREO ELECTRONICO 
    if(!preg_match($regexEmail, $email_apoderado )){
        array_push($error, "El formato del correo es invalido");  //este mensaje no es visible al usuario, se llena en la lista error, la cual sí está vacia hara cambios en la base de datos.
        echo "<script>location.href='index.php?mensaje=correo1';</script>";
    };
//  FORMATO CORREO ELECTRONICO 







if(count($error)==0){


    
            
        
 
  
 
    


    $query1 = "INSERT INTO matriculados (NOMBRE1_ALUMNO , NOMBRE2_ALUMNO , APELLIDO1_ALUMNO , APELLIDO2_ALUMNO  ,  RUT_ALUMNO  , ID_GRADO , ID_PERIODO) 
              VALUES ('{$nombre1}', '{$nombre2}', '{$apellido1}', '{$apellido2}',  '{$rut_alumno}', '{$grado}', '{$periodo_id}') ";
              
 

    if(mysqli_query($mysqli, $query1)){


            $query2 = "SELECT * FROM matriculados WHERE RUT_ALUMNO LIKE '{$rut_alumno}'";
            $sentencia1 = $mysqli->query($query2);
            $sentencia2 =mysqli_fetch_array($sentencia1);
            $id_matriculado = $sentencia2['ID'];
            
            
            $query3 = "INSERT INTO apoderados (RUT , NOMBRE , EMAIL, ID_MATRICULADO)
            VALUES ('{$rut_apoderado}', '{$nombre_apoderado}', '{$email_apoderado}',  '{$id_matriculado}')";
            

            if(mysqli_query($mysqli, $query3)){
                echo "<script>location.href='index.php?mensaje=registrado';</script>";
            }else{
                echo "<script>location.href='index.php?mensaje=error44';</script>";
            }

        }else{
            echo "<script>location.href='index.php?mensaje=error';</script>";
            exit();
        }
    
    
}



        
?>



