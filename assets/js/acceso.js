$(document).ready(function(){
    $('#btnEntrar').on('click', function(e) {

        e.preventDefault(); 
        var loginUsuario = $('#loginUsuario').val();
        var passwd = $('#passwd').val();
        //alert('Datos serializados: '+dataString); 
        if($('#loginUsuario').val()=='' && $('#passwd').val()==''){
            var Toast = Swal.mixin({  
                toast: true,
                position: 'top-center', 
                showConfirmButton: false,     
                timer: 5000  
                });   
                Toast.fire({   
                    icon: 'error',
                    title: 'Escribe tu usuario y contraseña primeramente!'
                })
        }else if($('#loginUsuario').val()=='' && $('#passwd').val()!=''){ 
            var Toast = Swal.mixin({  
                toast: true,
                position: 'top-center', 
                showConfirmButton: false,     
                timer: 5000  
                });   
                Toast.fire({   
                    icon: 'error',
                    title: 'Escribe tu usuario!'
                })
        }else if($('#loginUsuario').val()!='' && $('#passwd').val()==''){ 
            var Toast = Swal.mixin({  
                toast: true,
                position: 'top-center', 
                showConfirmButton: false,     
                timer: 5000  
                });   
                Toast.fire({   
                    icon: 'error',
                    title: 'Escribe tu contraseña!'
                })
        }else{ 
            $.ajax({                        
                type: "POST",                 
                url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/login",                  
                data: {
                    loginUsuario:loginUsuario,
                    passwd:passwd
                }, 
                success: function(data)              
                {
                    
                    data = JSON.parse(data);  
                    console.log(data);
                        if(data==false){   
                              
                            var Toast = Swal.mixin({  
                                toast: true,
                                position: 'top-center', 
                                showConfirmButton: false,     
                                timer: 5000  
                                });   
                                Toast.fire({   
                                    icon: 'error',
                                    title: 'Usuario o contraseña incorrecta'
                                })
                                //$(location).attr('href','http://132.247.147.17/~javiergv/controlAsistencia/usuario/acceso');  
                                
                        }else{ 
                            if(data.activo==1){
                                if(data.idPerfil!=3){
                                    var Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-center',
                                        showConfirmButton: false,  
                                        timer: 3000 
                                        });  
                                        Toast.fire({ 
                                            icon: 'success',
                                            title: 'Empleado encontrado, bienvenido.'
                                        })
                                    setTimeout(function() { 
                                        if(data.idPerfil==1){
                                            $(location).attr('href','http://132.247.147.17/~javiergv/controlAsistencia/usuario/bienvenida');
                                        }else if(data.idPerfil==2 && (data.idArea==1 || data.idArea==5)){
                                            $(location).attr('href','http://132.247.147.17/~javiergv/controlAsistencia/usuario/entrada');
                                        }else if(data.idPerfil==2 && (data.idArea!=1 || data.idArea!=5)){
                                            $(location).attr('href','http://132.247.147.17/~javiergv/controlAsistencia/usuario/bienvenido');
                                        }else{
                                            $(location).attr('href','http://132.247.147.17/~javiergv/controlAsistencia/usuario/acceso');
                                        }
                                        
                                    },2000);
                                }else{
                                    var Toast = Swal.mixin({  
                                        toast: true,
                                        position: 'top-center',  
                                        showConfirmButton: false,     
                                        timer: 5000  
                                        });   
                                        Toast.fire({   
                                            icon: 'info',
                                            title: 'El Usuario solo puede REGISTRAR ASISTENCIAS, no puede acceder a obtener reportes NI HACER CONSULTAS...' 
                                        })
                                }
                            }else{
                                var Toast = Swal.mixin({  
                                    toast: true,
                                    position: 'top-center',  
                                    showConfirmButton: false,     
                                    timer: 5000  
                                    });   
                                    Toast.fire({   
                                        icon: 'info',
                                        title: 'El Usuario NO ESTA ACTIVO. No puede registrar asistencias ni realizar alguna acción en el sistema.' 
                                    })
                            }
                            
                            
                            
    
                        }               
                },error: function(data)              
                {
    
                }
            }); 
        }
        

    });  
    
    
});


