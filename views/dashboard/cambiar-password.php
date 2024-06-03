<div class="dashboard">
    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="principal">
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>

        <div class="contenido">
            <h2 class="nombre-pagina"><?=$titulo?></h2>
            <div class="contenedor-sm">
                <?php include_once __DIR__ . '/../templates/alertas.php';?>

                <a href="/perfil" class="enlace">Volver al Perfil</a>

                <form class="formulario" method="POST">
                    <div class="campo">
                        <label for="password_actual">Contraseña Actual</label>
                        <input type="password" name="password_actual" placeholder="Tu contraseña actual">
                    </div>
                    <div class="campo">
                        <label for="password_nuevo">Nueva Contraseña</label>
                        <input type="password" name="password_nuevo" placeholder="Tu nueva contraseña">
                    </div>

                    <input type="submit" value="Guardar Cambios">
                </form>
            </div>
        </div>
    </div>
</div>

<?php $script = '
    <script src="build/js/app.js"></script>
';
?>