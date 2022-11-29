
<link rel="stylesheet" href="assets/css/recuperar_contrasenia.css">

        </br>
    <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8"> 
                <div class="card">
                    <div class="card-body">
                        <div class="" style="display:block;text-align:center;">
                            <i class="logoRecoveryPass fa fa-key" id="" ></i> 
                        </div>
                        <p style="text-align:center;"><small><b>Para recuperar su contraseña es necesario que escriba el correo electrónico capturado en el sistema y responder el mecanismo de seguridad del captcha.</b></small></p>
                        <p class="card-text"></p>
                        <form action="" class="card-text">
                            <!------------------------------Correo Electronico-------------------------->
                            <div class="row mb-3  mt-5" style>
                                <label class="col-md-4 col-form-label text-md-end" >Correo Electrónico (*):</label>
                                <div class="col-md-6" >
                                    <input type="email" class="form-control" name="" id="" autofocus>
                                </div>  
                            </div>
                            <!-------------------------Confirmar Correo Electronico------------------------>
                            <div class="row mb-3" style>
                                <label class="col-md-4 col-form-label text-md-end" >Confirmar Correo Electrónico (*):</label>
                                <div class="col-md-6" >
                                    <input type="text" class="form-control" name="" id="">
                                </div>  
                            </div>
                            <!------------------------------Boton Captcha-------------------------->
                            <div class="row mb-3">
                                
                                    <div class="" style="text-align:center;">
                                        <button class="btn btn-outline-secondary btn-sm" id="botonEnvolvente">
                                            <input type="checkbox" id="captchaCheck">
                                            No soy un robot
                                        </button>
                                    </div>
                            </div>
                            <!-----------------------------Captcha suma--------------------------->
                            <div class="row" id="bloqueSuma" hidden>
                                <label class="col-form-label col-md-4 text-md-end" id="suma" ></label>
                                <div class="col-md-6">
                                    <input type="text"  class="form-control w-50" id="result" style="display:inline-block;">
                                    <button id="refrescar" type="text" class="btn btn btn-outline-info btn-sm mb-1 text-md-start">
                                         Refrescar <i class='fa fa-refresh'></i>
                                    </button>
                                    <div class="div"></div>
                                    <span id="resultCorrecto"  style="display:none;color:green;"> Correcto</span>
                                    <span id="resultIncorrecto"  style="display:none;color:red;"> Incorrecto, verifique </span>
                                    
                                </div>
                            </div>

                            <!--------------------------Modal de Confirmacion----------------------->
                            <div class="modal modalConfirmacion" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header" style="text-align:center; display:block;">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color:midnightblue;">Confirmar</h1>
                                </div>
                                <div class="modal-body" style="text-align:center;">    
                                    <p>Será enviado la solicitud con la siguiente información.</p>
                                    <p>Si está de acuerdo presionar <b>Registrar</b>.<p>
                                    <p>Para realizar alguna corrección seleccionar <b>Cancelar</b>.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" id="registrarCambio" >Registrar</button>
                                    <button type="button" class="btn" id="cancelarModal" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!--------------------------Modal de Continuar----------------------->
                            <div class="modal modalOkFinal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header"style="text-align:center; display:block;">
                               
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Continuar</h1>
                                </div>
                                <div class="modal-body">    
                                    <p>Se ha enviado un correo a javiergonzalez01@aragon.unam.mx
                                    para la recuperación de la contraseña.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="cedula"   class="btn btn-primary" id="terminar" >Continuar</a>
            

                                </div>
                                </div>
                            </div>
                            </div>
                            
                            
                        </form>
                        </br>
                        <!--------------------------Boton Envio--------------------------------->
                        <div class="row">
                                <div class="text-md-center d-grid gap-2 col-4 mx-auto">
                                    <button class="btn btn-primary" id="enviar">
                                        Enviar <small><small><small><i class="fa fa-paper-plane"></i></small></small></small></a>
                                </div> 
                            </div>
                    
                    </div>
                    
                </div>
            </div>

            <div class="col-md-2"></div>

    </div>
    <div class="row">
        <div class="col-md-2 text-md-end">
        </div>
        <div class="col-md-8 text-md-start">
            <a href="index" class="btn btn-outline-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Regresar </a>

        </div>
        <div class="col-md-2 text-md-end"> 
        </div>

    </div>
</br>
     
    <script type="text/javascript" src="assets/js/recuperarContra.js"></script> 
