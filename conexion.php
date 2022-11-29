<?php
    
    class Conexion{ 
        
        private $db_config ="mysql:host=localhost; dbname=prueba";  
        private $usuario ="javi";
        private $password = '123'; 
        private $conexion;
        //-------------------------CREDENCIALES MYSQL DEL SERVER------------------- 
        /*private $db_config ="mysql:host=localhost; dbname=Mercurioz_pagos_v2020";  
        private $usuario ="dba_mercurioz";
        private $password = '#ME_dbz$pk24';
        private $conexion;*/
   
        public function connect() 
        {  
            try{  
                echo "Conectado satisfactoriamente";
                $this->conexion = new PDO($this->db_config, $this->usuario, $this->password);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conexion; 
            }catch(PDOException $e){
                return "Falla de conexion".$e->getMessage();  
            }
        } 
        
        
        public function ejecutar($sql){//Insertar, Actualizar, Borrar
            $this->conexion->exec($sql);
            return $this->conexion->lastInsertId();
        }

        public function consultar($sql){//Listar    
            $sentencia=$this->conexion->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(); 
        }
    }

?>