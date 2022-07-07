


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

<!-- curso no disponible  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_descripcion') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR DE FORMATO</strong> La descripción no soporta caracteres especiales o no cumple con el formato.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- curso no disponible  -->


<!-- eliminado -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Anotación eliminada con exito</strong> 
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




