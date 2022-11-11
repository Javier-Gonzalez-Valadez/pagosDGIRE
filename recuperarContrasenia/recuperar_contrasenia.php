<?php 
    include '../cabecera.php';
?>
<link rel="stylesheet" href="../css/recuperar_contrasenia.css">
<?php 
    include '../cabecera2.php';
?>

        <div class="row banner"> 
            <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                <a href="https://www.unam.mx/" target=_BLANK> 
                    <img class=""src="../imgs/unam_white.png" id="imgUnam"alt=""> 
                </a>
            </div>
            <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4">
                <a href="https://www.unam.mx/" style="text-decoration:none;" target=_BLANK>
                    <h4  class=" hidden-sm hidden-xs" id="txtUnam" style="color:white;">Universidad Nacional Autónoma de México</h4>
                    <h4  class=" hidden-md hidden-lg" id="txtUnam" style="color:white;">UNAM</h4>
                </a>
            </div>
            <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4">
                <a href="https://www.dgire.unam.mx/webdgire/" style="text-decoration:none;" target=_BLANK>
                    <h4 class=" hidden-sm hidden-xs" id="txtDgire">Dirección General de Incorporación y Revalidación de Estudios</h4>
                    <h4 class=" hidden-md hidden-lg" id="txtDgire">DGIRE</h4> 
                </a>
            </div>
            <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                <a href="https://www.dgire.unam.mx/webdgire/" target="_BLANK">
                    <img class="" src="../imgs/dgire_white.png" id="imgDgire" alt=""> 
                </a>
            </div>
            <div class="row bannerPagos">
                    <div class="col-12 col-lg col-md-12 col-sm-12 col-xs-12 txtPagos"><p>Recuperación de contraseña SISPA</p></div>
            </div>
        </div>
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
                                    <a href="cedula.php" class="btn btn-primary" id="terminar" >Continuar</a>
            

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
            <a href="../acceso.php" class="btn btn-outline-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Regresar </a>

        </div>
        <div class="col-md-2 text-md-end">
        </div>


    </div>
</br>
    <div class="footer">
            <p class="textoFooter" style="background-color: Gainsboro;">
                Hecho en México © Todos los derechos reservados 2022. Universidad Nacional Autónoma de México (UNAM), Dirección General de Incorporación y Revalidación de Estudios (DGIRE). Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la institución. Sitio web administrado por la DGIRE.
            </p>
        </div> 

<?php
    include '../cdnScript.php';
?>
    <script type="text/javascript" src="../js/recuperarContra.js"></script> 
<?php
    include '../pie.php';
?>