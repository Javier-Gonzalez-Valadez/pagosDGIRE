<?php

//ob_start();
session_start(); 
require_once 'autoload.php';
require_once 'helpers/utils.php'; 
include_once 'config/conexion.php';
require_once 'config/parameters.php'; 
 
function show_error() 
{
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])){ //Si en la URL existe 'controller'
    $nombreController = $_GET['controller'] . 'Controller'; //Se asigna el valor de 'controller' que se recibe por URL
                                                             // Ejemplo: ?usuario -> usuarioController
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) { //Si no existe controller ni accion 
                                                                    //Ejemplo usuario/index
    $nombreController = controller_default;   
    //$action = action_default;
    //$controller = new $nombreController();
    //$controller->$action;                      //Se asigna el valor por defecto que se obtiene s                        //de parameters.php
} else {
   
    show_error();
    echo "<script>console.log('Primera entrada');</script>";
    exit();  
} 

if (class_exists($nombreController)) { 
  
    $controller = new $nombreController(); // Ejemplo: new UsuarioController
    //var_dump(get_class($controller));  

    if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {  
        $action = $_GET['action'];
        $controller->$action(); // Ejemplo usuario->registro 
    }elseif (!isset($_GET['controller']) && !isset($_GET['action']))  {
        $action = action_default;
        $controller->$action();
    }  else {
        show_error();
        echo "<script>console.log( 'Segunda entrada');</script>";
    }  
} else { 
    

    show_error();
    echo "<script>console.log( 'Tercera entrada');</script>";
}
//ob_end_flush();