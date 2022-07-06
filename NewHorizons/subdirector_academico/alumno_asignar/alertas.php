
                 <!-- 3 alerta ERROR, seguridad.  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'curso_no_indicado') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> El curso no es el indicado. 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 3 alerta ERROR  -->


                <!-- 2.  alerta  registrado  success -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'asignado') {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>registro realizado exitosamente</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                 <!-- 2. alerta registrado  success -->

                <!--cambios realizados exitosament -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'cambiado') {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>cambios realizados exitosamente</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                 <!-- cambios realizados exitosament -->
                <!-- 2.  alerta  eliminado  success -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>registro eliminado exitosamente</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                 <!-- 2. alerta eliminado  success -->

                     <!-- 3 alerta ERROR, seguridad.  -->
                     <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 3 alerta ERROR  -->
                    <!-- 3 alerta ERROR, seguridad.  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error444') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR</strong> error 444
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 3 alerta ERROR  -->