<?php
    //require_once "conexion.php"; 
    //INSERCION DE DATOS EN EL SERVIDOR LOCAL--------------------------------------
    /*if(isset($_POST)){        
        $nombre=$_POST['nombre'];  
        $objConexion= new Conexion(); 
        $objConexion->connect(); 
        $objConexion->ejecutar("INSERT INTO `prueba` (`id`, `name`) VALUES(NULL, '$nombre');"); 
        //header('Location:pruebaSQLocal.php');
    }else{
        header('Location:' . base_url . 'usuario/registroPrueba');
    }
    //INSERCION DE REGISTROS EN BASE DE DATOS DEL SERVIDOR------------------------
    /*if($_POST){       
        $nombre=$_POST['nombre'];  
        $objConexion= new Conexion(); 
        $objConexion->connect(); 
        $objConexion->ejecutar("INSERT INTO `prueba` (`id`, `nombre_cpleto`) VALUES(NULL, '$nombre');"); 
        header('Location:pruebaSQLocal.php');
    }else{
        
    }*/
?>

<div class="container">
        <p></p>
        <div class="container"></div> 
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div> 

            <div class="col-md-4">  
                    <div class="card border-primary">
                        <div class="card-header border-primary bg-transparent">  
                            <h2><i class="fa fa-user"> Iniciar Sesion</i></h2>
                        </div>
                        
                        <div class="card-body"> 
                            <form action="<?=base_url?>usuario/registroPrueba" method="POST">
                            hola
                                <h6>Nombre Completo:</h6>
                                <input type="text" class="form-control" name="nombre"><br/>
                                <h6>Contraseña:</h6>
                                <input type="text" class="form-control" name="contra"><br/> 
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>
                        </div>

                    </div>


            </div>
            <div class="col-md-4"></div>
        </div>
</div>
