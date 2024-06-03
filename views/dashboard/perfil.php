<div class="dashboard">
    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="principal">
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>

        <div class="contenido">
            <h2 class="nombre-pagina"><?=$titulo?></h2>
            <div class="contenedor-sm">
                <?php include_once __DIR__ . '/../templates/alertas.php';?>

                <a href="/cambiar-password" class="enlace">Cambiar contraseña</a>

                <form class="formulario" method="POST">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" value="<?=$usuario->nombre?>" name="nombre" placeholder="Tu nombre">
                    </div>
                    <div class="campo">
                        <label for="nombre">Email</label>
                        <input type="email" value="<?=$usuario->email?>" name="email" placeholder="Tu email">
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