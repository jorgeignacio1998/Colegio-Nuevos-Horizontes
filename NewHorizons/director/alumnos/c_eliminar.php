<?php 
include '../seguridad_director.php';

if(!isset($_GET['id_matriculado'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}

    //recibiendo id de la asignacion para borrarlo.
    $id_matriculado = $_GET['id_matriculado'];


    //buscando ID_PERIODO y  ID_ GRADO para actualizar el cupo (tabla matriculas)
    $query4 = "SELECT * FROM matriculados WHERE ID LIKE $id_matriculado ";
    $sentencia4 = $mysqli->query($query4);
    $sentencia44 =mysqli_fetch_array($sentencia4);
    $id_grado = $sentencia44['ID_GRADO'];
    $id_periodo = $sentencia44['ID_PERIODO'];
    //buscando ID_PERIODO y  ID_ GRADO para actualizar el cupo (tabla matriculas)


    //BUSCANDO NUMERO DE CUPOS DE LA MATRICULA PARA AUMENTARLE 1.
    $query5 = "SELECT * FROM matriculas WHERE ID_GRADO LIKE $id_grado AND ID_PERIODO LIKE $id_periodo ";
    $sentencia5 = $mysqli->query($query5);
    $sentencia55 =mysqli_fetch_array($sentencia5);
    $cupos = $sentencia55['CUPOS'];
    $cupos_actualizados = $cupos +1;
    //BUSCANDO NUMERO DE CUPOS DE LA MATRICULA PARA AUMENTARLE 1.

    //ACTUALIZANDO CAMPO CUPO + 1
    $query6 = "UPDATE matriculas  SET  CUPOS = $cupos_actualizados WHERE ID_PERIODO LIKE $id_periodo AND ID_GRADO LIKE $id_grado ";
    if(mysqli_query($mysqli, $query6)){
        //Eliminando los datos
        $query = "DELETE FROM matriculados WHERE ID LIKE '{$id_matriculado}'";
    
        if(mysqli_query($mysqli, $query)){
            
            echo "<script>location.href='index.php?mensaje=eliminado';</script>";
        
            die();
        }
        else{
            echo "<script>location.href='index.php?mensaje=error';</script>";
        
            die();
          
        }

    }


?>