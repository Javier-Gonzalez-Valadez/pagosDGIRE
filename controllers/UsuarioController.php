<?php 
    class UsuarioController{

        public function index(){
            //echo "Estamos en el Index del UsuarioController";
            require_once 'views/usuario/acceso.php'; 

        }

        public function registro(){  
            require_once 'views/usuario/registro.php'; 
        } 

        public function registroPrueba(){
            require_once "models/Usuario.php";
            //Verificamos si ha un envio por POST
            if(isset($_POST)){
                //Inicializamos cada variable con el contenido que llega por post,
                //Y si no, la inicializamos a false
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;  
                $contra = isset($_POST['contra']) ? $_POST['contra'] : false;
                

                //Verificamos que todos los campos lleguen con un valor
                if($nombre && $contra){
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);  
                    $usuario->setPassword($contra); 
                    $usuario->insertar("pruebaPagos"); 
                }
                
            }else{
                header("Location:" . base_url . 'usuario/registroPrueba');  
            }
            //header("Location:" . base_url . 'usuario/registro');
            require_once 'views/usuario/prueba.php'; 
            
        } 

        public function recuperarContrasenia(){
            require_once 'views/usuario/recuperar_contrasenia.php'; 
        }

        public function cedula(){
            require_once 'views/usuario/cedula.php'; 
        }

        public function consultarAPI(){
            require_once 'views/usuario/pruebaAsset.php'; 
        }
    }