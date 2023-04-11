
$('#buscarUsuario').on('click', function () {
    buscarEmpleado(); 
});  

loginReal="NADA";

$('#actContra').change(function() { 
    if(this.checked ) {
        $('#passwordCert').val('');
        $('#password-confirmCert').val('');
        $('#passwordCert').removeAttr("disabled"); 
        $('#password-confirmCert').removeAttr("disabled");
    }else{
        $('#passwordCert').val("*****************");
        $('#password-confirmCert').val("*****************");
        $('#passwordCert').attr('disabled', 'disabled'); 
        $('#password-confirmCert').attr('disabled', 'disabled');
    }
});

function validarDatos(){
    if($('#loginUsuario').val()==""){
        return false;
    }else{
        return true;
    }
}

function validarFormCert(){
    if($('#idUsuarioCert').val()!="" && $('#nombreCert').val()!="" &&
    $('#correoCert').val()!="" && $('#loginCert').val()!="" && $('#passwordCert').val()!="" && $('#password-confirmCert').val()!=""){ 
        if ($('#deptoCert').val()!="Seleccione" && $('#perfilCert').val() !='Seleccione'){
            return true;  
        }else{
            return false; 
        }
        
    }else{
        return false; 
    }
}

function validarFormCertSinContra(){
    if($('#idUsuarioCert').val()!="" && $('#nombreCert').val()!="" &&
    $('#correoCert').val()!="" && $('#loginCert').val()!="" && $('#password-confirmCert').val()!=""){ 
        if ($('#deptoCert').val()!="Seleccione" && $('#perfilCert').val() !='Seleccione'){
            return true;  
        }else{
            return false; 
        }
        
    }else{
        return false; 
    }
}

function validarPasswd(){
    if ($('#passwordCert').val() == $('#password-confirmCert').val()) {
        return true;
    }else{
        return false;
    }
    
}

function actualizarConContra(){
    if(validarFormCert() && validarPasswd()){ 
        
        var idUsuarioCert = $('#idUsuarioCert').val();   
        var nombreCert = $('#nombreCert').val();
        var correoCert = $('#correoCert').val();
        var loginCert = loginReal;
        var passwordCert= $('#passwordCert').val();
        var deptoCert= $('#deptoCert').val(); 
        var perfilCert =  $('#perfilCert').val();  
        var fechaRegistroCert = $('#fechaRegistroCert').val();
        var activoSelect = $('#activoSelect').val();  
        $.ajax({ 
            url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/actualizarUsuarioCert",
            type: "POST",   
            data: {
                idUsuarioCert : idUsuarioCert,
                nombreCert : nombreCert,
                correoCert : correoCert,
                //loginCert : loginCert,  
                loginCert :loginReal, 
                passwordCert : passwordCert,
                deptoCert : deptoCert, 
                perfilCert : perfilCert,
                fechaRegistroCert : fechaRegistroCert,
                activoSelect : activoSelect
            },
            success: function () {
                alertaActualizado();
                setTimeout(function() { 
                    $('#cardEmpleadosCert').attr('hidden', true);
                    $('#cardAdmins').attr('hidden', true);  
                    $('#cardBuscarUsuarios').attr('hidden', false);   
                    $('#btnVolverBuscar').attr('hidden', true);
                    $('#loginUsuario').val(''); 
                    $("#loginUsuario").removeAttr('disabled');  
                },3000);
            },  
            error: function () {
                alertaError();
            },
        });
    }else{
        camposFaltantes();
        remarcarCamposRojo();
    }
}

function actualizarSinContra(){
    if(validarFormCert()){ 
        var idUsuarioCert = $('#idUsuarioCert').val();   
        var nombreCert = $('#nombreCert').val();
        var correoCert = $('#correoCert').val();
        var loginCert = loginReal;
        var deptoCert= $('#deptoCert').val(); 
        var perfilCert =  $('#perfilCert').val();  
        var fechaRegistroCert = $('#fechaRegistroCert').val();
        var activoSelect = $('#activoSelect').val();  
        $.ajax({ 
            url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/actualizarUsuarioCertSinContra", 
            type: "POST",   
            data: {
                idUsuarioCert : idUsuarioCert,
                nombreCert : nombreCert,
                correoCert : correoCert,
                //loginCert : loginCert, 
                loginCert :loginReal, 
                deptoCert : deptoCert, 
                perfilCert : perfilCert,
                fechaRegistroCert : fechaRegistroCert,
                activoSelect : activoSelect
            },
            success: function () {
                alertaActualizado();
                setTimeout(function() { 
                    $('#cardEmpleadosCert').attr('hidden', true);
                    $('#cardAdmins').attr('hidden', true);  
                    $('#cardBuscarUsuarios').attr('hidden', false);   
                    $('#btnVolverBuscar').attr('hidden', true);
                    $('#loginUsuario').val(''); 
                    $("#loginUsuario").removeAttr('disabled');  
                },3000);
            },  
            error: function () {
                alertaError();
            },
        });
    }else{
        camposFaltantes();
        remarcarCamposRojo();
    }
} 


$('#actualizarBtnCert').on('click', function(e){
    if($('#actContra').is(':checked')){
        actualizarConContra();
    }else{
        actualizarSinContra();
    }
});



function buscarEmpleado(){
    if(validarDatos()){
        var loginUsuario = $('#loginUsuario').val();
        console.log(loginUsuario);
        $.ajax({
            url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/buscarUsuario",
            type: "POST", 
            data: {
                loginUsuario: loginUsuario 
            },  
            success: function(data){ 
                alertaSuccess();
                data = JSON.parse(data);     
                console.log(data);  
                $('#loginUsuario').attr('disabled', 'disabled'); 
                setTimeout(function() { 
                        $('#cardBuscarUsuarios').attr('hidden', true);    
                        $('.divBuscarUser').attr('hidden', false);
                        $('#cardEmpleadosCert').attr('hidden', false);    
                        $('#idUsuarioAdmin').val(data.idUsuario);
                        //--------------------------SE ASIGNAN VALORES DEL USUARIO ENCONTRADO EN LA BASE DE DATOS AL FORMULARIO DE EDITAR USUAIRIO---------------------
                        $('#idUsuarioCert').val(data.idUsuario); 
                        $('#nombreCert').val(data.nombre);   
                        $('#primerApellidoCert').val(data.primerApellido);
                        $('#segundoAPellidoCert').val(data.segundoApellido);
                        $('#correoCert').val(data.correo);   
                        $('#loginCert').val(data.loginUsuario); 
                        loginReal=data.loginUsuario;
                        //$('#passwordCert').val(data.passwd); 
                        //$('#password-confirmCert').val(data.passwd);
                        $('#fechaRegistroCert').val(data.fechaRegistro); 
                        $('#activoSelect option[value='+ data.activo +"]").attr("selected",true);
                        $("#perfilCert option[value="+ data.idPerfil +"]").attr("selected",true);
                        $("#deptoCert option[value="+ data.idArea +"]").attr("selected",true);
                        
                    
                },3000);                      
            }, 
            error: function () { 
                alertaError();
                setTimeout(function() { 
                    

                },3000);
                
               
            },
        });
    }else{ 
        alertaVacio(); 
    }
}

function alertaError(){
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 5000  
    });   
    Toast.fire({   
        icon: 'error',
        title: 'No se encontró el empleado, verifique y vuelvalo a digitar...'
    })
}
function alertaVacio(){
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 5000  
    });   
    Toast.fire({    
        icon: 'error',
        title: 'Tienes que digitar el Login del usuario primeramente !!'
    })
}
function alertaSuccess(){
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 3500  
    });   
    Toast.fire({   
        icon: 'success',
        title: 'Empleado encontrado, listo para actualizar...'
    })
}
function alertaActualizado(){ 
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 3500  
    });   
    Toast.fire({   
        icon: 'success',
        title: 'Felicidades! Se ha actualizado el usuario....'
    })
}
function camposFaltantes(){
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 4000  
    });   
    Toast.fire({    
        icon: 'error',
        title: 'Hacen falta campos por completar !!'
    })
}

$('#btnVolverBuscar').on('click', function(){
    $('.divBuscarUser').attr('hidden', true); 
    $('#cardEmpleadosCert').attr('hidden', true);   
    $('#cardAdmins').attr('hidden', true);
    $('#cardBuscarUsuarios').attr('hidden', false); 
    $('#loginUsuario').val('');
    $("#loginUsuario").removeAttr('disabled'); 
});

function remarcarCamposRojo(){
    //-----------NOMBRE
    if($('#nombreCert').val()==""){
        $('#nombreCert').addClass('sinLlenar');
        $('#spanNombre').attr('hidden', false); 
        $('#nombreCert').keyup(function(){
            $('#nombreCert').removeClass('sinLlenar');
            $('#spanNombre').attr('hidden', true);  
        });
    }else{
        $('#nombreCert').removeClass('sinLlenar');
        $('#spanNombre').attr('hidden', true);  
    }
    //--------CORREO
    if($('#correoCert').val()==""){
        $('#correoCert').addClass('sinLlenar');
        $('#spanCorreo').attr('hidden', false); 
        $('#correoCert').keyup(function(){
            $('#correoCert').removeClass('sinLlenar');
            $('#spanCorreo').attr('hidden', true);  
        });
    }else{
        $('#correoCert').removeClass('sinLlenar');
        $('#spanCorreo').attr('hidden', true);  
    }
    //--------LOGIN
    if($('#loginCert').val()==""){
        $('#loginCert').addClass('sinLlenar');
        $('#spanLogin').attr('hidden', false); 
        $('#loginCert').keyup(function(){
            $('#loginCert').removeClass('sinLlenar');
            $('#spanLogin').attr('hidden', true);  
        });
    }else{
        $('#loginCert').removeClass('sinLlenar'); 
        $('#spanLogin').attr('hidden', true);  
    }
    //--------DEPARTAMENTO
    if($('#deptoCert').val()=="Seleccione"){ 
        $('#deptoCert').addClass('sinLlenar'); 
        $('#spanDepto').attr('hidden', false); 
        $('#deptoCert').change(function(){
            if($('#deptoCert').val()!="Seleccione"){
                $('#deptoCert').removeClass('sinLlenar');
                $('#spanDepto').attr('hidden', true);  
            }                 
        });
    }else{
        $('#deptoCert').removeClass('sinLlenar'); 
        $('#spanDepto').attr('hidden', true);  
    }
    //--------CONTRASEÑA
    if($('#passwordCert').val()==""){ 
        $('#passwordCert').addClass('sinLlenar');  
        $('#spanPassword').attr('hidden', false); 
        $('#passwordCert').keyup(function(){
            $('#passwordCert').removeClass('sinLlenar');
            $('#spanPassword').attr('hidden', true);  
        });
    }else{ 
        $('#passwordCert').removeClass('sinLlenar'); 
        $('#spanPassword').attr('hidden', true);  
    } 
    //--------CONFIRMAR CONTRASEÑA 
    if($('#password-confirmCert').val()==""){ 
        $('#password-confirmCert').addClass('sinLlenar'); 
        $('#spanConfirmPassword').attr('hidden', false); 
        $('#password-confirmCert').keyup(function(){
            $('#passwordCert').removeClass('noConfirmPasswd'); 
            $('#password-confirmCert').removeClass('noConfirmPasswd');   
            $('#spanNoCoincide1').attr('hidden', true);   
            $('#spanNoCoincide2').attr('hidden', true);  
            $('#password-confirmCert').removeClass('sinLlenar'); 
            $('#spanConfirmPassword').attr('hidden', true); 
            
        });
    }else if(($('#passwordCert').val()!= '' && $('#password-confirmCert').val()!='') && ($('#passwordCert').val() != $('#password-confirmCert').val())){
        $('#passwordCert').addClass('noConfirmPasswd'); 
        $('#password-confirmCert').addClass('noConfirmPasswd'); 
        $('#spanNoCoincide1').attr('hidden', false);  
        $('#spanNoCoincide2').attr('hidden', false); 
        
    }else{
        $('#password-confirmCert').removeClass('sinLlenar'); 
        $('#spanConfirmPassword').attr('hidden', true); 
        $('#passwordCert').removeClass('noConfirmPasswd'); 
        $('#password-confirmCert').removeClass('noConfirmPasswd');   
        $('#spanNoCoincide1').attr('hidden', true);   
        
    }
    //--------PERFIL
    if($('#perfilCert').val()=="Seleccione"){ 
        $('#perfilCert').addClass('sinLlenar'); 
        $('#spanPerfil').attr('hidden', false); 
        $('#perfilCert').change(function(){
            if($('#perfilCert').val()!="Seleccione"){
                $('#perfilCert').removeClass('sinLlenar');
                $('#spanPerfil').attr('hidden', true);  
            }                 
        });
    }else{
        $('#perfilCert').removeClass('sinLlenar'); 
        $('#spanPerfil').attr('hidden', true);   
    }
}

$('#cancelarBtnCert').on('click', function(e){
    e.preventDefault();
    $('.divBuscarUser').attr('hidden', true); 
    $('#cardEmpleadosCert').attr('hidden', true);  
    $('#cardAdmins').attr('hidden', true);
    $('#cardBuscarUsuarios').attr('hidden', false); 
    $('#loginUsuario').val('');
    $("#loginUsuario").removeAttr('disabled');  
    //-----------NOMBRE

        $('#nombreCert').removeClass('sinLlenar');
        $('#spanNombre').attr('hidden', true);  
    
    //------PRIMER APELLIDO

        $('#primerApellidoCert').removeClass('sinLlenar');
        $('#spanPrimerApellido').attr('hidden', true);  
    
    //--------CORREO

        $('#correoCert').removeClass('sinLlenar');
        $('#spanCorreo').attr('hidden', true);  
    
    //--------LOGIN

        $('#loginCert').removeClass('sinLlenar'); 
        $('#spanLogin').attr('hidden', true);  
    
    //--------DEPARTAMENTO

        $('#deptoCert').removeClass('sinLlenar'); 
        $('#spanDepto').attr('hidden', true);  
    
    //--------CONTRASEÑA

        $('#passwordCert').removeClass('sinLlenar'); 
        $('#spanPassword').attr('hidden', true);  
    
    //--------CONFIRMAR CONTRASEÑA 

        $('#password-confirmCert').removeClass('sinLlenar'); 
        $('#spanConfirmPassword').attr('hidden', true);  
    
    //--------PERFIL

        $('#perfilCert').removeClass('sinLlenar'); 
        $('#spanPerfil').attr('hidden', true);   
    
});

