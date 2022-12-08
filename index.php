<?php
    require_once 'autoload.php'; 
    require_once 'config/parameters.php';  
    require 'views/layouts/cabecera.php'; 

    function show_error(){
        $error = new ErrorController();
        $error->index();
    } 

    if(isset($_GET['controller'])){
        $nombreController = ($_GET['controller'].'Controller');
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){/*Si no existe controlador ni accion */
        //$nombreController = controller_default;/*Se asigna el valor por defecto que se obtiene 
        //de parameters.php: Usuario/index*/ 
    }else{ 
        show_error();
    }

    if(class_exists($nombreController)){ 
        $controlador = new $nombreController();

        if(isset($_GET['action']) && method_exists($controlador, $_GET['action']) ){
            $action = $_GET['action'];
            echo $controlador->$action(); 
    
        }else{
            show_error();
        }
    }
    else{
        show_error();
    }
?>
    
<?php 
    require 'views/layouts/pie.php';     
?>