<?php 
    include '../cabecera.php';
?>


 <div class="contanier w-10">
    <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="card">

                    <img src="../imgs/BannerDGIRE.png" class="card-img-top w-100" alt="Title">
                    <div class="card-body">
                        <h5  class="card-title" style="color:blue;">Solcitar recuperación de Contraseña</h5> 
                        <p><small><b>Para recuperar su contraseña es necesario que escriba el correo electrónico capturado en el sistema y responder el mecanismo de seguridad del captcha.</b></small></p>
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
                                <div class="col-md-4 text-md-end">
                                    <button class="btn btn-secondary col-md-8" id="botonEnvolvente">
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
                                    <button id="refrescar" type="text" class="btn btn-secondary mb-1 text-md-start">
                                         Refrescar
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
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmar</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">    
                                    <p>Será enviado la solicitud con la siguiente información.</p>
                                    <p>Si está de acuerdo presionar <b>Registrar</b>.<p>
                                    <p>Para realizar alguna corrección seleccionar <b>Cancelar</b>.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="registrarCambio" >Registrar</button>
                                    <button type="button" class="btn btn-secondary" id="cancelarModal" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!--------------------------Modal de Continuar----------------------->
                            <div class="modal modalOkFinal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Continuar</h1>
                                    <button type="button" class="btn-close" id="btnCerrarModal" autofocus data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">    
                                    <p>Se ha enviado un correo a javiergonzalez01@aragon.unam.mx
                                    para la recuperación de la contraseña.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="cedula.php" class="btn btn-primary" id="terminar" >Continuar</a>
            

                                </div>
                                </div>
                            </div>
                            </div>
                            
                            
                        </form>
                        </br>
                        <!--------------------------Boton Envio--------------------------------->
                        <div class="row">
                                <div class="col-md-12 text-md-center">
                                    <button class="btn btn-primary" id="enviar">Enviar</a>
                                </div>
                            </div>
                    
                    </div>
                    <img src="../imgs/Footer.png" class="card-img-footer w-100" alt="">
                    
                </div>
            </div>

            <div class="col-md-2"></div>
    </div>
 </div>
    <?php
        include '../cdnScript.php';
    ?>
    <script type="text/javascript" src="../js/recuperarContra.js"></script> 
<?php
    include '../pie.php';
?>