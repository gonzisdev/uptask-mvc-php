<div class="contenedor login">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Inicia Sesión en UpTask</p>

        <?php include_once __DIR__ . '/../templates/alertas.php' ?>

        <form class="formulario" method="POST">

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Tu email">
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Tu contraseña">
            </div>

            <input type="submit" class="boton" value="Iniciar Sesión">
        </form>
        <div class="acciones">
            <a href="/crear">¿Aún no tienes cuenta? Regístrate ahora.</a>
            <a href="/olvide">No me acuerdo de mi contraseña.</a>
        </div>
    </div>
</div>

