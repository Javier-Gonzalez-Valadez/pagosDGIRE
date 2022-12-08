<?php
    require_once "ModeloBase.php";
    class Usuario extends ModeloBase{
        public $nombre;  
        public $password;

        //Importamos el constructor del padre (PARENT), para tener la conexion a la DB
        //Y tener todos los metodos genericos del ModeloBase
        public function __construct()
        {
            parent::__construct();
            //$database = ModeloBase::$database;   
        }
        //GETTERS Y SETTERS
        function setNombre($nombre){
            $this->nombre=$nombre;
        }
        function setPassword($password){   
           $this->password=$password;   
        }
        function getNombre(){
            return $this->nombre;
        } 
        function getPassword(){
            return $this->password;
        }
         

        public function insertar($tabla){ 
            echo "HOLA";
            $query = "INSERT INTO $tabla(`id`,`nombre`,`contra`) VALUES(NULL, :nombre, :passw)";
            echo "<h1>$query</h1>";  
            $stmt = $this->database->prepare($query);  
            $stmt->bindParam(":nombre", $this->getNombre(), PDO::PARAM_STR);   
            $stmt->bindParam(":passw", $this->getPassword(), PDO::PARAM_STR);    
            $stmt->execute();
            return "Se agrego...";
            echo "Ususario agregado Satifactoriamente";
        }
    }