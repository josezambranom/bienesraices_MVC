<?php 

namespace Controller;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginaController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = redireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router) {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];
            // Crear una nueva instancia
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'e2f90a9c394d2d';
            $mail->Password = '5ad5656c8ab1df';
            $mail->SMTPSecure = 'tls';

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            // Enviar de forma condicional algunos campos(Email o telefono)
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por teléfono</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora contacto: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p>Eligió ser contactado por email</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }
            
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: $ ' . $respuestas['precio'] . '</p>';
            $contenido .= '</hmtl>';
            $mail->Body = $contenido;
            $mail->AltBody = 'Este es texto alternativo sin Html';

            // Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }

        }
    
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }    

    public static function login(Router $router) {
        
    }
}

?>