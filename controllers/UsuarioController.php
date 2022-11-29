<?php 
    class UsuarioController{

        public function index(){
            //echo "Estamos en el Index del UsuarioController";
            require_once 'views/usuario/acceso.php';  
        }

        public function registro(){ 
            require_once 'views/usuario/registro.php'; 
        } 

        public function recuperarContrasenia(){
            require_once 'views/usuario/recuperar_contrasenia.php'; 
        }

        public function cedula(){
            require_once 'views/usuario/cedula.php'; 
        }
    }