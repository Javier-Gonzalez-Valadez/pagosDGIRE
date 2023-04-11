<?php       
    
    class Conexion{ 

        public static function connect()  
        {   
            try{  
               //s echo "Conectado satisfactoriamente"; 


                //----------------------CONEXION PARA SERVIDOR DE PRODUCCION----------------
                //-------------------(AUN NO TENGO BASE DE DATOS EN EL 15)-----------------------
                //$conexion = new PDO("mysql:host=localhost; port=54321 ;dbname=Mercurioz_pagos_v2020", "dba_mercurioz",'#ME_dbz$pk24');
                //$conexion = new PDO("mysql:host=localhost; dbname=Mercurioz_pagos_v2020", "dba_mercurioz",'#ME_dbz$pk24');   
                //$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                //$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);  
   
 
                //----------------------CONEXION PARA SERVIDOR DE DESARROLLO----------------
                $conexion = new PDO("mysql:host=localhost; port=7408;", "dba_control_asistencia",'#MEP_dbz$pk17*');    
                //$conexion = new PDO("mysql:host=localhost; dbname=Mercurioz_pagos_v2020", "dba_mercurioz",'#ME_dbz$pk24');    
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $conexion; 
 
            }catch(PDOException $e){ 
                return "Falla de conexion".$e->getMessage();   
            } 
             
        }  
        public static function connectSYBASE()    
        {     
            try{   
                //$dns="Driver={FreeTDS};Server=132.248.38.8;Port=4101;Database=estadisticas; TDS_Version=5.0;"
                //$conexionSYBASE = new PDO("dblib:host=132.248.38.8;port=4101;dbname=estadisticas", "javiergv",'PKSd8icF');         
                $conexionSYBASE = new PDO("dblib:host=132.248.38.8:4101; dbname:estadisticas;", "javiergv",'PKSd8icF');    
                $conexionSYBASE->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                $conexionSYBASE->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $conexionSYBASE->exec("set char_convert utf8"); // Agregamos esta línea para configurar la codificación  
                return $conexionSYBASE;  


            }catch(PDOException $e){ 
                die( "Falla de conexion".$e->getMessage());   
            } 

        }
}