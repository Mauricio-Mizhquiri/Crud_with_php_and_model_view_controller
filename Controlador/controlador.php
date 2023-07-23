
<?php


require_once("modelo/modelo.php");
require_once("modelo/Usuario.php");
//require_once("config.php");
//creamos una clase 
require_once('TCPDF/tcpdf.php');
//Enviar Email
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class modeloControlador
{
    private $model;

    //constructor
    public function __construct()
    {
        $this->model = new Modelo();
    }

    //método para mostrar 
    static function inicio()
    {
        $usuario = new Modelo();
        $dato = $usuario->mostrar("usuarios", "1");
        require_once("vista/vista.php");
    }

    //metodo para nuevo usuario
    static function nuevo()
    {
        require_once("vista/nuevo.php");
    }

    //metodo para guardar un usuario
    static function guardar()
    {
        $nombre = $_REQUEST['nombre'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $data = new Usuario(null,$nombre,$direccion,$telefono,$email);
        $usuario = new Modelo();
        $dato = $usuario->insertar("usuarios", $data);
        self::enviarCorreo($nombre,$email);
        header("Location: https://localhost/crudTrabajo/");
        exit();
    }



    //método para editar un usuario
    //método editar
    static function editar()
    {
        $id = $_REQUEST['id'];
        $usuario = new Modelo();
        $dato = $usuario->mostrar("usuarios", "id=" . $id);
        require_once("vista/editar.php");
    }

    //método para actualizar
    static function actualizar()
    {
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $data = new Usuario($id, $nombre, $direccion, $telefono, $email);
        $usuario = new Modelo();
        $usuario->actualizar("usuarios", $data, "id=" . $id);
        header("Location: https://localhost/crudTrabajo/");
        exit();
    }

    //método para eliminar
    static function eliminar()
    {
        $id = $_REQUEST['id'];
        $usuario = new Modelo();
        $dato = $usuario->eliminar("usuarios", "id=" . $id);
        header("Location: https://localhost/crudTrabajo/");
        exit();
    }

    static function enviarCorreo($nombre, $correo)
    {
        // Crea una instancia de TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Establece la información básica del PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Tu Nombre');
        $pdf->SetTitle('Correo de Bienvenida');
        $pdf->SetSubject('Gracias por registrarse');
        $pdf->SetKeywords('PDF, ejemplo, correo electrónico');

        // Agrega una página en blanco
        $pdf->AddPage();
        // Agrega contenido al PDF
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Bienvenido', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->MultiCell(0, 10, 'Estimado/a '.$nombre.' ¡Bienvenido/a a nuestra aplicación! Estamos emocionados de tenerte como parte de nuestra comunidad. Esperamos que disfrutes de todas las funciones y beneficios que ofrecemos. Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos. ¡Gracias por unirte!');

        // Genera el contenido del PDF como una cadena
        $pdfContent = $pdf->Output('', 'S');

        $mail = new PHPMailer(true);

        try {
            // Configura el servidor SMTP
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Dirección del servidor SMTP
            $mail->Port = 587; // Puerto del servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'rolando.mizquiri@gmail.com'; // Tu dirección de correo electrónico
            $mail->Password = 'bqhiliptwdmywiqs'; // Tu contraseña de correo electrónico

            // Configura el remitente y destinatario del correo
            $mail->setFrom('rolando.mizquiri@gmail.com', 'Correo de registro');
            $mail->addAddress($correo, $nombre);

            $mail->addStringAttachment($pdfContent, 'archivo.pdf');

            $mail->isHTML(true);
            $mail->Subject = 'Email gmail';
            $mail->Body = 'Gracias por registrarse';
            $mail->AltBody = 'Envio de correo electronico desde la cuenta de GMAIl';

            // Intenta enviar el correo
            $mail->send();
            echo 'Correo enviado correctamente.';
        } catch (Exception $e) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        }


    }


    //validaciones
    function validarInputLetras($input) {
        if (preg_match('/^[a-zA-Z]+$/', $input)) {
            // El input contiene solo letras
            return true;
        } else {
            // El input contiene caracteres no permitidos
            return false;
        }
    }

    function verificar($value, $mensaje){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST[$value]; // Suponiendo que el input se llama 'nombre'
        
            if (self::validarInputLetras($nombre)) {
                // El input es válido
                echo "El input es válido.";
            } else {
                // El input no es válido
                echo "El input no es válido. Solo se permiten letras.";
            }
        }
    }

}





?>