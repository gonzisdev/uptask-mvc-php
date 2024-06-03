<?php

namespace Model;

class Usuario extends ActiveRecord{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $password2;
    public $password_actual;
    public $password_nuevo;
    public $token;
    public $confirmado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
        $this->password_nuevo = $args['password_nuevo'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
    }

    // Validar el login de usuarios
    public function validarLogin() : array{
        if (!$this->email) {
            self::$alertas['error'][] = 'El email de usuario es obligatorio';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El email no es válido';
        }

        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        return self::$alertas;
    }


    // Validacion para cuentas nuevas
    public function validarNuevaCuenta() : array{
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre de usuario es obligatorio';
        }

        if (!$this->email) {
            self::$alertas['error'][] = 'El email de usuario es obligatorio';
        }

        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }

        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La contraseña no puede tener menos de 6 caracteres';
        }

        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Las contraseñas no coinciden';
        }
        return self::$alertas;
    }

    // Valida un email
    public function validarEmail() : array{
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'El email no es válido';
        }
        return self::$alertas;
    }

    // Valida la contraseña
    public function validarPassword() : array{
        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }

        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La contraseña no puede tener menos de 6 caracteres';
        }
        return self::$alertas;
    }

    public function validar_perfil() : array{
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El nombre de usuario es obligatorio';
        }

        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }

    public function nuevo_password() : array{
        if (!$this->password_actual) {
            self::$alertas['error'][] = 'La contraseña actual no puede estar vacía';
        }

        if (!$this->password_nuevo) {
            self::$alertas['error'][] = 'La nueva contraseña no puede estar vacía';
        }

        if (strlen($this->password_nuevo) < 6) {
            self::$alertas['error'][] = 'La contraseña no puede tener menos de 6 caracteres';
        }
        return self::$alertas;
    }

    // Comprobar el password
    public function comprobar_password() : bool{
        return password_verify($this->password_actual, $this->password);
    }

    // Hashea la contraseña
    public function hashPassword() : void{
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar un token
    public function crearToken() : void{
        $this->token = uniqid();
    }
}