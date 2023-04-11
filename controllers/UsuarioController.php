<?php 
require_once "models/Usuario.php";
    class UsuarioController{

        public function __construct(){
            $this->usuarios = new Usuario();  
        } 

        //-----------------------------------------------    VISTAS   -------------------------------------------------------
        public function index(){ require 'views/usuario/acceso.php'; } 

        public function acceso(){ require 'views/usuario/accesoAdmin.php'; }

        public function bienvenida(){ require_once 'views/usuario/bienvenida.php'; } 

        public function bienvenido(){ require_once 'views/usuario/bienvenidaConsultas.php'; }  

        public function entrada(){ require_once 'views/usuario/bienvenidaConsultasSubd.php'; }
    
        public function registro(){ $deptos=$this->usuarios->obtenerDeptos(); $perfiles=$this->usuarios->obtenerPerfiles();require 'views/usuario/registro.php'; } 

        public function actualizar(){$deptos=$this->usuarios->obtenerDeptos(); $perfiles=$this->usuarios->obtenerPerfiles(); require_once 'views/usuario/actualizar.php'; } 

        public function eliminar(){ require_once 'views/usuario/eliminar.php'; }
        
        public function registroPrueba(){ require_once 'views/usuario/prueba.php';}  
         
        public function mockup(){ require_once 'views/AdminLTE/mockup.php'; }  

        //----Estas dos funciones son para consultas para usuarios ADMINISTRADORES  
        public function consultarUsuarios(){ $subds=$this->usuarios->obtenerSubdirecciones(); json_encode($subds);
            $deptos=$this->usuarios->obtenerDeptos();  json_encode($deptos);
            $perfiles=$this->usuarios->obtenerPerfiles();  json_encode($perfiles);
            require 'views/usuario/consultarUsuarios.php';}
        public function consultarAsistencias(){$subds=$this->usuarios->obtenerSubdirecciones(); json_encode($subds);
            $deptos=$this->usuarios->obtenerDeptos();  json_encode($deptos); 
            $deptos=$this->usuarios->obtenerDeptos(); require 'views/usuario/consultarAsistencias.php';} 
        //----FIn de consultas para ususarios ADMINISTRADORES

        //---Estas otras dos funciones son para usuarios de CONSULTAS
        public function consultasUsuarios(){ $deptos=$this->usuarios->obtenerDeptos(); $perfiles=$this->usuarios->obtenerPerfiles(); require 'views/usuario/consultarUsuariosConsult.php';}
        public function consultasAsistencias(){
            $deptos=$this->usuarios->obtenerDeptos(); require 'views/usuario/consultarAsistenciasConsult.php';} 
        //---Fin de consultas para usuarios de consultas

        //---Estas otras dos funciones son para usuarios de CONSULTAS POR SUBDIRECCION 
        public function consultasDeUsuarios(){ $deptos=$this->usuarios->obtenerDeptos(); $perfiles=$this->usuarios->obtenerPerfiles();require 'views/usuario/consultarUsuariosConsultSubd.php';}
        public function consultaDeAsistencias(){$deptos=$this->usuarios->obtenerDeptos(); require 'views/usuario/consultarAsistenciasConsultSubd.php';} 
        //---Fin de consultas para usuarios de consultas POR SUBDIRECCION   
 
        public function consultarDeptosPorSubd(){ 
            if(isset($_POST['idSubd'])){
                $idSubd = isset($_POST['idSubd']) ? $_POST['idSubd'] : false;
                if($idSubd){
                    $this->usuarios->setSubdireccion($idSubd);  
                    $deptosPorSubd=$this->usuarios->consultarDeptosPorSubd(); 
                    echo json_encode($deptosPorSubd);    
                }
            }else{
                echo "<script>alert('Fallo');</script>";
            }
        }

        public function consultarTodosUsuariosSubd(){ 
            if(isset($_POST['idSubd'])){
                $idSubd = isset($_POST['idSubd']) ? $_POST['idSubd'] : false;
                if($idSubd){
                    $this->usuarios->setSubdireccion($idSubd);  
                    $todosUsuariosSubd=$this->usuarios->consultarTodosUsuariosSubd(); 
                    echo json_encode($todosUsuariosSubd);    
                }
            }else{
                echo "<script>alert('Fallo');</script>";
            }
        }

        //---------------------------  INTERACCION CON EL MODELO Y LAS VISTAS -------------------------------------------------

        public function mostrar(){  
                if(isset($_GET['noExpdte'])){   
                    $noCuenta = $_GET['noExpdte'];  
                    $this->usuarios->setNoCta($noCuenta); 
                    echo json_encode($this->usuarios->nombrarUsuario());    
            } 
        }  

        public function login(){  
            if(isset($_POST)){  
                $login =          isset($_POST['loginUsuario'])   ? $_POST['loginUsuario']   : false;
                $password =       isset($_POST['passwd'])         ? $_POST['passwd']         : false;  
                
                    if($login && $password){
                        $this->usuarios->setLogin($login); 
                        $this->usuarios->setPassword($password);
                        $usuario=$this->usuarios->login();   
                        if(is_object($usuario) && $usuario && (password_verify($password, $usuario->passwd))){ 
                            if($usuario->idPerfil=="1"){
                                $idSubd=$this->usuarios->obtenerSubdDeUsuario($usuario->idUsuario); 
                                $_SESSION['admin']=$usuario;
                                $_SESSION['subdAdmin']=$idSubd; 
                                unset($_SESSION['consultas']); 
                                unset($_SESSION['consultasSubd']);  
                                unset($_SESSION['subdConsultasSubd']);
                                unset($_SESSION['subdConsultas']);
                                //header("Location: ".base_url."usuario/bienvenida");
                                echo json_encode($usuario);
                            }elseif ($usuario->idPerfil=="2" ) {  
                                $idSubd=$this->usuarios->obtenerSubdDeUsuario($usuario->idUsuario); 
                                if(is_object($idSubd) && $idSubd){
                                    if($idSubd->nomSubd == $usuario->nomArea){
                                        $_SESSION['subdConsultasSubd']=$idSubd;  
                                        $_SESSION['consultasSubd']=$usuario;  
                                        unset($_SESSION['admin']);    
                                        unset($_SESSION['consultas']); 
                                        unset($_SESSION['subdAdmin']);
                                        unset($_SESSION['subdConsultas']);
                                        echo json_encode($usuario);
                                    }else{ 
                                        $_SESSION['subdConsultas']=$idSubd; 
                                        $_SESSION['consultas']=$usuario; 
                                        unset($_SESSION['admin']);    
                                        unset($_SESSION['consultasSubd']); 
                                        unset($_SESSION['subdAdmin']);
                                        unset($_SESSION['consultasSubd']);    
                                        echo json_encode($usuario);
                                    }
                                }
                            }elseif ($usuario->idPerfil=="3") {  
                                echo json_encode($usuario);
                            }
                            else{
                                unset($_SESSION['admin']);    
                                unset($_SESSION['consultas']); 
                                unset($_SESSION['consultasSubd']); 
                                header("Location:".base_url."usuario/acceso");                         
                            }
                        }else {
                            echo json_encode(false);
                            //header("Location:".base_url."usuario/acceso"); 
                        }
                    }
                
            }else{
                header("Location:".base_url."usuario/acceso"); 

            }
        }

        public function cerrarSesion(){ 
            if(isset($_SESSION['admin'])){
                unset($_SESSION['admin']); 
            }
            if(isset($_SESSION['consultas'])) { 
                unset($_SESSION['consultas']);
            }
            if(isset($_SESSION['consultasSubd'])) { 
                unset($_SESSION['consultasSubd']); 
                unset($_SESSION['subdConsultasSubd']); 
            }  
            header("Location:".base_url."usuario/acceso");   
        }  
        
        //----------------------------------------------REGISTRO DE USUARIOS-------------------------------------------------------
        public function buscarPorLoginStaff(){ 
            $loginCert= isset($_POST['loginCert'])           ? $_POST['loginCert']            : false;
            if($loginCert){
                $this->usuarios->setLogin($loginCert);
                $usuario= $this->usuarios->buscarPorLoginStaff();
                
                echo json_encode($usuario);
            }else{
                 echo json_encode('false');
            }
            /* if($usuario){
                echo $usuario;
                var_dump($usuario);  */
                //require 'views/usuario/registro.php'; 
           /*  }else{
                echo "<script>alert('Hubo un error al recuperar el user de la SYBASE')</script>";
            } */
        }
        public function registrarUsuarioCert(){

                $loginCert =          isset($_POST['loginCert'])           ? $_POST['loginCert']            : false;
                $nombreCert =         isset($_POST['nombreCert'])          ? $_POST['nombreCert']           : false;
                $correoCert =         isset($_POST['correoCert'])          ? $_POST['correoCert']           : false;
                $deptoCert=           isset($_POST['deptoCert'])           ? $_POST['deptoCert']            : false;
                $passwordCert =       isset($_POST['passwordCert'])        ? $_POST['passwordCert']         : false;
                $perfilCert =         isset($_POST['perfilCert'])          ? $_POST['perfilCert']           : false; 
                $activoCert =         isset($_POST['activoCert'])          ? $_POST['activoCert']           : false;
                
                if($deptoCert && $nombreCert && $perfilCert && $correoCert && $loginCert && $passwordCert && $activoCert){ 
                    $this->usuarios->setLogin($loginCert);
                    $this->usuarios->setNombre($nombreCert);
                    $this->usuarios->setCorreo($correoCert);
                    $this->usuarios->setDepto($deptoCert);
                    $this->usuarios->setPassword(password_hash($passwordCert, PASSWORD_BCRYPT));
                    $this->usuarios->setPerfil($perfilCert); 
                    $this->usuarios->setActivo($activoCert);           
                    $validar=$this->usuarios->registrarUsuarioCert(); 
                    if($validar){
                        echo  json_encode(array('message' => "Usuario agregado al sistema"));  
                    }else{
                        
                    }
                }else {
                    echo "<script>alert('No se llenaron bien los campos del post');</script>";
                }
        }

        //----------------------------------------FIN DE REGISTRO DE USUARIOS--------------------------------------------



        //-------------------------------------BUSQUEDA DE UN USUARIO EN LA BASE DE DATOS-----------------------------------------  
        public function buscarUsuario(){
            if(isset($_POST)){
                $loginUsuario = isset($_POST['loginUsuario']) ? $_POST['loginUsuario'] : false;

                if($loginUsuario){
                    $this->usuarios->setLogin($loginUsuario);
                    $usuarioEncontrado=$this->usuarios->buscarUsuario();
                    if($usuarioEncontrado){
                        echo json_encode($usuarioEncontrado);  
                    }else{
                        http_response_code(302);  
                        echo  json_encode(array('message' => "Usuario no encontrado en el sistema"));
                    }
                }
            }else{
                    http_response_code(302);  
                    echo  json_encode(array('message' => "Usuario no encontrado en el sistema"));
            }
        }
        //-----------------------------------FIN DE LA BUSQUEDA DE USUARIO EN LA BASE DE DATOS-----------------------------------------



        
        //----------------------------------------REGISTRO DE LLEGADA DE UN USUARIO DE CERTIFICACION-----------------------------------
        public function registrarLlegada(){
            if(isset($_POST)){
               
                $loginUsuario= isset($_POST['loginUsuario']) ? $_POST['loginUsuario'] : false;

                if($loginUsuario){
                    $this->usuarios->setLogin($loginUsuario); 
                    $usuarioObtenido=$this->usuarios->buscarUsuario();  
                    if ($usuarioObtenido){ 
                        if($usuarioObtenido->activo==1){
                            $checoHoy=$this->usuarios->checoHoy($usuarioObtenido->idUsuario); 
                            if($checoHoy){
                                http_response_code(303);  
                                echo  json_encode(array('message' => "El usuario ya ha registrado su asistencia el dia de hoy"));
                            }else{
                                $this->usuarios->registrarLlegada($usuarioObtenido->idUsuario);
                                $horaLlegada = $this->usuarios->obtenerHoraLlegada($usuarioObtenido->idUsuario); 
                                if ($horaLlegada) {  
    
                                    //BUSCAMOS COMBINAR DOS OBJETOS PARA TENER AMBAS PROPIEDADES, DATOS DEL USUARIO Y HORA DE SU ASISTENCIA
                                    $usuario_y_asistencias = (object) array_merge( (array) $usuarioObtenido, (array) $horaLlegada );  
                                    echo json_encode($usuario_y_asistencias);  
                                    
                                }else{ 
                                                                    
                                    http_response_code(302);  
                                    echo  json_encode(array('message' => "Usuario no encontrado en el sistema"));
                                    //header("Location: ".base_url."usuario/index");  
                                }    
                            }  
                        }else{
                            http_response_code(305);  
                            echo  json_encode(array('message' => "El usuario no puede realizar acciones en el sistema, debido a que tiene un estatus 0"));
                        }
                    }else{                             
                            http_response_code(302);  
                            echo json_encode(array('message' => "Usuario no encontrado en el sistema"));        
                    }
                }else{
                            http_response_code(302);
                            echo  json_encode(array('message' => "No ha digitado login del usuario"));
                }
            }
        } 
        //-------------------------------FIN DE REGISTRO DE LA LLEGADA DE USUARIOS DE CERTIFICACION-----------------------------------------




        //----------------------------------------ACTUALIZACION DE USUARIOS-----------------------------------------------------------------------
        public function actualizarUsuarioCert(){  
                
                $idUsuarioCert =        isset($_POST['idUsuarioCert'])      ? $_POST['idUsuarioCert']       : false;
                $nombreCert =           isset($_POST['nombreCert'])         ? $_POST['nombreCert']          : false; 
                $correoCert =           isset($_POST['correoCert'])         ? $_POST['correoCert']          : false;
                $loginCert =            isset($_POST['loginCert'])          ? $_POST['loginCert']           : false;
                $passwordCert =         isset($_POST['passwordCert'])       ? $_POST['passwordCert']        : false; 
                $deptoCert =            isset($_POST['deptoCert'])          ? $_POST['deptoCert']           : false;
                $perfilCert =           isset($_POST['perfilCert'])         ? $_POST['perfilCert']          : false; 
                $fechaRegistroCert =    isset($_POST['fechaRegistroCert'])  ? $_POST['fechaRegistroCert']   : false; 
                $activoCert =           isset($_POST['activoSelect'])       ? $_POST['activoSelect']        : false;  
                
                if($idUsuarioCert && $nombreCert && $correoCert && $loginCert && $passwordCert && $deptoCert && $perfilCert && ($activoCert==0 || $activoCert==1)){
                    $this->usuarios->setID($idUsuarioCert);
                    $this->usuarios->setNombre($nombreCert);
                    $this->usuarios->setCorreo($correoCert); 
                    $this->usuarios->setLogin($loginCert);
                    $this->usuarios->setPassword(password_hash($passwordCert, PASSWORD_BCRYPT));  
                    $this->usuarios->setDepto($deptoCert); 
                    $this->usuarios->setPerfil($perfilCert); 
                    $this->usuarios->setFechaRegistro($fechaRegistroCert);
                    $this->usuarios->setActivo($activoCert);
                    
                    $actualizado=$this->usuarios->actualizarEmpCert();  
                    if($actualizado){
                        echo json_encode(array('message' => "Usuario actualizado correctamente"));
                    }else{
                        http_response_code(302); 
                        echo json_encode("El usuario no se ha podido actualizar, hubo un error!");
                    }
                }
        }

        public function actualizarUsuarioCertSinContra(){  
                
            $idUsuarioCert =        isset($_POST['idUsuarioCert'])      ? $_POST['idUsuarioCert']       : false;
            $nombreCert =           isset($_POST['nombreCert'])         ? $_POST['nombreCert']          : false; 
            $correoCert =           isset($_POST['correoCert'])         ? $_POST['correoCert']          : false;
            $loginCert =            isset($_POST['loginCert'])          ? $_POST['loginCert']           : false;
            $passwordCert =         isset($_POST['passwordCert'])       ? $_POST['passwordCert']        : false; 
            $fechaRegistroCert =    isset($_POST['fechaRegistroCert'])  ? $_POST['fechaRegistroCert']   : false; 
            $activoCert =           isset($_POST['activoSelect'])       ? $_POST['activoSelect']        : false;  
            $deptoCert =            isset($_POST['deptoCert'])          ? $_POST['deptoCert']           : false;
            $perfilCert =           isset($_POST['perfilCert'])         ? $_POST['perfilCert']          : false; 
            if($idUsuarioCert && $nombreCert && $correoCert && $loginCert && ($activoCert==0 ||$activoCert==1) && $deptoCert && $perfilCert){
                $this->usuarios->setID($idUsuarioCert);
                $this->usuarios->setNombre($nombreCert);
                $this->usuarios->setCorreo($correoCert); 
                $this->usuarios->setLogin($loginCert);
                $this->usuarios->setFechaRegistro($fechaRegistroCert); 
                $this->usuarios->setActivo($activoCert);
                $this->usuarios->setDepto($deptoCert); 
                $this->usuarios->setPerfil($perfilCert); 
                $actualizado=$this->usuarios->actualizarEmpCertSinContra();  
                if($actualizado){
                    echo json_encode(array('message' => "Usuario actualizado correctamente"));
                }else{
                    http_response_code(302); 
                    echo json_encode("El usuario no se ha podido actualizar, hubo un error!");
                }
            }
    }

    //------------------------------------------FIN DE ACTUALIZACION DE USUARIOS-----------------------------------------------------------------



    //-----------------------------------------------------CONSULTA DE USUARIOS------------------------------------------------------------
    public function consultarPorDepto(){
        $idArea = isset($_POST['idArea'])      ? $_POST['idArea']       : false;  

        if($idArea){
            $this->usuarios->setDepto($idArea);  
            $usuariosPorDepto=$this->usuarios->consultarPorDepto(); 
            if($usuariosPorDepto){ 
                echo json_encode($usuariosPorDepto); 
             }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Usuario actualizado correctamente"));
            } 
        }
    }
     public function consultarTodos(){
            $todosUsuarios=$this->usuarios->consultarTodos(); 
            if($todosUsuarios){
                echo json_encode($todosUsuarios);  
            }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Usuarios encontrados y listados"));
            }
    }

    public function consultarEmpsCert(){
        $usuariosCert=$this->usuarios->consultarEmpsCert(); 
        if($usuariosCert){
            echo json_encode($usuariosCert);   
            
        }else{
            http_response_code(500); 
            echo json_encode(array('message' => "Usuarios encontrados y listados"));
        }
    }

    public function consultarAdmins(){

        $admins=$this->usuarios->consultarAdmins(); 
        if($admins){
            echo json_encode($admins);    
        }else{
            http_response_code(500); 
            echo json_encode(array('message' => "Usuarios encontrados y listados"));

        }
    }
    public function consultUsuariosPorSubd(){
        $idSubdireccion =        isset($_POST['idSubdireccion'])      ? $_POST['idSubdireccion']       : false; 
        
        if($idSubdireccion){
            $this->usuarios->setSubdireccion($idSubdireccion);
            $usersPorSub=$this->usuarios->consultUsuariosPorSubd();  
            if($usersPorSub){
                echo json_encode($usersPorSub);     
            }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Usuarios encontrados y listados"));
    
            }
        }
    }
    //------------------------------FIN DE CONSULTA DE USUARIOS------------------------------------------



    //-----------------------------------ELIMINACION DE USUARIO POR SU ID-------------------------------------
    public function historialAsistencias(){  
                
        $idUsuario =        isset($_POST['idUsuario'])      ? $_POST['idUsuario']       : false; 

        if($idUsuario){  
            $this->usuarios->setID($idUsuario); 
            $historialAsistencias=$this->usuarios->historialAsistencias();   
            if($historialAsistencias){ 
                echo json_encode($historialAsistencias);
            }else{
                http_response_code(302); 
                echo json_encode("EL usuario no tiene asistecias, se puede elimiinar..."); 
            }
        }
    }
    //-----------------------------------FIN DE ELIMINACION DE USUARIO POR SU ID----------------------------------
    public function eliminarUsuario(){  
                
        $idUsuario =        isset($_POST['idUsuario'])      ? $_POST['idUsuario']       : false; 

        if($idUsuario ){  
            $this->usuarios->setID($idUsuario);
 
            $eliminado=$this->usuarios->eliminarUsuario();  
            if($eliminado){
                echo json_encode(array('message' => "Usuario eliminado correctamente"));
            }else{
                http_response_code(302); 
                echo json_encode("El usuario no se ha podido eliminar, hubo un error!");
            }
        }
    }
    //-----------------------------------FIN DE ELIMINACION DE USUARIO POR SU ID----------------------------------


    //---------------------------------------------------------ASISTENCIAS-------------------------------------------------------------------------

    public function asistenciasHoy(){
        $asistenciasHoy = $this->usuarios->asistenciasHoy();
        if($asistenciasHoy){
            echo json_encode($asistenciasHoy);  
            
        }else{
            http_response_code(500); 
            echo json_encode(array('message' => "Asistencias de los empleados no encontradas"));
        }   
    }
 
    public function asistenciasCert(){
        $asistenciasSinRangoYSinDepto = $this->usuarios->asistenciasSinRangoYSinDepto();
        if($asistenciasSinRangoYSinDepto){
            echo json_encode($asistenciasSinRangoYSinDepto);  
            
        }else{
            http_response_code(500); 
            echo json_encode(array('message' => "Asistencias de los empleados no encontradas"));
        }   
    }

    //ESTE METODO CONSULTA LAS ASISTENCIAS FILTRADAS O SIN FILTRAR SOLO PARA LOS ADMINS-------------------
    public function consultaAsistencias(){ 
        $fechaInicio =         isset($_POST['fechaInicio'])            ? $_POST['fechaInicio']             : false; 
        $fechaFin =            isset($_POST['fechaFin'])               ? $_POST['fechaFin']                : false; 
        $depto =               isset($_POST['depto'])                  ? $_POST['depto']                   : false;
        $subd =                isset($_POST['subd'])                   ? $_POST['subd']                    : false; 

        if($fechaInicio == '' && $fechaFin == ''){
            $fechaInicio=false;
            $fechaFin=false;
        } 
        
        if($fechaInicio && $fechaFin && $subd!="Seleccione" && ($depto!="Seleccione" && $depto=="todo")){//FECHAS, SUBDIRECCION Y TODOS DEPTOS DE LA SUBDIRECCION
            $this->usuarios->setFechaInicio($fechaInicio);
            $this->usuarios->setFechaFin($fechaFin);   
            $this->usuarios->setDepto($depto);
            $this->usuarios->setSubdireccion($subd);
            $asistenciasDeTodosDeptosDeSubdPorFecha = $this->usuarios->asistenciasDeTodosDeptosDeSubdPorFecha(); 
            if($asistenciasDeTodosDeptosDeSubdPorFecha){ 
                $_SESSION['asistenciasDeTodosDeptosDeSubdPorFecha']=$asistenciasDeTodosDeptosDeSubdPorFecha;  
                echo json_encode($asistenciasDeTodosDeptosDeSubdPorFecha);        
                
            }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Asistencias de los empleados no encontradaaaas"));
            }
            
        }/* elseif(($fechaInicio && $fechaFin) && $subd!="Seleccione" && ($depto!="Seleccione" && $depto!="todo")){//---FECHAS Y SUBD Y DEPTO ESPECIFICO DE LA SUBD 
            $this->usuarios->setFechaInicio($fechaInicio);
            $this->usuarios->setFechaFin($fechaFin);  
            $asistenciasRango = $this->usuarios->asistenciasPorRangoSinDepto();
            if($asistenciasRango){
                $_SESSION['asistenciasRangoYSinDepto']=$asistenciasRango;  
                echo json_encode($asistenciasRango);  
                
            }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Asistencias de los empleados no encontradas"));
            }   
        } */ 
        elseif($fechaInicio && $fechaFin && $subd!="Seleccione" && ($depto!="Seleccione" && $depto!="todo")){//---FECHAS Y SUBD Y DEPTO ESPECIFICO DE LA SUBD 
            $this->usuarios->setFechaInicio($fechaInicio);
            $this->usuarios->setFechaFin($fechaFin);
            $this->usuarios->setDepto($depto); 
            $this->usuarios->setSubdireccion($subd);  
            $asistenciasDeDeptoSubdPorFecha = $this->usuarios->asistenciasDeDeptoSubdPorFecha();
            if($asistenciasDeDeptoSubdPorFecha){
                $_SESSION['asistenciasDeDeptoSubdPorFecha']=$asistenciasDeDeptoSubdPorFecha;  
                echo json_encode($asistenciasDeDeptoSubdPorFecha);   
                
            }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Asistencias de los empleados no encontradas"));
            }   
        }
        elseif (($fechaInicio && $fechaFin)==false && $subd!="Seleccione" && ($depto!="Seleccione" && $depto=="todo")) {//SOLO SUBD Y EL DAPARTAMENTO, Y SE LLAMA AL METODO DEL MODELO CORRESPONDIENTE
            $this->usuarios->setSubdireccion($subd);
            $asistenciasDeTodosDeptosDeSubdSinFecha = $this->usuarios->asistenciasDeTodosDeptosDeSubdSinFecha(); 
            if($asistenciasDeTodosDeptosDeSubdSinFecha){ 
                $_SESSION['asistenciasDeTodosDeptosDeSubdSinFecha']=$asistenciasDeTodosDeptosDeSubdSinFecha;  
                echo json_encode($asistenciasDeTodosDeptosDeSubdSinFecha);     
            }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Asistencias de los empleados no encontradas")); 
            }
            //Asistencias sin rango y sin depto (Todas las que existen en departamento de certificación) -------------------------------------
        }
        elseif (($fechaInicio && $fechaFin)==false && $subd!="Seleccione" && ($depto!="Seleccione" && $depto!="todo")) { 
           // echo "<script>alert('controlleeeeeeeeeeeer');</script>";
            $this->usuarios->setSubdireccion($subd);
            $this->usuarios->setDepto($depto);
            $asistenciasDeUnDeptoDeSubdSinFecha = $this->usuarios->asistenciasDeUnDeptoDeSubdSinFecha(); 
            if($asistenciasDeUnDeptoDeSubdSinFecha){ 
                $_SESSION['asistenciasDeUnDeptoDeSubdSinFecha']=$asistenciasDeUnDeptoDeSubdSinFecha;  
                echo json_encode($asistenciasDeUnDeptoDeSubdSinFecha);        
            }else{
                http_response_code(500); 
                echo json_encode(array('message' => "Asistencias de los empleados no encontradas"));
            } 
        }
    }
    //FIN DE ESTE METODO QUE CONSULTA LAS ASISTENCIAS FILTRADAS O SIN FILTRAR SOLO PARA LOS ADMINS-------------------

    //METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SEGUN SU DEPARTAMENTO
    public function asistenciasHoyConsult(){
        $idArea = isset($_POST['idArea']) ? $_POST['idArea'] : false;
        if($idArea){
            $this->usuarios->setDepto($idArea);
            $asistenciasHoyConsult=$this->usuarios->asistenciasHoyConsult();
            echo json_encode($asistenciasHoyConsult);
        }  
    }
    //FIN DE METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SEGUN SU DEPARTAMENTO

    //METODO QUE CONSULTA LAS ASISTENCIAS POR FECHA PARA USUARIOS DE CONSULTAS SEGUN SU DEPARTAMENTO
    public function asistenciasPorFechaConsult(){
        $fechaInicio =         isset($_POST['fechaInicio'])            ? $_POST['fechaInicio']             : false; 
        $fechaFin =            isset($_POST['fechaFin'])               ? $_POST['fechaFin']                : false; 
        $depto =               isset($_POST['depto'])                  ? $_POST['depto']                   : false; 
        if($fechaInicio && $fechaFin && $depto){
            $this->usuarios->setFechaInicio($fechaInicio);
            $this->usuarios->setFechaFin($fechaFin);   
            $this->usuarios->setDepto($depto);
            $asistenciasPorFechaConsult=$this->usuarios->asistenciasPorFechaConsult();
            if($asistenciasPorFechaConsult){
                echo json_encode($asistenciasPorFechaConsult);
            }
        }
    }
    //FIN DE METODO QUE CONSULTA LAS ASISTENCIAS POR FECHA PARA USUARIOS DE CONSULTAS SEGUN SU DEPARTAMENTO

    //METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SEGUN SU DEPARTAMENTO
    public function asistenciasTodasConsult(){
        $idArea = isset($_POST['idArea']) ? $_POST['idArea'] : false;
        if($idArea){
            $this->usuarios->setDepto($idArea);
            $asistenciasTodasConsult=$this->usuarios->asistenciasTodasConsult();
            echo json_encode($asistenciasTodasConsult);
        } 
    }
    //FIN DE METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SEGUN SU DEPARTAMENTO


    //METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SUBD SEGUN SU SUBD
    public function asistenciasHoyConsultSubd(){
        $idSubd=  isset($_POST['idSubdireccion'])            ? $_POST['idSubdireccion']             : false;
        if($idSubd){
            $this->usuarios->setSubdireccion($idSubd);
            $asistenciasHoyConsultSubd=$this->usuarios->asistenciasHoyConsultSubd();
            echo json_encode($asistenciasHoyConsultSubd);    
        }     
    }
    //FIN DE METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SUBD SEGUN SU SUBD
    //METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SUBD SEGUN SU SUBD
    public function asistenciasTodasConsultSubd(){
        $idSubd=  isset($_POST['idSubdireccion'])            ? $_POST['idSubdireccion']             : false;
        if($idSubd){
            $this->usuarios->setSubdireccion($idSubd);
            $asistenciasTodasConsultSubd=$this->usuarios->asistenciasTodasConsultSubd(); 
            echo json_encode($asistenciasTodasConsultSubd);    
        }    
    }
    //FIN DE METODO QUE CONSULTA LAS ASISTENCIAS DE HOY PARA USUARIOS DE CONSULTAS SUBD SEGUN SU SUBD

    //METODO QUE CONSULTA LAS ASISTENCIAS POR FECHA PARA USUARIOS DE CONSULTAS POR DUBSIRECCION 
    public function asistenciasPorFechaConsultSubd(){
        $fechaInicio =         isset($_POST['fechaInicio'])            ? $_POST['fechaInicio']             : false; 
        $fechaFin =            isset($_POST['fechaFin'])               ? $_POST['fechaFin']                : false;
        $idSubd=               isset($_POST['idSubdireccion'])         ? $_POST['idSubdireccion']          : false; 
        if($fechaInicio && $fechaFin && $idSubd){
            $this->usuarios->setFechaInicio($fechaInicio);
            $this->usuarios->setFechaFin($fechaFin); 
            $this->usuarios->setSubdireccion($idSubd);   
            $asistenciasPorFechaConsultSubd=$this->usuarios->asistenciasPorFechaConsultSubd();
            if($asistenciasPorFechaConsultSubd){
                echo json_encode($asistenciasPorFechaConsultSubd); 
            } 
        }
    }
    //FIN DE METODO QUE CONSULTA LAS ASISTENCIAS POR FECHA PARA USUARIOS DE CONSULTAS POR DUBSIRECCION

    
    //--------------------------------------------------------FIN DE ASISTENCIAS--------------------------------------------------------------------
}
?>