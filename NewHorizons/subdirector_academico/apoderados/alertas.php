<!-- curso no disponible  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Datos registrados existosamente!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- curso no disponible  -->



<!-- curso no disponible  -->
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
<!-- curso no disponible  -->


<!-- Formato nombre  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_nombre') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Ingrese nombre valido.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- Formato nombre -->


<!-- formato_rut -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_rut') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Rut no válido
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_rut  -->

<!-- formato_email -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_email') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Email no válido.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_email  -->

<!-- formato_telefono -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_telefono') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Telefono no válido.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_telefono  -->

<!-- formato_direccion -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_direccion') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Dirección no válida.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_direccion  -->

<!-- formato_rut -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_rutalumno') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Rut no válido
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_rut  -->


<!-- Apoderado duplicado -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'apoderadoduplicado') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> Registro duplicado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- Apoderado duplicado  -->

<!-- eliminado -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Apoderado eliminada exitosamente</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- eliminado  -->

<!-- EDITADO -->
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
<!-- EDITADO  -->




