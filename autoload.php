<?php
    function controllers_autoload($filename){
        include_once 'controllers/'.ucfirst($filename).'.php';
        //include_once 'controllers/UsuarioController.php';
    }
 
    spl_autoload_register('controllers_autoload'); 