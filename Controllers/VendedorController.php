<?php

namespace Controller;
use Model\Vendedor;
use MVC\Router;

class VendedorController {

    public static function crear(Router $router) {
        $vendedores = new Vendedor;
        // Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear nueva instancia
            $vendedor = new Vendedor($_POST['vendedores']);

            // Validar que no existan campos vacíos
            $errores = $vendedor->validar();

            // No hay errores
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }
        
        $router->render('vendedores/crear', [
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = redireccionar('/admin');
        $vendedores = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar valores
            $args = $_POST['vendedores'];
            // Sincronizar objeto en memoria con lo que el usuario escribió
            $vendedores->sincronizar($args);
            // Validación
            $errores = $vendedores->validar();
    
            if(empty($errores)) {
                $vendedores->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);

    }

    public static function eliminar () {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $propiedad = Vendedor::find($id);
                    $propiedad->eliminar();
                }      
            }
        }
    }

}

?>