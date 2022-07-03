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


<!-- La sala ingresada ya esta en uso  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'sala') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> La sala ingresada ya esta en uso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- La sala ingresada ya esta en uso -->


<!-- formato_piso -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_piso') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR DE FORMATO</strong> Solo se permiten ingresar numeros en piso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_piso  -->

<!-- formato_numero -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_numero') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR DE FORMATO</strong> Solo se permiten ingresar numeros en Numero de la sala.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_numero  -->

<!-- eliminado -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sala eliminada exitosamente</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- eliminado  -->




