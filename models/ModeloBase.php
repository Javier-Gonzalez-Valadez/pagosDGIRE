<?php

    require_once "config/conexion.php";
    class ModeloBase extends Conexion{ 
        static public $database;
        //Una vez creado el constructor se conecta a la base de datos
        public function __construct()
        { 
            $this->database = Conexion::connect();  
            $this->databaseSYB = Conexion::connectSYBASE();   
            //var_dump($this->databaseSYB); 
        } 

        //Metodo generico que nos consulta todos los registros de una tabla
        public function consultarTodo($tabla){  
            var_dump($this->database);
            $query = "SELECT * FROM $tabla";
            $stmt = $this->database->prepare($query); 
            $stmt->execute();
            $usuarios = $stmt->fetchAll();
            var_dump($usuarios);
            return $usuarios;
        }

        //Metodo generico que nos elimina un registro de una tabla por el id
        public function borrar($tabla,$id){  
        
            $query = "DELETE FROM $tabla WHERE id= :id"; 
            $stmt = $this->database->prepare($query); 
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute(); 
            //header('Location: index.php/?controller=Usuario&action=borrar'); 
            return "Usuario eliminado satisfactoriamente"; 
            
        }
        
        //Metodo abstracto que nos actualiza un registro de una tabla
        //pasandole el id y el nuevo dato a actualizar
        public function actualizar($tabla, $id, $datoActualizado){ 
            $query = "UPDATE $tabla SET name = :datoNuevo WHERE id= :id";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":datoNuevo", $datoActualizado, PDO::PARAM_STR);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);           
            $stmt->execute();
            return "Dato Actualizado Satisfactoriamente....";
        }
    }