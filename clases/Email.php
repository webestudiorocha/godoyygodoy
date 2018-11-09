<?php namespace Clases;
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Email
{
	private $asunto;
	private $receptor;
	private $emisor;
	private $mensaje;

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function emailEnviar()
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = SMTP_EMAIL;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS_EMAIL;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($this->emisor, '');
            $mail->addAddress($this->receptor, '');     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->asunto;
            $mail->Body = $this->mensaje;
            $mail->AltBody = strip_tags($this->mensaje);

            $mail->send();
            echo '<div class="alert alert-success" role="alert">
            ¡Consulta enviada correctamente!
            </div>';
        }catch (Exception $e) {
            echo '<div class="alert alert-danger" role="alert">
            ¡No se ha podido enviar su consulta, ha ocurrido un error! 
            </div>', $mail->ErrorInfo;
        }
    }
}
?>