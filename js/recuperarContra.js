$(document).ready(function(){


    let primerValor;
    let segundoValor;
    let haEscrito=false;
    let resultado;

    
    $('#captchaCheck').on('change', function(e){
        e.preventDefault();
        console.log("Entró al cambio"); 
        if( $(this).is(':checked') ){
            primerValor = random(1,100);
            segundoValor = random(1,100);

            resultado=primerValor+segundoValor; 
            $('#bloqueSuma').attr("hidden", false);
            $('#suma').html(primerValor + " + " + segundoValor); 
            $('#result').on('keyup', function(e){
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
            $('#bloqueSuma').attr("hidden", true);
            $('#resultCorrecto').hide();
            $('#resultIncorrecto').hide(); 
            $('#result').val('');
        }
        
    });
    $('#refrescar').on('click',function(e){
            
        primerValor=random(1,100);
        segundoValor=random(1,100);
        resultado=primerValor+segundoValor;
        console.log(resultado);
        $('#suma').html(primerValor + " + " + segundoValor);
        $('#result').val(''); 
        $('#resultCorrecto').hide();
        $('#resultIncorrecto').hide();
        e.preventDefault();
        
    });

    $('#enviar').on('click', function(){
        $('.modalConfirmacion').show();
            $('#cancelarModal').on('click',function(){
                $('.modalConfirmacion').hide();
            });
            $('#registrarCambio').on('click',function(){
                $('.modalConfirmacion').hide(); 
                $('.modalOkFinal').show();
                //$("#terminar").trigger("click");
                
            })
            $('#terminar').on('click', function(){ 
                $('.modalOkFinal').hide();

            });
    });
    $('#botonEnvolvente').on('click',function(e){
        
        //e.preventDefault();
    });
});



function random(min, max) {
    return Math.floor((Math.random() * (max - min + 1)) + min);
}