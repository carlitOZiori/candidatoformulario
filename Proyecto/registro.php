<?php

require_once 'Conexion.php'; 
require_once 'C:/wamp64/www/Proyecto/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'C:/wamp64/www/Proyecto/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once 'C:/wamp64/www/Proyecto/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['submit'])) {
      
        $nombre = $_POST['nombre'];
        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $email = $_POST['email'];
        $confirmar_email = $_POST['confirmar_email'];

        
        if ($email === $confirmar_email) {
        
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           
                $sql = "INSERT INTO Candidato (Nombre, ApellidoP, ApellidoM, Email) 
                        VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$email')";

                if ($mysqli->query($sql) === TRUE) {
                    
                    $mail = new PHPMailer(true);

                    try {
                      
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com'; 
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'funetesmori@gmail.com'; 
                        $mail->Password   = 'rwje umtn hgjh ktcu'; 
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 587;

                       
                        $mail->setFrom('fuentesmori@gmail.com', 'Empresa De Lacteos S.A. de C.V.');
                        $mail->addAddress($email); 
                        $mail->Subject = 'Correo de Validación';
                        $mail->Body    = 'Gracias por registrarte. Por favor, haz clic en el siguiente enlace para completar tu registro: <a href="http://localhost/Proyecto/Interfaz2.html?email=' . urlencode($email) . '">Segundo formulario</a>';

                      
                        $mail->send();

                        
                        header('Location: registroexitoso.html');
                        exit();
                    } catch (Exception $e) {
                        
                        echo 'Hubo un error al enviar el correo electrónico: ', $e->getMessage();
                    }
                } else {
                    echo "Error al insertar registro: " . $mysqli->error;
                }
            } else {
                echo 'El correo electrónico no es válido.';
            }
        } else {
            
            echo 'El correo electrónico y la confirmación del correo electrónico no coinciden.';
        }
    }
}
?>
