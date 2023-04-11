<?php 
require_once "models/Login.php";
    class LoginController{

        public function __construct(){
            $this->login = new Login(); 
        }

        public function index(){ 
            require 'views/login/acceso.php';  
        }
    
    }
?>