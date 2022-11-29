<?php
     $host = "localhost";
     $user = "javi";
     $password = "123";
     $db = "prueba";
     
     
     //Configurar DSN
     $dsn = 'mysql:host=' . $host . ';dbname=' . $db;
     
     //Crear una instancia PDO
     $pdo = new PDO($dsn, $user, $password);
     
     //Agregar el setAttribute de manera global
     //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

     //Query con PDO 
     $query = $pdo->query("SELECT * FROM prueba");
     $result = $query->fetchAll();
     
    foreach ($result as $data) {
        # code...
        echo $data['name']."<br/>";
        
    }
?>