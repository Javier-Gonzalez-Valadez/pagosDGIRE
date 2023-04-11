$('#registrarCert').on('click', function(e){
    e.preventDefault(); 
    registrarEmpleadoCert();
});

//VALIDACION DE QUE LOS CAMPOS NO ESTÉN VACÍOS  INCLUYENDO ALERTA-------------------------------------
function validarFormCert(){
    if($('#nombreCert').val()!="" && $('#correoCert').val()!="" 
    && $('#loginCert').val()!="" &&  $('#passwordCert').val()!="" && $('#password-confirmCert').val()!=""){
        if ($('#deptoCert').val()!="Seleccione" && $('#perfilCert').val() !='Seleccione' && $('#activoSelect').val() !='Seleccione'){    
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
$('#password-confirmCert').keyup(function(){    
    $('#passwordCert').removeClass('noConfirmPasswd'); 
    $('#password-confirmCert').removeClass('noConfirmPasswd');   
    $('#spanNoCoincide1').attr('hidden', true);   
    $('#spanNoCoincide2').attr('hidden', true);  
    $('#password-confirmCert').removeClass('sinLlenar'); 
    $('#spanConfirmPassword').attr('hidden', true); 
     
});

$('#loginCert').keyup(function(){
    if($('#loginCert').val().length>=3 && $('#loginCert').val().length<=8){ 
        loginCert = $('#loginCert').val();
        $.ajax({ 
            url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/buscarPorLoginStaff", 
            type: "POST",   
            data: { 
                loginCert : loginCert, 
            },
            success: function (data) {
                //alertaAgregado();
                data=JSON.parse(data);
                setTimeout(function() {   

                },3000);
                console.log(data);
                $('#nombreCert').val(data.staff_nombre);
                $('#correoCert').val(data.staff_email+'@dgire.unam.mx');
                $('#passwordCert').val(data.staff_pass); 
                $('#password-confirmCert').val(data.staff_pass) ;                
            },  
            error: function () {
                alertaError();
            },
        });
    }else{  
    }
});


//FUNCION AJAX DE REGISTRO EMPLEADO DE CERTIFICACION
function registrarEmpleadoCert(){
    
    if(validarFormCert() && validarPasswd()){   
        var nombreCert = $('#nombreCert').val();
        var correoCert = $('#correoCert').val();
        var loginCert = $('#loginCert').val();
        var loginUsuario = $('#loginCert').val();
        var passwordCert= $('#passwordCert').val(); 
        var deptoCert= $('#deptoCert').val();
        var perfilCert =  $('#perfilCert').val(); 
        var activoCert =  $('#activoSelect').val(); 
        var data=""
        
        $.ajax({ 
            url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/buscarUsuario",   
            type: "POST",   
            data: {
                loginUsuario : loginUsuario, 
            },
            success: function (user) {
                datos=JSON.parse(user);
                alertaYaExiste();   
                //--------LOGIN
                if($('#loginCert').val()!=""){
                    $('#loginCert').addClass('sinLlenar');
                    $('#spanYaExiste').attr('hidden', false);  
                    $('#loginCert').keyup(function(){
                        $('#loginCert').removeClass('sinLlenar');
                        $('#spanYaExiste').attr('hidden', true);  
                    });
                }else{
                    $('#loginCert').removeClass('sinLlenar'); 
                    $('#spanYaExiste').attr('hidden', true);  
                }
                
            },  
            error: function () {
                datos=false;
                $.ajax({ 
                    url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/registrarUsuarioCert", 
                    type: "POST",   
                    data: {
                        nombreCert : nombreCert,
                        correoCert : correoCert,
                        loginCert : loginCert, 
                        passwordCert : passwordCert,
                        deptoCert : deptoCert, 
                        perfilCert : perfilCert, 
                        activoCert: activoCert 
                    },
                    success: function () {
                        alertaAgregado();
                        setTimeout(function() {   
                            $('#nombreCert').val('');
                            $('#correoCert').val(''); 
                            $('#loginCert').val('');
                            $('#passwordCert').val('');
                            $('#password-confirmCert').val('');
                            $('#deptoCert').val('Seleccione'); 
                            $('#perfilCert').val('Seleccione'); 
                            $('#activoSelect').val('Seleccione');  
                            $('#passwordCert').removeClass('noConfirmPasswd'); 
                            $('#password-confirmCert').removeClass('noConfirmPasswd');   
                            $('#spanNoCoincide1').attr('hidden', true);   
                            $('#spanNoCoincide2').attr('hidden', true);  
                        },3000);
                    },  
                    error: function () {
                        alertaError();
                    },
                });
            },
        });
    }else{
        camposFaltantes();
        remarcarCampos();
    }
} 

function remarcarCampos(){
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
        $('#passwordCert').removeClass('noConfirmPasswd'); 
        $('#password-confirmCert').removeClass('noConfirmPasswd');   
        $('#spanNoCoincide1').attr('hidden', true);   
        $('#spanNoCoincide2').attr('hidden', true);  
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
    //--------ACTIVO
    if($('#activoSelect').val()=="Seleccione"){ 
        $('#activoSelect').addClass('sinLlenar'); 
        $('#spanActivo').attr('hidden', false); 
        $('#activoSelect').change(function(){
            if($('#activoSelect').val()!="Seleccione"){
                $('#activoSelect').removeClass('sinLlenar');
                $('#spanActivo').attr('hidden', true);  
            }                 
        });
    }else{
        $('#activoSelect').removeClass('sinLlenar'); 
        $('#spanActivo').attr('hidden', true);   
    }
}
 
function alertaAgregado(){
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 4000  
    });    
    Toast.fire({    
        icon: 'success',
        title: 'Usuario Registrado Satisfactoriamente...!!'
    })
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
        title: 'No se pudo registrar el empleado, verifique y vuelvalo a intentar...'
    })
}

function alertaYaExiste(){
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 5000  
    });   
    Toast.fire({   
        icon: 'error',
        title: 'Ya existe un usuario registrado en el sistema con ese login, intenta con otro !'
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