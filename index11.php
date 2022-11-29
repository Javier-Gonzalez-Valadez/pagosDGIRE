<?php
ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/conexion.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';


function show_error()
{
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) { //Si en la URL existe 'controller'
    $nombre_controlador = $_GET['controller'] . 'Controller'; /*Se asigna el valor de 'controller' que se recibe por URL
                                                                Ejemplo: usuario -> usuarioController*/
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) { /*Si no existe controlador ni accion 
                                                                     Ejemplo usuario/registro*/
    $nombre_controlador = controller_default;                      /*Se asigna el valor por defecto que se obtiene 
                                                                    de parameters.php: usuario/index*/
}

if (class_exists($nombre_controlador)) { //Comprueba si existe el controlador

    $controlador = new $nombre_controlador(); // Crea una instancia. Ejemplo: new UsuarioController

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) { /*Comprueba si se envía accion por URL
                                                                                    y si existe en la clase*/
        $action = $_GET['action'];
        $controlador->$action(); // Ejemplo usuario->registro
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $default = action_default;
        $controlador->$default(); //Se asigna UsuarioController->index() si no se pasa nada por URL/
    } else {
        show_error();
    }
} else {
    show_error();
}
ob_end_flush();
require_once 'views/layout/footer.php';