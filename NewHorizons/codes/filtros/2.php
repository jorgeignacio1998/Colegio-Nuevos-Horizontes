<?php 

require '../seguridad_subdirector.php';
$datos_usuario = $mysqli->query("SELECT * FROM usuarios"); //obtiene datos de todos los usuarios MENOS los tipos de usuario Nivel 1 (servirá para pintar los datos en la tabla (250 fila))
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";
    
$variable = $_POST['variable'];
$id_curso = $variable;
  

//INYECCIONSQL
    $datita = $mysqli->query("SELECT * FROM  cursos WHERE ID LIKE '{$id_curso}'");
    $sentencia2 =mysqli_fetch_array($datita);
    $id_grado = $sentencia2['ID_GRADO'];
 //INYECCIONSQL


    
        if(!empty($variable) ){?>
            <div class="mb-3">
                <label class="form-label lab" for="7">Asignatura</label > 
                <select name="id_asignatura" class="form-control"  required  id="7" >
                    <option disabled selected value >  </option>
                        <?php
                        $sqlTipo = "SELECT *, grados.NIVEL AS gnivel,asignaturas.ID_A AS ideasig,  grados.ID AS graid  
                        FROM  asignaturas INNER JOIN grados ON asignaturas.ID_GRADO = grados.ID 
                        WHERE grados.ID = $id_grado
                        ";
                        $datos = mysqli_query($mysqli, $sqlTipo);
                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID

                      
                        while($data = mysqli_fetch_array($datos)){

                        ?>

                        <option value="<?php echo $data["ID_A"]; ?>"><?php echo utf8_encode($data['NOMBRE'] ); ?>

                        <?php }
                        ?>

                        
                </select>  
            </div>  
        <?php 

    }else{
        echo'<h6 class="text-danger text-center mt-3">Datos no encontrados </h6>';
    }


    

?>