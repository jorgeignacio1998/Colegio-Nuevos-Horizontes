                    <!-- Alertas minimizar-->
                        <!-- 2.  alerta  mensaje enviado  exitosamente-->
                            <?php
                            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'exito') {
                            ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>El mensaje fue enviado </strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            }
                            ?>
                        <!-- 2. alerta  mensaje enviado  exitosamente -->





                        <!-- 2.  alerta  error captcha   -->
                            <?php
                            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                            ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>El Captcha no ha sido realizado correctamente</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            }
                            ?>
                        <!-- 2. aalerta  error captcha   -->

                        <!--  FORMATO NOMBRE  -->
                            <?php
                            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato1') {
                            ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>ERROR DE FORMATO</strong> El nombre no puede tener numeros o simbolos.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            }
                            ?>
                        <!--FORMATO NOMBRE   -->

                        <!--  FORMATO CORREO  -->
                            <?php
                            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato2') {
                            ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>ERROR DE FORMATO</strong> correo electronico incorrecto.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            }
                            ?>
                        <!--FORMATO CORREO   -->
                        <!--  FORMATO MENSAJE  -->
                            <?php
                            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato3') {
                            ?>

                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>ERROR DE FORMATO</strong> No se permiten algunos caracteres en el campo del mensaje.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            }
                            ?>
                        <!--FORMATO MENSAJE   -->
                    <!-- Alertas minimizar-->