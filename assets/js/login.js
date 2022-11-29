$(document).ready(function(){
    $('#abrirModal').click(function(){
        $('.tycModal').show();
        $('#cerrarModal').trigger("click");
        
        $('.tycModal').show();
    });

    $('#cerrarModal').on('click', function(){
            $('.tycModal').hide();
        });
        
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

function random(min, max) {
    return Math.floor((Math.random() * (max - min + 1)) + min);
}