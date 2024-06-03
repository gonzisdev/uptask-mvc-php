<div class="dashboard">
    <?php include_once __DIR__ . '/../templates/sidebar.php'; ?>

    <div class="principal">
        <?php include_once __DIR__ . '/../templates/barra.php'; ?>

        <div class="contenido">
            <h2 class="nombre-pagina"><?=$titulo?></h2>

            <div class="contenedor-sm">
                <div class="contenedor-nueva-tarea">

                    <button type="button" class="agregar-tarea" id="agregar-tarea">&#43; Nueva tarea</button>

                </div>

                <div id="filtros" class="filtros">
                    <div class="filtros-inputs">
                        <h2>Filtros:</h2>
                        <div class="campo">
                            <label for="todas">Todas</label>
                            <input type="radio" name="filtro" id="todas" value="" checked>
                        </div>
                        <div class="campo">
                            <label for="completadas">Completadas</label>
                            <input type="radio" name="filtro" id="completadas" value="1">
                        </div>
                        <div class="campo">
                            <label for="pendientes">Pendientes</label>
                            <input type="radio" name="filtro" id="pendientes" value="0">
                        </div>
                    </div>
                </div>

                <ul id="listado-tareas" class="listado-tareas"></ul>
            </div>

        </div>
    </div>
</div>

<?php $script = '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="build/js/tareas.js"></script>
    <script src="build/js/app.js"></script>
';
?>