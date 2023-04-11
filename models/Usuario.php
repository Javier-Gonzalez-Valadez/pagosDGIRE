<?php
    require_once "ModeloBase.php";
    class Usuario extends ModeloBase{
        private $idUsuario;
        private $departamento;
        private $idSubdireccion;
        private $perfil; 
        private $login;
        private $nombre;
        private $primerApellido;
        private $segundoApellido;
        private $correo;
        private $passw; 
        private $fechaRegistro;
        private $activo;

        private $fechaInicio;
        private $fechaFin;

        //Importamos el constructor del padre (PARENT), para tener la conexion a la DB
        //Y tener todos los metodos genericos del ModeloBase
        public function __construct()
        {
            parent::__construct();  
        }

        //_-----------------------SETTERS--------------------
        function setID($idUsuario){
            $this->idUsuario=$idUsuario; 
        }
        function setDepto($departamento){
            $this->departamento=$departamento;
        }
        function setSubdireccion($idSubdireccion){
            $this->idSubdireccion=$idSubdireccion; 
        }
        function setPerfil($perfil){
            $this->perfil=$perfil;
        }
        function setLogin($login){
            $this->login=$login;
        }
        function setNombre($nombre){
            $this->nombre=$nombre;
        } 
        function setPrimerApellido($primerApellido){
            $this->primerApellido=$primerApellido; 
        }
        function setSegundoApellido($segundoApellido){
            $this->segundoApellido=$segundoApellido;
        }
        function setCorreo($correo){
            $this->correo=$correo;
        }
        function setPassword($passw){   
            $this->passw=$passw;  
        }
        function setFechaRegistro($fechaRegistro){    
            $this->fechaRegistro=$fechaRegistro;  
        }
        function setActivo($activo){   
            $this->activo=$activo;  
        } 
        function setFechaInicio($fechaInicio){   
            $this->fechaInicio=$fechaInicio;  
        }
        function setFechaFin($fechaFin){    
            $this->fechaFin=$fechaFin;  
        }
        //----------------------GETTERS-----------------------
        function getID(){ 
            return $this->idUsuario;
        } 
        function getDepto(){ 
            return $this->departamento;
        } 
        function getSubdireccion(){ 
            return $this->idSubdireccion;
        } 
        function getPerfil(){
            return $this->perfil;
        }
        function getLogin(){
            return $this->login;
        }  
        function getNombre(){
            return $this->nombre;
        }
        function getPrimerApellido(){
            return $this->primerApellido;
        } 
        function getSegundoApellido(){
            return $this->segundoApellido;
        }
        function getCorreo(){ 
            return $this->correo;
        } 
        function getPassword(){ 
            return $this->passw;  
        }
        function getFechaRegistro(){ 
            return $this->fechaRegistro;  
        }   
        function getActivo(){ 
            return $this->activo;  
        }
        function getFechaInicio(){ 
            return $this->fechaInicio;  
        }      
        function getFechaFin(){ 
            return $this->fechaFin;  
        }      

        public function obtenerDeptos(){
            $query="SELECT * FROM Mercurioz_control_asistencia.ct_areas";
            $stmt = $this->database->prepare($query);  
            $stmt->execute();
            $deptos = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $deptos;
        }

        public function obtenerPerfiles(){
            $query="SELECT * FROM Mercurioz_control_asistencia.ct_perfiles";
            $stmt = $this->database->prepare($query);  
            $stmt->execute();
            $perfiles = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $perfiles;
        }

        public function obtenerSubdirecciones(){ 
            $query="SELECT * FROM Mercurioz_control_asistencia.ct_subdirecciones";
            $stmt = $this->database->prepare($query);  
            $stmt->execute();
            $subdirecciones = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $subdirecciones; 
        }
        //
 
        public function consultarDeptosPorSubd(){ 
            try{
                $query="SELECT * FROM Mercurioz_control_asistencia.ct_areas, Mercurioz_control_asistencia.ct_subdirecciones 
                WHERE  Mercurioz_control_asistencia.ct_areas.idSubdireccion=Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion 
                AND Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion=:idSubdireccion"; 
                $stmt = $this->database->prepare($query);  
                $stmt->bindParam(':idSubdireccion', $this->getSubdireccion(), PDO::PARAM_INT);   
                $stmt->execute();
                $deptosPorSubd = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $deptosPorSubd; 
            } catch (Exception $e) {
                die($e->getMessage());  
            }
            
        }
 
        public function consultarTodosUsuariosSubd(){ 
            try{
                $query="SELECT Mercurioz_control_asistencia.usuarios.nombre, Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido, 
                Mercurioz_control_asistencia.usuarios.loginUsuario, Mercurioz_control_asistencia.usuarios.correo, 
                Mercurioz_control_asistencia.ct_perfiles.nomPerfil, Mercurioz_control_asistencia.ct_areas.nomArea
                FROM Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_perfiles, Mercurioz_control_asistencia.ct_areas, Mercurioz_control_asistencia.ct_subdirecciones 
                WHERE Mercurioz_control_asistencia.usuarios.idPerfil = Mercurioz_control_asistencia.ct_perfiles.idPerfil AND 
                Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion=Mercurioz_control_asistencia.ct_areas.idSubdireccion AND 
                Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion=:idSubdireccion"; 
                $stmt = $this->database->prepare($query);  
                $stmt->bindParam(':idSubdireccion', $this->getSubdireccion(), PDO::PARAM_INT);   
                $stmt->execute();
                $todosUsuariosSubd["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $todosUsuariosSubd;  
            } catch (Exception $e) {
                die($e->getMessage());  
            }
             
        }
        

         public function login(){ 
            $query="SELECT Mercurioz_control_asistencia.ct_areas.nomArea, Mercurioz_control_asistencia.usuarios.idUsuario, Mercurioz_control_asistencia.usuarios.idArea, 
            Mercurioz_control_asistencia.usuarios.idPerfil, Mercurioz_control_asistencia.usuarios.loginUsuario, 
            Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido, 
             Mercurioz_control_asistencia.usuarios.correo, Mercurioz_control_asistencia.usuarios.passwd, Mercurioz_control_asistencia.usuarios.fechaRegistro,
              Mercurioz_control_asistencia.usuarios.activo FROM Mercurioz_control_asistencia.ct_areas,
               Mercurioz_control_asistencia.usuarios 
               WHERE Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea 
              AND Mercurioz_control_asistencia.usuarios.loginUsuario=:loginUsuario";
            $stmt= $this->database->prepare($query);
            $stmt->bindParam(':loginUsuario', $this->getLogin(), PDO::PARAM_STR);   
            //$stmt->bindParam(':passwd', $this->getPassword(), PDO::PARAM_STR);  
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
            if($usuario){
                return $usuario;  
            }else{
                return false;  
            }       
        }
 
        //SELECT Mercurioz_control_asistencia.usuarios.idUsuario, Mercurioz_control_asistencia.usuarios.idArea, Mercurioz_control_asistencia.usuarios.idPerfil, Mercurioz_control_asistencia.usuarios.loginUsuario, Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido,  Mercurioz_control_asistencia.usuarios.correo, Mercurioz_control_asistencia.usuarios.passwd, Mercurioz_control_asistencia.usuarios.fechaRegistro, Mercurioz_control_asistencia.usuarios.activo, Mercurioz_control_asistencia.ct_areas.nomArea FROM Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas WHERE Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.usuarios.idUsuario = 50
        
        public function actualizarEmpCert(){  
            try {  
                $query = "UPDATE Mercurioz_control_asistencia.usuarios SET nombre = :nombre, 
                correo=:correo, passwd=:passwd, loginUsuario=:loginUsuario, idArea=:idDepto, idPerfil=:idPerfil, fechaRegistro=:fechaRegistro,
                activo = :activo WHERE idUsuario=:idUsuario";    
                $stmt = $this->database->prepare($query); 
                $stmt->bindParam(":idUsuario",       $this->getID(),              PDO::PARAM_INT);  
                $stmt->bindParam(":idDepto",         $this->getDepto(),           PDO::PARAM_INT);  
                $stmt->bindParam(":idPerfil",        $this->getPerfil(),          PDO::PARAM_INT);   
                $stmt->bindParam(":loginUsuario",    $this->getLogin(),           PDO::PARAM_STR);
                $stmt->bindParam(":nombre",          $this->getNombre(),          PDO::PARAM_STR);
                $stmt->bindParam(":correo",          $this->getCorreo(),          PDO::PARAM_STR);
                $stmt->bindParam(":passwd",          $this->getPassword(),        PDO::PARAM_STR);
                $stmt->bindParam(":fechaRegistro",   $this->getFechaRegistro(),   PDO::PARAM_STR); 
                $stmt->bindParam(":activo",          $this->getActivo(),          PDO::PARAM_INT);  
                $stmt->execute();  
                return true; 
            } catch (Exception $e) {
                die($e->getMessage()); 
            }
        } 

        public function actualizarEmpCertSinContra(){  
            try {  
                $query = "UPDATE Mercurioz_control_asistencia.usuarios SET nombre = :nombre, 
                correo=:correo, loginUsuario=:loginUsuario, idArea=:idDepto, idPerfil=:idPerfil, fechaRegistro=:fechaRegistro,
                activo = :activo WHERE idUsuario=:idUsuario";    
                $stmt = $this->database->prepare($query); 
                $stmt->bindParam(":idUsuario",       $this->getID(),              PDO::PARAM_INT);  
                $stmt->bindParam(":idDepto",         $this->getDepto(),           PDO::PARAM_INT);  
                $stmt->bindParam(":idPerfil",        $this->getPerfil(),          PDO::PARAM_INT);   
                $stmt->bindParam(":loginUsuario",    $this->getLogin(),           PDO::PARAM_STR);
                $stmt->bindParam(":nombre",          $this->getNombre(),          PDO::PARAM_STR);
                $stmt->bindParam(":correo",          $this->getCorreo(),          PDO::PARAM_STR);
                $stmt->bindParam(":fechaRegistro",   $this->getFechaRegistro(),   PDO::PARAM_STR); 
                $stmt->bindParam(":activo",          $this->getActivo(),          PDO::PARAM_INT);  
                $stmt->execute(); 
                return true;
            } catch (Exception $e) {
                die($e->getMessage()); 
            }
        } 


        public function eliminarUsuario(){
            $query = "DELETE FROM Mercurioz_control_asistencia.usuarios WHERE idUsuario=:idUsuario";
            $stmt = $this->database->prepare($query); 
            $stmt->bindParam(":idUsuario",       $this->getID(),              PDO::PARAM_INT); 
            $stmt->execute(); 
            return true; 
        }

        public function buscarPorLoginStaff(){
            $query="SELECT * FROM estadisticas.dbo.e_staff WHERE staff_login=:staff_login";
            $stmt = $this->databaseSYB->prepare($query); 
            $stmt->bindParam(":staff_login", $this->getLogin(), PDO::PARAM_STR); 
            $stmt->execute();  
            $usuarioObtenidoStaff = $stmt->fetch(PDO::FETCH_OBJ); 
            if($usuarioObtenidoStaff){  
                return $usuarioObtenidoStaff; 
            }else{ 
                return false; 
            }   
        }
 
        public function registrarUsuarioCert(){
            try {
                $query = "INSERT INTO Mercurioz_control_asistencia.usuarios (idUsuario, idArea, idPerfil, loginUsuario,
                nombre, primerApellido,segundoApellido, correo, passwd, fechaRegistro, activo)  
                VALUES(NULL, :idArea, :idPerfil, :loginUsuario, :nombre, NULL, NULL, :correo, :passwd, NOW(), :activo)"; 
                $stmt = $this->database->prepare($query);
                $stmt->bindParam(":idArea",          $this->getDepto(),           PDO::PARAM_INT);  
                $stmt->bindParam(":idPerfil",        $this->getPerfil(),          PDO::PARAM_INT);   
                $stmt->bindParam(":loginUsuario",    $this->getLogin(),           PDO::PARAM_STR);
                $stmt->bindParam(":nombre",          $this->getNombre(),          PDO::PARAM_STR);
                $stmt->bindParam(":correo",          $this->getCorreo(),          PDO::PARAM_STR);
                $stmt->bindParam(":passwd",          $this->getPassword(),        PDO::PARAM_STR);
                $stmt->bindParam(":activo",          $this->getActivo(),          PDO::PARAM_INT);  
                $stmt->execute();
                return true;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        public function buscarUsuario(){  
            $query="SELECT Mercurioz_control_asistencia.ct_areas.nomArea, Mercurioz_control_asistencia.usuarios.idUsuario, Mercurioz_control_asistencia.usuarios.idArea, 
            Mercurioz_control_asistencia.usuarios.idPerfil, Mercurioz_control_asistencia.usuarios.loginUsuario, 
            Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido, 
             Mercurioz_control_asistencia.usuarios.correo, Mercurioz_control_asistencia.usuarios.passwd, Mercurioz_control_asistencia.usuarios.fechaRegistro,
              Mercurioz_control_asistencia.usuarios.activo FROM Mercurioz_control_asistencia.ct_areas,
               Mercurioz_control_asistencia.usuarios 
               WHERE Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea 
              AND Mercurioz_control_asistencia.usuarios.loginUsuario=:loginUsuario";
            $stmt= $this->database->prepare($query);
            $stmt->bindParam(':loginUsuario', $this->getLogin(), PDO::PARAM_STR);  
            $stmt->execute();
            $usuarioObtenido = $stmt->fetch(PDO::FETCH_OBJ); 
            if(is_object($usuarioObtenido) && $usuarioObtenido){ 
                return $usuarioObtenido; 
            }else{ 
                return false; 
            }   
        }
         
        public function checoHoy($idUsuario){
            $query="SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') from Mercurioz_control_asistencia.asistencias,Mercurioz_control_asistencia.usuarios
            WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') = DATE_FORMAT(CURDATE(),'%d/%m/%Y') AND
            Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario AND Mercurioz_control_asistencia.asistencias.idUsuario=:idUsuario";
            $stmt= $this->database->prepare($query);
            $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
            $asistencia = $stmt->fetch(PDO::FETCH_OBJ); 
            if($asistencia){
                return true;
            }else{
                return false; 
            }
            
        }  

        public function registrarLlegada($idUsuario){
            $query = "INSERT INTO Mercurioz_control_asistencia.asistencias (idAsistencia, idUsuario, llegada, vigente)
            VALUES(NULL, :idUsuario, NOW(), 1)"; 
            $stmt = $this->database->prepare($query); 
            $stmt->bindParam(":idUsuario",    $idUsuario,           PDO::PARAM_INT);  
            $stmt->execute();
            return true; 
        }

        public function obtenerHoraLlegada($idUsuario){
            $query = "SELECT * FROM Mercurioz_control_asistencia.asistencias WHERE idUsuario = :idUsuario
             ORDER BY idAsistencia DESC LIMIT 1";
            $stmt = $this->database->prepare($query); 
            $stmt->bindParam(":idUsuario",    $idUsuario,           PDO::PARAM_INT);  
            $stmt->execute();
            $horaLlegada = $stmt->fetch(PDO::FETCH_OBJ); 
            return $horaLlegada;    
        }
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------        
//---------------------------------------------------------------------USUARIOS------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        //SE CONSULTAN TODOS LOS USUARIOS EXISTENTES--------------------- 
        public function consultarTodos(){
            $query= "SELECT Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.usuarios.loginUsuario,
             Mercurioz_control_asistencia.usuarios.correo, Mercurioz_control_asistencia.ct_perfiles.nomPerfil, 
            Mercurioz_control_asistencia.ct_areas.nomArea FROM Mercurioz_control_asistencia.usuarios,  
            Mercurioz_control_asistencia.ct_perfiles, Mercurioz_control_asistencia.ct_areas 
             WHERE Mercurioz_control_asistencia.usuarios.idPerfil = Mercurioz_control_asistencia.ct_perfiles.idPerfil 
             AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea"; 
            $stmt = $this->database->prepare($query);  
            $stmt->execute();
            $todosUsuarios["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);   
            return $todosUsuarios; 
        }
        //FIN DE LA CONSUTA DE TODOS LOS USUARIOS-------------------------


        //SE CONSULTAN LOS USUARIOS DE UN DEPARTAMENTO EN ESPECIFICO-------------------
        public function consultarPorDepto(){
            try { 
                $query= "SELECT Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.usuarios.loginUsuario, 
                Mercurioz_control_asistencia.usuarios.correo, Mercurioz_control_asistencia.ct_perfiles.nomPerfil, 
                Mercurioz_control_asistencia.ct_areas.nomArea FROM Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_perfiles, 
                Mercurioz_control_asistencia.ct_areas WHERE Mercurioz_control_asistencia.usuarios.idPerfil = Mercurioz_control_asistencia.ct_perfiles.idPerfil 
                AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea 
                AND Mercurioz_control_asistencia.usuarios.idArea=:idArea"; 
                $stmt = $this->database->prepare($query); 
                $stmt->bindParam(":idArea",    $this->getDepto(),           PDO::PARAM_INT);  
                $stmt->execute();
                $usuarios["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);  
                return $usuarios;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        //FIN DE CONSULTA DE USUARIOS DE UN DEPARTAMENTO EN ESPECIFICO-----------------------

         //SE CONSULTAN LOS USUARIOS DE UN DEPARTAMENTO EN ESPECIFICO-------------------
         public function consultUsuariosPorSubd(){ 
            try { 
                $query= "SELECT Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.usuarios.loginUsuario,
                Mercurioz_control_asistencia.usuarios.correo, Mercurioz_control_asistencia.ct_perfiles.nomPerfil, 
                Mercurioz_control_asistencia.ct_areas.nomArea FROM Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_perfiles, 
                Mercurioz_control_asistencia.ct_areas,Mercurioz_control_asistencia.ct_subdirecciones
                WHERE Mercurioz_control_asistencia.usuarios.idPerfil = Mercurioz_control_asistencia.ct_perfiles.idPerfil 
                AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea 
                AND Mercurioz_control_asistencia.ct_areas.idSubdireccion = Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion 
                AND Mercurioz_control_asistencia.ct_areas.idSubdireccion=:idSubdireccion"; 
                $stmt = $this->database->prepare($query); 
                $stmt->bindParam(":idSubdireccion",    $this->getSubdireccion(),           PDO::PARAM_INT);   
                $stmt->execute();
                $usuariosPorSubd["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);  
                return $usuariosPorSubd; 
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------        
//---------------------------------------------------------------------FIN DE USUARIOS------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


 
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------        
//---------------------------------------------------------------------ASISTENCIAS------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        //DEVUELVE EL HISTORIAL DE ASISTENCIAS DE UN USUARIO, A TRAVER DE SU ID
        public function historialAsistencias(){ 
            $query="SELECT * FROM Mercurioz_control_asistencia.asistencias WHERE idUsuario = :idUsuario ";
            $stmt = $this->database->prepare($query); 
            $stmt->bindParam(":idUsuario",       $this->getID(),              PDO::PARAM_INT); 
            $stmt->execute(); 
            $historialAsistencias= $stmt->fetchAll(PDO::FETCH_OBJ);  
            if ($historialAsistencias) { 
                return $historialAsistencias; 
            }else{
                return false;   
            }

        }
        //FIN EL HISTORIAL DE ASISTENCIAS DE UN USUARIO, A TRAVER DE SU ID

        //SE CONSULTAN LAS ASISTENCIAS DE HOY PARA ADMINS, TODOS LOS DEPARTAMENTOS
        public function asistenciasHoy(){ 
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, 
            Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido, Mercurioz_control_asistencia.ct_areas.nomArea, 
            TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada 
                FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas 
            WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') = DATE_FORMAT(CURDATE(),'%d/%m/%Y') 
            AND Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario 
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, 
            Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->execute();
            $asistenciasHoy['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);    
            return $asistenciasHoy;
        }
        //FIN DE CONSULTAN LAS ASISTENCIAS DE HOY PARA ADMINS, TODOS LOS DEPARTAMENTOS 
 
        public function obtenerSubdDeUsuario($idUsuario){
            $query="SELECT Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion, Mercurioz_control_asistencia.ct_subdirecciones.nomSubd FROM Mercurioz_control_asistencia.ct_subdirecciones, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas WHERE Mercurioz_control_asistencia.usuarios.idArea=Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.ct_areas.idSubdireccion = Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion AND Mercurioz_control_asistencia.usuarios.idUsuario=$idUsuario";
            $stmt = $this->database->prepare($query); 
            $stmt->execute();
            $idSubd= $stmt->fetch(PDO::FETCH_OBJ);  
            return $idSubd; 
        }

        //SE CONSULTAN LAS ASISTENCIAS DE HOY PARA USUARIO CONSUL, SEGUN SU DEPARTAMENTO-----------------------------------------------
        public function asistenciasHoyConsult(){
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, 
            Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido, Mercurioz_control_asistencia.ct_areas.nomArea, 
            TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada 
                FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas 
            WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') = DATE_FORMAT(CURDATE(),'%d/%m/%Y') 
            AND Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario 
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.usuarios.idArea=
            :idArea ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":idArea",    $this->getDepto(),           PDO::PARAM_INT);  
            $stmt->execute();
            $asistenciasHoyConsult['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);    
            return $asistenciasHoyConsult;
        } 
        //FIN DE CONSULTA DE ASISTENCIAS DE UN USUARIO CONSULT SEGUN SU DEPARTAMENTO--------------------------------------------------

        //SE CONSULTAN TODAS ASISTENCIAS USUARIO CONSUL, SEGUN SU DEPARTAMENTO-----------------------------------------------
        public function asistenciasTodasConsult(){
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, 
            Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido, Mercurioz_control_asistencia.ct_areas.nomArea, 
            TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada 
                FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas 
            WHERE Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario 
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.usuarios.idArea=
            :idArea ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":idArea",    $this->getDepto(),           PDO::PARAM_INT);  
            $stmt->execute();
            $asistenciasTodasConsult['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);    
            return $asistenciasTodasConsult; 
        } 
        //FIN TODAS ASISTENCIAS DE UN USUARIO CONSULT SEGUN SU DEPARTAMENTO--------------------------------------------------

        //---------------------------SE CONSULTAN LAS ASISTENCIAS DE HOY PARA USUARIO CONSULT SUBD, SEGUN LA SUBDIRECCION DEL USUARIO--------------------
        public function asistenciasHoyConsultSubd(){  
            $query="SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, Mercurioz_control_asistencia.ct_areas.nomArea, TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas, Mercurioz_control_asistencia.ct_subdirecciones WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') = DATE_FORMAT(CURDATE(),'%d/%m/%Y') AND Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.ct_areas.idSubdireccion = Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion AND Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion=:idSubdireccion ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":idSubdireccion",    $this->getSubdireccion(),           PDO::PARAM_INT);  
            $stmt->execute();  
            $asistenciasHoyConsultSubd['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);     
            return $asistenciasHoyConsultSubd;
        } 
        //---------------------FIN DE CONSULTA DE ASISTENCIAS DE HOY PARA USUARIO CONSULT SUBD, SEGUN LA SUBDIRECCION DEL USUARIO-----------------------

        //---------------------------SE CONSULTAN TODAS LAS ASISTENCIAS  PARA USUARIO CONSULT SUBD, SEGUN LA SUBDIRECCION DEL USUARIO--------------------
        public function asistenciasTodasConsultSubd(){  
            $query="SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, Mercurioz_control_asistencia.ct_areas.nomArea, TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas, Mercurioz_control_asistencia.ct_subdirecciones WHERE Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.ct_areas.idSubdireccion = Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion AND Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion=:idSubdireccion ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":idSubdireccion",    $this->getSubdireccion(),           PDO::PARAM_INT);  
            $stmt->execute();  
            $asistenciasTodasConsultSubd['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);    
            return $asistenciasTodasConsultSubd;
        } 
        //---------------------FIN DE CONSULTA DE ASISTENCIAS DE HOY PARA USUARIO CONSULT SUBD, SEGUN LA SUBDIRECCION DEL USUARIO-----------------------

        //SE CONSULTAN ASISTENCIAS PARA USUARIO CONSUL, POR FECHAS Y SEGUN SU DEPARTAMENTO------------------------------------------
        public function asistenciasPorFechaConsult(){  
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, 
            Mercurioz_control_asistencia.usuarios.primerApellido, Mercurioz_control_asistencia.usuarios.segundoApellido, 
            Mercurioz_control_asistencia.ct_areas.nomArea,TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada 
            FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas 
            WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%Y/%m/%d') BETWEEN :fechaInicio AND :fechaFin AND 
            Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario 
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND 
            Mercurioz_control_asistencia.usuarios.idArea=:idArea ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, 
            Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":fechaInicio",    $this->getFechaInicio(),           PDO::PARAM_STR);  
            $stmt->bindParam(":fechaFin",       $this->getFechaFin(),              PDO::PARAM_STR);  
            $stmt->bindParam(":idArea",         $this->getDepto(),                 PDO::PARAM_INT);   
            $stmt->execute();
            $asistenciasPorFechaConsult['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);    
            return $asistenciasPorFechaConsult; 
        }  
        //FIN DE CONSULTA DE USUARIO CONSULT, POR FECHAS SEGUN SU DEPARTAMENTO----------------------------------------------------

        //SE CONSULTAN ASISTENCIAS PARA USUARIO CONSUL, POR FECHAS Y SEGUN SU DEPARTAMENTO------------------------------------------
        public function asistenciasPorFechaConsultSubd(){  
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, 
            Mercurioz_control_asistencia.ct_areas.nomArea,TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada 
            FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas,Mercurioz_control_asistencia.ct_subdirecciones 
            WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%Y/%m/%d') BETWEEN :fechaInicio AND :fechaFin AND 
            Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario 
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND 
            Mercurioz_control_asistencia.ct_areas.idSubdireccion=Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion
            AND Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion=:idSubdireccion
            ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, 
            Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":fechaInicio",    $this->getFechaInicio(),           PDO::PARAM_STR);   
            $stmt->bindParam(":fechaFin",       $this->getFechaFin(),              PDO::PARAM_STR);  
            $stmt->bindParam(":idSubdireccion", $this->getSubdireccion(),          PDO::PARAM_INT);  
            $stmt->execute();
            $asistenciasPorFechaConsultSubd['data'] = $stmt->fetchAll(PDO::FETCH_OBJ);    
            return $asistenciasPorFechaConsultSubd; 
        }  
        //FIN DE CONSULTA DE USUARIO CONSULT, POR FECHAS SEGUN SU DEPARTAMENTO----------------------------------------------------



        //AQUI SE CONSULTARAN TODAS LAS ASISTENCIAS ENTRE UNA FECHA Y OTRA, NO SE ESPECIFICARA DEPARTAMENTO, SOLO SE NECESITA EL RANGO DE FECHAS
        public function asistenciasDeDeptoSubdPorFecha(){  
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre,
            Mercurioz_control_asistencia.ct_areas.nomArea,TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada 
            FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas 
            WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%Y/%m/%d') BETWEEN :fechaInicio AND :fechaFin
            AND Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario  
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.ct_areas.idArea=:idArea
            AND Mercurioz_control_asistencia.ct_areas.idSubdireccion=:idSubdireccion
            ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, 
            Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":fechaInicio",    $this->getFechaInicio(),           PDO::PARAM_STR);  
            $stmt->bindParam(":fechaFin",       $this->getFechaFin(),              PDO::PARAM_STR); 
            $stmt->bindParam(":idArea",         $this->getDepto(),                 PDO::PARAM_INT);  
            $stmt->bindParam(":idSubdireccion", $this->getSubdireccion(),          PDO::PARAM_INT);   
            $stmt->execute(); 
            $asistenciasDeDeptoSubdPorFecha["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);  
            return $asistenciasDeDeptoSubdPorFecha; 
        }
        //FIN DE CONSULTA DE ASISTENCIAS SOLO POR FECHAS -(SIN DEPARTAMENTO)------------------------------------------------------------------------------------

        //AQUI SE CONSULTARAN TODAS LAS ASISTENCIAS ENTRE UNA FECHA Y OTRA, Y SE NECESITA ESPECIFICAR EL DEPTO -----------------------
        public function asistenciasDeTodosDeptosDeSubdPorFecha(){ 
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, Mercurioz_control_asistencia.usuarios.nombre, 
            Mercurioz_control_asistencia.ct_areas.nomArea,
            TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada FROM Mercurioz_control_asistencia.asistencias, Mercurioz_control_asistencia.usuarios, 
            Mercurioz_control_asistencia.ct_areas  WHERE DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%Y/%m/%d') BETWEEN :fechaInicio AND :fechaFin 
            AND Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario AND
             Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea AND Mercurioz_control_asistencia.ct_areas.idSubdireccion=
             :idSubdireccion ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, Llegada ASC";
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":fechaInicio",    $this->getFechaInicio(),           PDO::PARAM_STR);  
            $stmt->bindParam(":fechaFin",       $this->getFechaFin(),              PDO::PARAM_STR);  
            $stmt->bindParam(":idSubdireccion", $this->getSubdireccion(),          PDO::PARAM_INT);   
            $stmt->execute();  
            $asistenciasDeTodosDeptosDeSubdPorFecha["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);  
            return $asistenciasDeTodosDeptosDeSubdPorFecha; 
        }
        //FIN DE ASISTENCIAS POR FECHA Y DEPTO-----------------------------------------------------------------------------

        //ASISTENCIAS SIN RANGO DE FECHAS PERO CON DEPTO------------------------------------------------------------------------
        public function asistenciasDeTodosDeptosDeSubdSinFecha(){ 
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, 
            Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.ct_areas.nomArea,TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada 
            FROM Mercurioz_control_asistencia.asistencias, 
            Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas WHERE Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario  
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea 
            AND Mercurioz_control_asistencia.ct_areas.idSubdireccion= :idSubdireccion
             ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, Llegada ASC"; 
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(":idSubdireccion", $this->getSubdireccion(),          PDO::PARAM_INT);   
            $stmt->execute(); 
            $asistenciasDeTodosDeptosDeSubdSinFecha["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);  
            return $asistenciasDeTodosDeptosDeSubdSinFecha; 
        } 
        //FIN DE ASISTENCIAS SIN RANGO DE FECHAS PERO CON DEPTO-------------------------------------------------------------

        //ASISTENCIAS SIN RANGO DE FECHAS PERO CON DEPTO------------------------------------------------------------------------
        public function asistenciasDeUnDeptoDeSubdSinFecha(){ 
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha,              
            Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.ct_areas.nomArea,TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada
            FROM Mercurioz_control_asistencia.asistencias,Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas 
            WHERE Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario               
            AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea             
            AND Mercurioz_control_asistencia.ct_areas.idArea=:idArea     
            ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, Llegada ASC";  
            $stmt = $this->database->prepare($query); 
           // $stmt->bindParam(":idSubdireccion", $this->getSubdireccion(),          PDO::PARAM_INT);  
            $stmt->bindParam(":idArea",         $this->getDepto(),                 PDO::PARAM_INT);    
            $stmt->execute(); 
            $asistenciasDeUnDeptoDeSubdSinFecha["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);  
            //echo "<script>alert('MODEEEEEEEL');</script>";
            return $asistenciasDeUnDeptoDeSubdSinFecha;  
        }
        //FIN DE ASISTENCIAS SIN RANGO DE FECHAS PERO CON DEPTO-------------------------------------------------------------

        //TODAS LAS ASISTENCIAS DE LOS DE CERTIFICACION SIN RANGO DE FEHCAS Y SIN DEPARTAMENTO --------------------------------------
        public function asistenciasSinRangoYSinDepto(){ 
            $query=  "SELECT DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada,'%d/%m/%Y') AS Fecha, 
             Mercurioz_control_asistencia.usuarios.nombre,Mercurioz_control_asistencia.usuarios.primerApellido,  
             Mercurioz_control_asistencia.usuarios.segundoApellido,Mercurioz_control_asistencia.ct_areas.nomArea, 
             TIME(Mercurioz_control_asistencia.asistencias.llegada) AS Llegada FROM Mercurioz_control_asistencia.asistencias,              
             Mercurioz_control_asistencia.usuarios, Mercurioz_control_asistencia.ct_areas, Mercurioz_control_asistencia.ct_subdirecciones
             WHERE Mercurioz_control_asistencia.asistencias.idUsuario=Mercurioz_control_asistencia.usuarios.idUsuario  
             AND Mercurioz_control_asistencia.usuarios.idArea = Mercurioz_control_asistencia.ct_areas.idArea
             AND  Mercurioz_control_asistencia.ct_areas.idSubdireccion=Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion 
             AND Mercurioz_control_asistencia.ct_subdirecciones.idSubdireccion=1/*<--------Sustitucion de este valor */
             ORDER BY DATE_FORMAT(Mercurioz_control_asistencia.asistencias.llegada, '%Y/%m/%d') DESC, 
            Llegada ASC"; 
            $stmt = $this->database->prepare($query);
            $stmt->execute(); 
            $asistenciasSinRango["data"] = $stmt->fetchAll(PDO::FETCH_OBJ);  
            return $asistenciasSinRango; 
        }
        //FIN DE TODAS LAS ASISTENCIAS DE LOS DE CERTIFICACION SIN RANGO DE FEHCAS Y SIN DEPARTAMENTO ------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------        
//----------------------------------------------------------------FIN DE ASISTENCIAS----------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    }
?>