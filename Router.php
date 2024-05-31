<?php 

namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }


    public function comprobarRutas() {

        session_start();
        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar',
            '/vendedores/crear', '/vendedores/actualizar','/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger las rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        if($fn) {
            // La url existe y hay una función asociada
            call_user_func($fn, $this); // Permite llamar una funcion cuando no se sabe su nombre
        } else {
            // La url no existe
            echo "Página no encontrada";
        }
    }

    // Muestra una vista
    public function render($view, $datos = []) {

        foreach($datos as $key => $value) {
            $$key = $value; // Se identifica la llave con $$ y lo muestra con el valor o sintaxis variable de variable
        }

        ob_start(); // Inicia un almacenamiento en memoria del script proporcionado
        include __DIR__ . "/Views/$view.php";

        // Nota: Es importante limpiar para no consumir recursos del servidor de forma innecesaria
        $contenido = ob_get_clean(); // Se limpia la memoria y muestra la vista en la variable descrita 
    

        include __DIR__  . "/Views/layout.php";

    }
}


?>