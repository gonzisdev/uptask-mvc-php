<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    public function enviarConfirmacion(){
        // Crear el objecto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '2ee7f10ede3925';
        $mail->Password = '300520e42e12a3';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'upTask.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet ='UTF-8';

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>$this->nombre</strong>. Has creado tu cuenta en upTask, solo debes confirmarla en el siguiente enlace:</p>";
        $contenido .= "<p>Haz click aquí: <a href='http://uptask/confirmar?token=$this->token'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no has solicitado la creación de esta cuenta, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar email
        $mail->send();
    }

    public function enviarInstrucciones(){
        // Crear el objecto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '2ee7f10ede3925';
        $mail->Password = '300520e42e12a3';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'upTask.com');
        $mail->Subject = 'Reestablece tu contraseña';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet ='UTF-8';

        $contenido = "<html>";
        $contenido .= "<p>Hola <strong>$this->nombre</strong>. Has solicitado reestablecer tu contraseña. Ve al siguiente enlace para hacerlo:</p>";
        $contenido .= "<p>Haz click aquí: <a href='http://uptask/reestablecer?token=$this->token'>Reestablecer contraseña</a></p>";
        $contenido .= "<p>Si no has solicitado reestablecer tu contraseña, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar email
        $mail->send();
    }
}