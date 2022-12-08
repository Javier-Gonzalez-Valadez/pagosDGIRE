<?php
    
    class Conexion{ 

        public static function connect()  
        {   
            try{  
                echo "Conectado satisfactoriamente"; 
                  
                //$conexion = new PDO("mysql:host=localhost; port=54321 ;dbname=Mercurioz_pagos_v2020", "dba_mercurioz",'#ME_dbz$pk24');
                $conexion = new PDO("mysql:host=localhost; dbname=Mercurioz_pagos_v2020", "dba_mercurioz",'#ME_dbz$pk24');   
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
                return $conexion; 
            }catch(PDOException $e){
                return "Falla de conexion".$e->getMessage();   
            }
            
        } 

    }