                <!-- 2.  alerta  registrado  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registro realizado exitosamente</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                 <!-- 2. alerta registrado  success -->


                 <!-- 3 alerta ERROR, seguridad.  -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 3 alerta ERROR  -->




                <!-- 4.  alerta    editado  success -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cambios realizados exitosamente</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 4. alerta    registrado  success -->




                <!-- 5.  alerta    eliminado  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>El curso se ha eliminado con exito</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 5. alerta    eliminado  success, TERMINO DE TODAS LAS ALERTAS-->





             
                <!-- 6 formato nombre  -->
                <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_nombre') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El formato del nombre es incorrecto.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 6 formato nombre  -->
                
                
                
                
                <!-- 7 formato RUT  -->
                <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_rut') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El formato del RUT es incorrecto.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 7 formato RUT  -->

                

                


                <!-- rut_repetido  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'profesor_clonado') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El Profesor ya existe.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- rut_repetido   -->




                <!-- rut_repetido  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'rut_repetido') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El Profesor ya existe.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- rut_repetido   -->



                