
$('#buscarUsuario').on('click', function () {
    buscarEmpleado(); 
});  

function validarDatos(){
    if ($('#loginUsuario').val() == "") { 
        return false;
    }else{
        return true;
    }
} 
 

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
                idUsuario = data.idUsuario;
                data = JSON.parse(data);     
                console.log(data); 
                $('#loginUsuario').attr('disabled', 'disabled'); 
                setTimeout(function() {
                    $('#idUsuario').val(data.idUsuario);
                    $('#cardBuscarUsuarios').attr('hidden', true); 
                    $('#cardInfUser').attr('hidden', false);
                    
                        $('#nombres').text(data.nombre + " - " + data.nomArea);
                    
                    $('#correoYlogin').text(data.correo ); 
                    $('#login').text(data.loginUsuario );
                    $('#fechaRegistro').text(data.fechaRegistro);
                    $('#activo').text(data.activo);
                   
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

function eliminacion(){
    var idUsuario = $('#idUsuario').val();
    $.ajax({
        url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/eliminarUsuario",
        type: "POST", 
        data: {
            idUsuario: idUsuario 
        },   
        success: function(data){ 
            alertaEliminado();
            $('#loginUsuario').val(''); 
            $('#loginUsuario').removeAttr('disabled');
            setTimeout(function() {
                if(data.idPerfil == 1){
                    $('#nombres').text('');
                }else{
                    $('#nombres').text('');
                } 
                $('#correoYlogin').text('');  
                $('#fechaRegistro').text('');
                $('#activo').text('');
                $('#cardBuscarUsuarios').attr('hidden', false); 
                $('#cardInfUser').attr('hidden', true);
                
               
            },3000);                      
        }, 
        error: function () { 
            alertaError();
            setTimeout(function() { 
                

            },3000);
            
           
        },
    }); 
}
 
function eliminarUsuario(){
        var idUsuario = $('#idUsuario').val();
        console.log("IDUSUARIO: "+idUsuario);

        $.ajax({
            url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/historialAsistencias",
            type: "POST", 
            data: {
                idUsuario: idUsuario
            },   
            success: function(data){  
                 
                data=JSON.parse(data);
                if(data.length>=1){
                    $("#imposibleEliminarModal").modal("show"); 
                }else{
                    $("#modalEliminar").modal("show");  
                }
            }, 
            error: function () { 
                $("#modalEliminar").modal("show"); 
                
               
            },
        });
        
        /* $.ajax({
            url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/eliminarUsuario",
            type: "POST", 
            data: {
                idUsuario: idUsuario 
            },   
            success: function(data){ 
                alertaEliminado();
                $('#loginUsuario').val(''); 
                $('#loginUsuario').removeAttr('disabled');
                setTimeout(function() {
                    if(data.idPerfil == 1){
                        $('#nombres').text('');
                    }else{
                        $('#nombres').text('');
                    } 
                    $('#correoYlogin').text('');  
                    $('#fechaRegistro').text('');
                    $('#activo').text('');
                    $('#cardBuscarUsuarios').attr('hidden', false); 
                    $('#cardInfUser').attr('hidden', true);
                    
                   
                },3000);                      
            }, 
            error: function () { 
                alertaError();
                setTimeout(function() { 
                    

                },3000);
                
               
            },
        }); */

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
function alertaEliminado(){ 
    var Toast = Swal.mixin({  
        toast: true,
        position: 'top-center', 
        showConfirmButton: false,     
        timer: 3500  
    });   
    Toast.fire({   
        icon: 'success',
        title: 'Se ha eliminado el usuario correctamente !'
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

$('#btnEliminar').on('click', function(){
    eliminacion();
});

$('#borrarFI').on('click', function(){
    eliminarUsuario();
});


$('#btnCancelar').on('click', function () {
    $('#loginUsuario').val(''); 
    $('#loginUsuario').removeAttr('disabled');
    $('#nombres').text('');
    $('#correoYlogin').text('');  
    $('#fechaRegistro').text('');
    $('#activo').text('');
    $('#cardBuscarUsuarios').attr('hidden', false); 
    $('#cardInfUser').attr('hidden', true);
    $('#cardBuscarUsuarios').attr('hidden', false); 
    $('#cardInfUser').attr('hidden', true);
});

$('#btnVolverBuscar').on('click', function(){
    $('.divBuscarUser').attr('hidden', true); 
    $('#cardEmpleadosCert').attr('hidden', true);   
    $('#cardAdmins').attr('hidden', true);
    $('#cardBuscarUsuarios').attr('hidden', false); 
    $('#loginUsuario').val('');
    $("#loginUsuario").removeAttr('disabled'); 
});

$('#cancelarBtnCert').on('click', function(e){
    e.preventDefault();
    $('.divBuscarUser').attr('hidden', true); 
    $('#cardEmpleadosCert').attr('hidden', true);  
    $('#cardAdmins').attr('hidden', true);
    $('#cardBuscarUsuarios').attr('hidden', false); 
    $('#loginUsuario').val('');
    $("#loginUsuario").removeAttr('disabled'); 
});
$('#cancelarBtnAdmin').on('click', function(e){
    e.preventDefault();
    $('.divBuscarUser').attr('hidden', true); 
    $('#cardEmpleadosCert').attr('hidden', true);  
    $('#cardAdmins').attr('hidden', true);
    $('#cardBuscarUsuarios').attr('hidden', false); 
    $('#loginUsuario').val('');
    $("#loginUsuario").removeAttr('disabled'); 
});