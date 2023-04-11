//---------------------------------------------------------------VALIDACIONES PARA LOGIN DE USUARIOS SIN PRIVILEGIOS----------------------------------------------
$( document ).ready(function(){
    
    $('#entrar').on('click', function (e) {
        
        logearEmpleado();
    });   
    
    function validarDatos(){
        if ($('#loginUsuario').val() == "") { 
            return false;
        }else{
            return true;
        }
    } 

    function logearEmpleado(){ 
        if(validarDatos()){
            var loginUsuario = $('#loginUsuario').val();
            
            $.ajax({ 
                url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/registrarLlegada",
                type: "POST", 
                data: {
                    loginUsuario: loginUsuario 
                },  
                success: function(data){   
                    alertaSuccess();
                    data = JSON.parse(data);    
                    $('#noUsuario').attr("hidden", true); 
                    var infUser = 'Hola '+ data.nombre + ", tu hora de llegada " + (data.llegada).substring(11,19); 
                    $('.infUser').text(infUser); 
                    $('.infUser').attr("hidden", false);
                    $('#loginUsuario').attr('disabled', 'disabled'); 
                    $(".infUser").fadeOut(7000);
                    setTimeout(function() {
                        window.location.href = 'http://132.247.147.17/~javiergv/controlAsistencia/usuario/index'; 
                        
                    },7000);                     
                }
            }).fail( function( jqXHR, textStatus, errorThrown ) {
                if (jqXHR.status === 303) {

                    checoHoy();
                    $('#noUsuario').attr("hidden", true);  
                    $('.infUser').attr("hidden", true); 
                    $('#loginUsuario').attr('disabled', 'disabled');
                    $("#noUsuario").fadeOut(5000);  
                    setTimeout(function() { 
                        
                        window.location.href = 'http://132.247.147.17/~javiergv/controlAsistencia/usuario/index';
                    },5000);
                }
                else if (jqXHR.status == 302) {

                    alertaError();
                    $('#noUsuario').attr("hidden", false); 
                    $('.infUser').attr("hidden", true); 
                    $('#loginUsuario').attr('disabled', 'disabled');
                    $("#noUsuario").fadeOut(5000);  
                    setTimeout(function() { 
                        
                        window.location.href = 'http://132.247.147.17/~javiergv/controlAsistencia/usuario/index';
                    },5000);
        
                  }
                  else if (jqXHR.status == 305) {

                    var Toast = Swal.mixin({  
                        toast: true,
                        position: 'top-center', 
                        showConfirmButton: false,     
                        timer: 6000  
                        });   
                        Toast.fire({   
                            icon: 'info',
                            title: 'El Usuario NO ESTA ACTIVO. No puede registrar asistencias ni realizar alguna acción en el sistema.' 
                        })
        
                  }
            });
        }else{ 
            alertaVacio(); 
        }
    }


    function alertaError(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'top-right', 
            showConfirmButton: false,     
            timer: 5000  
        });   
        Toast.fire({   
            icon: 'error',
            title: 'No se ha digitado correctamente el Login del empleado, verifique.'
        })
    }
    function alertaVacio(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'center', 
            showConfirmButton: false,     
            timer: 5000  
        });   
        Toast.fire({    
            icon: 'error',
            title: 'Tienes que digitar tu Login primeramente !!'
        })
    }
    function checoHoy(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'center', 
            showConfirmButton: false,     
            timer: 5000  
        });   
        Toast.fire({    
            icon: 'warning',
            title: 'El usuario ya ha registrado su asistencia el día de hoy!!'
        })
    }
    function alertaSuccess(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'top-right', 
            showConfirmButton: false,     
            timer: 5000  
        });   
        Toast.fire({   
            icon: 'success',
            title: 'Empleado encontrado, bienvenido/a.'
        })
    }
//---------------------------------------------------FIN DE VALIDACIONES PARA USUSARIOS SIN PRIVILEGIOS-----------------------------------------------------------




//--------------------------------------------------INICIO DE VALIDACIONES PARA USUARIOS ADMINS CON PRIVILEGIOS----------------------------------------------------------

    



//---------------------------------------------------FIN DE VALIDACIONES PARA USUSARIOS ADMINS CON PRIVILEGIOS-----------------------------------------------------------

    
});
    