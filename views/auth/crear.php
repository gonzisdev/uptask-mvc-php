<div class="contenedor crear">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en UpTask</p>

        <?php include_once __DIR__ . '/../templates/alertas.php' ?>

        <form class="formulario" method="POST">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" value="<?=$usuario->nombre?>">
            </div>

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Tu email" value="<?=$usuario->email?>">
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Tu contraseña">
            </div>

            <div class="campo">
                <label for="password2">Repetir contraseña</label>
                <input type="password" id="password2" name="password2" placeholder="Repite tu contraseña">
            </div>

            <input type="submit" class="boton" value="Crear Cuenta">
        </form>
        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? Inicia sesión.</a>
            <a href="/olvide">No me acuerdo de mi contraseña.</a>
        </div>
    </div>
</div>

