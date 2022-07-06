

                <!-- 2.  alerta  registrado  success -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
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
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
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
                    <!-- 3 alerta ERROR, error444.  -->
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


                    <!-- 3 alerta formato_numero, .  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_numero') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR DE FORMATO</strong> solo se permiten numeros naturales en el numero de evaluación
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 3 alerta formato_numero  -->
           
                    <!-- 3 alerta formato_numero, .  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'existe') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR </strong> la evualuacion ya existe.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 3 alerta formato_numero  -->
                <!-- 3 alerta formato_numero  -->
           
                    <!-- 3 alerta formato_numero, .  -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'max') {
                    ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR </strong> El numero de la evaluacion no puede sobrepasar los 15.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- 3 alerta formato_numero  -->
           