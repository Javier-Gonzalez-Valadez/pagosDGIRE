<?php 
    class Conexion{
        
        private $servidor    = '132.247.147.17';
        private $usuario     = 'root';
        private $contrasenia = '';
        private $db          = 'pagos';
        private $conexion;

        public function __construct(){
            
            try {
                $this->conexion = new PDO("mysql:host= $this->servidor; dbname= $this->db", $this->usuario, $this->contrasenia);
                $this->conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMDOE_EXCEPTION);
            } catch (PDOException $e) {
                return 'No se pudo conectar a la base de datos'.$e->getMessage();
            }

        }

        public function ejecutar($query)//Insertar, ModifICAR, Borrar
        {
            $this->conexion->exec($query);
            return $this->conexion->lastInsertId();
        }

        public function consultar($query){

            $sentencia = $this->conexion->prepare($query);
            $sentencia -> execute();
            return $sentencia -> fetchAll();
            
        }


    }


?>