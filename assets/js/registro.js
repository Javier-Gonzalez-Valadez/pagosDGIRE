$(document).ready(function(){
    //Validaciones segun el perfil que se seleccione
    $( '#perfil').on('change', function(event) {
        var perfil= $("#perfil option:selected").val(); 
            console.log("Entramos con "+perfil);  
            if(perfil == "Alumno" || perfil == 'Profesor'){
                $('#cvePlantel').attr( 'hidden', false );
                   $('#noExpdte').attr( 'hidden', false); 
            }
            if(perfil == "Director Tecnico"){
                $('#cvePlantel').attr( 'hidden', false );
                $('#noExpdte').attr( 'hidden', true );
            }
            if(perfil == 'Publico en general'){
                $('#cvePlantel').attr('hidden', true);
                $('#noExpdte').attr('hidden', true);
            }
    });
    //------------------------FACTURACION----------------------
    $('#facturacion').on('change', function(){
        
        if(  $(this).is(':checked')  ){
            $('.salto').attr('hidden', false);
            $('#marco').attr('hidden', false);
            $('#tipoPersona').attr('hidden',false);
            $('#RFC').attr('hidden',false);
            //$('#nombreFac').attr('hidden',false);
            //$('#apellidoPaternoFac').attr('hidden',false);
            //$('#apellidoMaternoFac').attr('hidden',false);
            //$('#rsFac').attr('hidden',false);
            $('#calleFac').attr('hidden',false);
            $('#noExtFac').attr('hidden',false);
            $('#noIntFac').attr('hidden',false);
            $('#CPFac').attr('hidden',false);
            $('#coloniaFac').attr('hidden',false);
            $('#ciudadFac').attr('hidden',false);
            $('#municipioFac').attr('hidden',false);
            $('#estadoFac').attr('hidden',false);
            $('#colNoAp').attr('hidden',false);
            
            //Mostrando asignacion de colonia o quitandola si se selecciona o se quita 
            //el checkbox
            $('#noApCol').on('change', function(){
                if( $(this).is(':checked')){
                    $('#ponerColonia').attr('hidden', false);                   
                }else{
                    $('#ponerColonia').attr('hidden', true);
                }
            });
        }else{
            $('.salto').attr('hidden', true);
            $('#marco').attr('hidden', true);
            $('#tipoPersona').attr('hidden',true);
            $('#RFC').attr('hidden',true);
            $('#nombreFac').attr('hidden',true);
            $('#apellidoPaternoFac').attr('hidden',true);
            $('#apellidoMaternoFac').attr('hidden',true);
            $('#rsFac').attr('hidden',true);
            $('#calleFac').attr('hidden',true);
            $('#noExtFac').attr('hidden',true);
            $('#noIntFac').attr('hidden',true);
            $('#CPFac').attr('hidden',true);
            $('#coloniaFac').attr('hidden',true);
            $('#ciudadFac').attr('hidden',true);
            $('#municipioFac').attr('hidden',true);
            $('#estadoFac').attr('hidden',true);
            $('#colNoAp').attr('hidden',true);
            $('#ponerColonia').attr('hidden', true);
            $('#selecTipoPersona').val("Seleccione");
        }
        
    });
    //--------------TIPO DE PERSONA EN FACTURACION--------------- 
    $( '#selecTipoPersona').on('change', function() {
        var perfilFac= $("#selecTipoPersona option:selected").val(); 
            console.log("Entramos con "+perfilFac);  
            if(perfilFac == "fisica"){
                $('#nombreFac').attr('hidden',false);
                $('#apellidoPaternoFac').attr('hidden',false);
                $('#apellidoMaternoFac').attr('hidden',false);
                $('#rsFac').attr('hidden',true);
            }else if(perfilFac == "moral"){
                $('#nombreFac').attr('hidden',true);
                $('#apellidoPaternoFac').attr('hidden',true);
                $('#apellidoMaternoFac').attr('hidden',true);
                $('#rsFac').attr('hidden',false);
            }else{
                $('#nombreFac').attr('hidden',true);
                $('#apellidoPaternoFac').attr('hidden',true);
                $('#apellidoMaternoFac').attr('hidden',true);
                $('#rsFac').attr('hidden',true);
            }
        });
    
    var correoValidado = false;
    var confirmacionCorreoValidada = false;
    //-----------------CORREO Y CONFIRMACION-------------------------
    $('#correo').on('keyup', function(){
        var validar =/([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
        if(!validar){
            $('#errorCorreo').show();
            $('#successCorreo').hide();

        }else{  
            correoValidado = true;
            $('#errorCorreo').hide();
            $('#successCorreo').show();
        }

        if(confirmacionCorreoValidada==true && ($('#confirmCorreo').val()!='') && ($('#correo').val()!=$('#confirmCorreo').val())){
                $('#errorCorreoC').hide();
                $('#successConfirm').hide();
                $('#errorConfirm').show();
        }else if(confirmacionCorreoValidada==true && ($('#confirmCorreo').val()!='') && ($('#correo').val()==$('#confirmCorreo').val())){
            confirmacionCorreoValidada=false; 
            $('#errorCorreoC').hide();
            $('#successConfirm').show();
            $('#errorConfirm').hide();
        }else{} 
    });


    $('#confirmCorreo').on('keyup',function(){
        var validar =/([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
        var longitudCorreo = $('#correo').val().length;
        if(!validar){
            $('#errorCorreoC').show();
            $('#successConfirm').hide();
            $('#errorConfirm').hide();
        }else{  
            
            if( $('#confirmCorreo').val().length == longitudCorreo && correoValidado==true){ 
                if($('#confirmCorreo').val() == $('#correo').val()){
                        confirmacionCorreoValidada=true;
                        $('#errorCorreoC').hide();
                        $('#errorConfirm').hide();
                        $('#successConfirm').show();    
                }else{
                        $('#errorCorreoC').hide();
                        $('#successConfirm').hide();
                        $('#errorConfirm').show();
                }
            }else{
                    $('#errorCorreoC').hide();
                    $('#successConfirm').hide();
                    $('#errorConfirm').show();
            }
        }
    });
    
    //_----------------TELEFONO (SOLO NUMEROS)-----------------------
    $('#telefono').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    //------------------CELULAR (SOLO NUMEROS)------------------------
    $('#celular').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    
    //---------------------------------------CAPTCHA---------------------------------------------
    
    let haEscrito = false;
    let primerValor = random(1,100);
    let segundoValor = random(1,100);
    let resultado = primerValor + segundoValor;
    $('#captcha').on('change', function(e){ 
        primerValor = random(1,100);
        segundoValor = random(1,100);
        resultado = primerValor + segundoValor; 
        
        if( $(this).is(':checked') ){
            console.log(resultado); 
            $('#suma').attr('hidden',false);
            $('#operacion').html(primerValor + " + " + segundoValor);   
            $('#result').on('keyup', function(e){
                console.log("Longitud del resultado"+ resultado.toString().length);
                this.value = this.value.replace(/[^0-9]/g,'');
                
                if($('#result').val().length != 0){
                    
                    if( (resultado.toString().length==3) && ($('#result').val().length == resultado.toString().length) ){
                        haEscrito=true;
                        console.log("ENtramos al IF"+ resultado);
                        if($('#result').val() == resultado){
                            
                            $('#resultCorrecto').show();
                            $('#resultIncorrecto').hide();                        
                        }else{
                            $('#resultCorrecto').hide();
                            $('#resultIncorrecto').show();
                        }
                    }
                    if( (resultado.toString().length==2) && ($('#result').val().length == resultado.toString().length) ){ 
                        haEscrito=true;
                            console.log("CErca");
                            if($('#result').val() == resultado){
                                $('#resultCorrecto').show();
                                $('#resultIncorrecto').hide();
                            }else{
                                $('#resultCorrecto').hide();
                                $('#resultIncorrecto').show();
                            }
                    }else if(($('#result').val().length!=resultado.toString().length) && haEscrito==true && $('#result').val().length!=0){
                            console.log("Entramos");
                            $('#resultCorrecto').hide();
                            $('#resultIncorrecto').hide();
                            haEscrito=false;
                    }else{}
                }else{
                    $('#resultCorrecto').hide();
                    $('#resultIncorrecto').hide();
                    haEscrito=false;
                }                 
            });
        }else{
            $('#suma').attr('hidden',true);
            $('#resultCorrecto').hide();
            $('#resultIncorrecto').hide(); 
            $('#result').val('');
        }
        $('#refrescar').on('click',function(e){
            
            primerValor=random(1,100);
            segundoValor=random(1,100);
            resultado=primerValor+segundoValor;
            console.log(resultado);
            $('#operacion').html(primerValor + " + " + segundoValor);
            $('#result').val('');
            $('#resultCorrecto').hide();
            $('#resultIncorrecto').hide();
            haEscrito=false;
            e.preventDefault();
            
        });
    });
});

//---------------------------------VERIFICAR CONTRASEÑA--------------------------------------
$('#password').keyup(function(e) {
    var strongRegex = new RegExp("^(?=.{10,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{9,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{8,}).*", "g");
    if ( enoughRegex.test($(this).val()) == false) {
            $('#passstrength').removeClass('text-success');
            $('#passstrength').removeClass('text-warning');
            $('#passstrength').removeClass('text-danger');
            $('#passstrength').addClass('text-primary');
            $('#passstrength').html('Al menos 8 caracteres.');
    } else if (strongRegex.test($(this).val())) {
            $('#passstrength').removeClass('text-warning');
            $('#passstrength').removeClass('text-danger');
            $('#passstrength').addClass('text-success');
            $('#passstrength').html('Fuerte');
    } else if (mediumRegex.test($(this).val())) {
            $('#passstrength').removeClass('text-success');
            $('#passstrength').removeClass('text-danger');
            $('#passstrength').addClass('text-warning'); 
            $('#passstrength').html('Media');
    } else {
            $('#passstrength').removeClass('text-success');
            $('#passstrength').removeClass('text-alert');
            $('#passstrength').addClass('text-danger'); 
            $('#passstrength').html('Débil');
    }
    return true;

});

//-------------------------Terminos y condiciones----------------------------
$('#tyc').on('change', function(e){
 
    if(e.target.checked){
        console.log("ENtramoooooos");
        $('#staticBackdrop').modal("show"); 
        
        
    }else{
        $('#staticBackdrop').modal("hide");
    }
        
});


function random(min, max) {
    return Math.floor((Math.random() * (max - min + 1)) + min);
}