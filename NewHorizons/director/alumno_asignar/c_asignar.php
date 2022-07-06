<?php
require '../seguridad_director.php';
$error = array();



    // id matriculado
    $alumno = $_POST["alumno"];
    $id_curso = $_POST["curso"];

    $query0 = "SELECT * FROM matriculados WHERE ID LIKE $alumno";
    $sentencia1 = $mysqli->query($query0);
    $sentencia2 =mysqli_fetch_array($sentencia1);


    $query00 = "SELECT * FROM cursos WHERE ID  LIKE $id_curso";
    $sentencia10 = $mysqli->query($query00);
    $sentencia20 =mysqli_fetch_array($sentencia10);


    
    // echo '<script language="javascript">alert("' .  $Alertavariable   . '");</script>';


    if($sentencia2['ID_GRADO'] != $sentencia20['ID_GRADO']){
        array_push($error, "el curso no es el indicado");  
        echo "<script>location.href='index.php?mensaje=curso_no_indicado';</script>";
       
    }

   

    $id_matriculado= $sentencia2['ID'];
    $n1= $sentencia2['NOMBRE1_ALUMNO'];
    $n2= $sentencia2['NOMBRE2_ALUMNO'];
    $n3= $sentencia2['APELLIDO1_ALUMNO'];
    $n4= $sentencia2['APELLIDO2_ALUMNO'];
    $rut = $sentencia2['RUT_ALUMNO'];
    $id_grado = $sentencia2['ID_GRADO'];
    

    
    $query001 = "SELECT * FROM apoderados WHERE ID_MATRICULADO LIKE $id_matriculado";
    $sentencia101 = $mysqli->query($query001);
    $sentencia201 =mysqli_fetch_array($sentencia101);

    $id_apoderado = $sentencia201['ID'];




    
    
    //  echo '<script language="javascript">alert("' .  $id_apoderado   . '");</script>';










if(count($error)==0) {     
    
    $query = "INSERT INTO alumnos (NOMBRE_1,NOMBRE_2 ,APELLIDO_1,APELLIDO_2,RUT,ID_APODERADO,ID_CURSO 	) 
    VALUES ('{$n1}','{$n2}','{$n3}','{$n4}','{$rut}','{$id_apoderado}','{$id_curso}') ";

    if(mysqli_query($mysqli, $query)){

        $query2 = "UPDATE matriculados SET ASIGNADO = 'ASIGNADO'
        WHERE ID  = $id_matriculado";
    

        if(mysqli_query($mysqli, $query2)){

            echo "<script>location.href='index.php?mensaje=asignado&grado=$id_grado';</script>";
            die();
        }else{
            echo "<script>location.href='index.php?mensaje=error444';</script>";
        
            die();
          
        }

       
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }
}
    
?>