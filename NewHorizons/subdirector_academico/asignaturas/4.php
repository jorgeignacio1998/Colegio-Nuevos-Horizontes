<?php 

require '../seguridad_subdirector.php';


    
$variable = $_POST['variable'];
$id_curso = $variable;
//INYECCIONSQL
$datita = $mysqli->query("SELECT * FROM  cursos WHERE ID LIKE $id_curso");
$sentencia2 =mysqli_fetch_array($datita);
$id_grado = $sentencia2['ID_GRADO'];
$id_curso2 = $sentencia2['ID'];

echo '<script language="javascript">alert("' . 'ALERTO: ' .  $id_curso2   . '");</script>';

//INYECCIONSQL



    
        if(!empty($variable) ){?>
            
            <div class="mb-3 ">
                <label class="form-label lab" for="12">Nombre Asignatura:</label > 
                <select name="asignatura" class="form-control"  required  id="12" >               
                        <?php
                        $sqlAsi = "SELECT * FROM asignaturas  
                        WHERE ID_GRADO LIKE $id_grado";
                        $dataAsi = mysqli_query($mysqli, $sqlAsi);
          
                         while($data = mysqli_fetch_array($dataAsi)){ 
                                            
                            $selected=($id_curso2==$data['ID_A'])?'selected':false;  ?>

                        <option <?=$selected;?> value="<?php echo $data["ID_A"]; ?>"><?php echo utf8_encode($data['NOMBRE']); ?>
                                
                        <?php } ?>
                 </select>  
            </div> 
        <?php 

    }else{
        echo'<h6 class="text-danger text-center mt-3">Datos no encontrados </h6>';
    }


    

?>