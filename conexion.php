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
   
        public static function connect() 
        {  
            try{   
                echo "Conectado satisfactoriamente";
               //$conexion = new PDO("mysql:host=localhost; port=54321 ;dbname=Mercurioz_pagos_v2020", "dba_mercurioz",'#ME_dbz$pk24');
               $conexion = new PDO("mysql:host=localhost; dbname=prueba", "javi",'123');  
               $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
               return $conexion; 
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