<div class="dashboard">
    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="principal">
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>

        <div class="contenido">
            <h2 class="nombre-pagina"><?=$titulo?></h2>

            <?php if(count($proyectos) === 0): ?>
                <p class="no-proyectos">Todavía no hay proyectos || <a href="/crear-proyecto">Crea tu primer proyecto ahora</a></p>
            <?php else: ?>
                <ul class="listado-proyectos">
                    <?php foreach($proyectos as $proyecto): ?>
                        <li class="proyecto">
                            <a href="/proyecto?id=<?=$proyecto->url?>">
                                <?=$proyecto->proyecto?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $script = '
    <script src="build/js/app.js"></script>
';
?>