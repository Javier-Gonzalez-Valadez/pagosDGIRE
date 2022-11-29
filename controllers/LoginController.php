<?php 
    class LoginController{

        public function index(){
            echo "Estamos en el Index del LoginController";
            require_once '/views/acceso.php'; 
        }
    }