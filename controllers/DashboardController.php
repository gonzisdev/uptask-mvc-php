<?php

namespace Controllers;

use Model\Proyecto;
use Model\Usuario;
use MVC\Router;

class DashboardController{
    public static function index (Router $router){
        session_start();

        isAuth();

        $id = $_SESSION['id'];
        $proyectos = Proyecto::belongsTo('propietarioId', $id);

        $router->render('dashboard/index', [
            'titulo' => 'Proyectos',
            'proyectos' => $proyectos
        ]);
    }

    public static function crear_proyecto (Router $router){
        session_start();

        isAuth();

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto($_POST);

            // Validacion
            $alertas = $proyecto->validarProyecto();

            if (empty($alertas)) {
                // Generar una URL unica
                $hash = md5(uniqid());
                $proyecto->url = $hash;

                // Almacenar el creador del proyecto
                $proyecto->propietarioId = $_SESSION['id'];

                // Guardar proyecto
                $proyecto->guardar();

                // Redireccionar
                header('Location: /proyecto?id='.$proyecto->url);
            }
        }

        $router->render('dashboard/crear-proyecto', [
            'titulo' => 'Nuevo Proyecto',
            'alertas' => $alertas
        ]);
    }

    public static function proyecto(Router $router){
        session_start();

        isAuth();

        $token = $_GET['id'];
        if (!$token) header('Location: /dashboard');
        // Revisar que la persona que entra al proyecto es la creadora del proyecto
        $proyecto = Proyecto::where('url', $token);
        if ($proyecto->propietarioId !== $_SESSION['id']) {
            header('Location: /dashboard');
        }

        $router->render('dashboard/proyecto', [
            'titulo' => $proyecto->proyecto
        ]);
    }

    public static function perfil (Router $router){
        session_start();

        isAuth();

        $alertas = [];

        $usuario = Usuario::find($_SESSION['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_perfil();

            if (empty($alertas)) {
                // Verificar que el email nuevo no existe
                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario && $existeUsuario->id !== $usuario->id) {
                    // Mostrar error
                    Usuario::setAlerta('error', 'Email no válido - Usuario ya registrado');
                    $alertas = $usuario->getAlertas();
                } else {
                    // Guardar el usuario
                    $usuario->guardar();
                    Usuario::setAlerta('exito', 'Usuario actualizado correctamente');
                    $alertas = $usuario->getAlertas();
                    // Asignar el nombre nuevo a la barra
                    $_SESSION['nombre'] = $usuario->nombre;
                }
            }
        }

        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function cambiar_password(Router $router){
        session_start();

        isAuth();

        $alertas = [];

        $usuario = Usuario::find($_SESSION['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Sincronizar con los datos del usuario
            $usuario->sincronizar($_POST);
            $alertas = $usuario->nuevo_password();

            if (empty($alertas)) {
                $resultado = $usuario->comprobar_password();
                if ($resultado) {
                    $usuario->password = $usuario->password_nuevo;
                    // Eliminar propiedades no necesarias
                    unset($usuario->password_actual);
                    unset($usuario->password_nuevo);
                    // Hashear nuevo password
                    $usuario->hashPassword();
                    // Actualizar
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        Usuario::setAlerta('exito', 'Contraseña actualizada correctamente');
                        $alertas = $usuario->getAlertas();
                    }
                } else {
                    Usuario::setAlerta('error', 'Contraseña incorrecta');
                    $alertas = $usuario->getAlertas();
                }
            }

        
        }

        $router->render('dashboard/cambiar-password', [
            'titulo' => 'Cambiar Contraseña',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}