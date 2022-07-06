<!-- credenciales no validas  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'credenciales') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Las credenciales no son validas</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- credenciales no validas  -->







