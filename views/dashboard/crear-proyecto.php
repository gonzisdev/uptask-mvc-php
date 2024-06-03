<div class="dashboard">
    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="principal">
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>

        <div class="contenido">
            <h2 class="nombre-pagina"><?=$titulo?></h2>
            <div class="contenedor-sm">

            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

            <form class="formulario" method="POST">

                <?php include_once __DIR__ . '/formulario-proyecto.php'; ?>

                <input type="submit" value="Crear Proyecto">
            </form>


            </div>

        </div>
    </div>
</div>
<?php $script = '
    <script src="build/js/app.js"></script>
';
?>