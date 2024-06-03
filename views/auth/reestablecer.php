<div class="contenedor reestablecer">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Introduce tu nueva contraseña</p>

        <?php include_once __DIR__ . '/../templates/alertas.php' ?>

        <?php if($mostrar) :?>

            <form class="formulario" method="POST">

                <div class="campo">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Tu contraseña">
                </div>

                <input type="submit" class="boton" value="Guardar Contraseña">
            </form>

        <?php endif; ?>

        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? Inicia sesión.</a>
            <a href="/olvide">No me acuerdo de mi contraseña.</a>
        </div>
    </div>
</div>

