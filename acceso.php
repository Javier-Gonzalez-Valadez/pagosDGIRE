<?php include 'cabecera.php';?>
<link rel="stylesheet" href="css/acceso.css">
<?php include 'cabecera2.php';?>
                <div class="row banner"> 
                    <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                        <a href="https://www.unam.mx/" target=_BLANK> 
                            <img class=""src="imgs/unam_white.png" id="imgUnam"alt=""> 
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
                            <img class="" src="imgs/dgire_white.png" id="imgDgire" alt=""> 
                        </a>
                    </div>
                </div>
                <div class="row bannerPagos">
                    <div class="col-12 col-lg col-md-12 col-sm-12 col-xs-12 txtPagos"><p>Unidad Administrativa Sistema de Pagos</p></div>
                </div> 
    <div class="container">
        <div class="row"  >
                    
            <div class="col-md-1"></div>
            <div class="col-md-10"  >
                        <div class="container">
                            <div class="row" style="margin-top:15px;">
                                <hr>
                                <!----------------------------Informacion de Ingreso------------------------------>
                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12">
                                    <p><b>Pasos para solicitar servicio(s) :</b></p>
                                    <small>
                                        <ol style="text-align:justify;"> 
                                            <li>Registrarse en el sistema, con correo electrónico y una contraseña personalizada. Si no se ha registrado de click <a href="registro.php" class="color">Aquí</a></li>
                                            <li>Activar la cuenta al recibir la confirmación de su registro en el correo electrónico.</li>
                                            <li>Solicitar servicio(s), ingresando al sistema de pagos en la opción de "Solicitud de pago".</li>
                                            <li>Recibir Ficha de Depósito Digital Referenciada (FDR).</li>
                                            <li>Acudir a realizar el pago en cualquier sucursal del banco BBVA Bancomer.</li>
                                            <li>Escanear el comprobante de pago bancario (CPB).</li>
                                            <li>Enviar vía sistema de pagos la imagen escaneada del CPB en formato jpg no mayor a 800Kb. Opción "Cargar Pago".</li>
                                            <li>Esperar la confirmación y autorización del pago correspondiente vía correo electrónico; asi como el Comprobante Fiscal Digital (CFD) si registró sus datos fiscales y solicitó factura, o "ticket" en caso contrario.</li>
                                            <li>Acudir al área correspondiente de la DGIRE a solicitar el servicio.</li>
                                        </ol>
                                    </small>
                                </div>
                                <!----------------------------Formulario de Ingreso------------------------------>
                                <div class="col-12 col-md-12 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="card text-center">
                                            
                                            <p></p>
                                            <h1><b><i class='fa fa-user-circle-o logoUser'></i></b></h1>
                                            <div class=""></div>
                                        <small>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <!----------Correo electonico------------>
                                                <div class="row mb-3">
                                                    <label class="col-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-md-center"><small><b class="color">Correo electrónico:</b></small></label>

                                                    <div class="col-12 col-xs-12 col-md-12 col-lg- col-xl-12">
                                                        <input id="correo" type="email" class="form-control" name="email" value="" required autocomplete="email">
                                                        <span id="errorCorreo" style="display:none;color:red;"><small>Formato de correo inválido</small></span>
                                                        <span id="successCorreo" style="display:none;color:green;"><small>Correo válido</small></span>
                                                    </div>
                                                </div>

                                                <!----------Contraseña------------>
                                                <div class="row mb-3" id="">
                                                    <label  class="col-12 col-xs-12 col-md-12 col-lg- col-xl-12 col-form-label text-md-center">
                                                        <small><b class="color">Contraseña:</b></small>
                                                    </label>

                                                    <div class="col-12 col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input  type="text" class="form-control" value="" required >
                                                    </div> 
                                                </div>
                                                <!--Captcha-->
                                                <div class="col-mb-3 text-md-center">
                                                    <div class="" style="text-align:center;">
                                                        <button class="btn btn-outline-secondary btn-sm" id="botonEnvolvente">
                                                            <input type="checkbox" id="captchaCheck">
                                                            No soy un robot
                                                        </button>
                                                    </div>
                                                    
                                                </div>

                                                <!--Suma-->
                                                <div class="row mb-3" id="suma" hidden>
                                                    
                                                    <label class="col-12 col-xs-12 col-md-3 col-lg-3 col-form-label text-md-end" id="operacion" value=""></label>
                                                    <div class="col-12 col-xs-12 col-md-4 col-lg-5">
                                                        <input  type="text" class="form-control" name="name" value="" id="result" required>
                                                        <span id="resultCorrecto" style="display:none;color:green;"> Confirmado</span>
                                                        <span id="resultIncorrecto" style="display:none;color:red;"> Incorrecto, verifique </span>
                                                    </div>
                                                    <div class="col-12 col-xs-12 col-md-4 col-lg-4">
                                                        <button class="btn btn-outline-info btn-sm" type="checkbox" id="refrescar">Refrescar <i class='fa fa-refresh'></i></button>
                                                    </div>
                                                    
                                                </div>
                                                <br/>
                                                </br>
                                                <div class="text-md-center d-grid gap-2 col-6 mx-auto">
                                                    <button class="btn btn-primary" > Iniciar Sesión <i class='fa fa-unlock'></i></button>
                                                </div> 
                                                
                                                
                                            </form>
                                            <hr>
                                            <p class="text-md-end"><small><a class="color" href="recuperarContrasenia/recuperar_contrasenia.php">¿Olvidó su contraseña?</a></small></p> 
                                            <p class="text-md-end"><small>¿Aún no estás registrado? <a class="color" href="registro.php">Registrarse</a></small></p>
                                        </div></small>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <b><hr></b>
                        </div>
                        
                        <!-----------------------IFRAME----------------------------> 
                        <iframe src="https://apps.dgire.unam.mx/embed?/avisos/"  name="iframe_aviso" title="Iframe Example" style="border:2px solid red;"></iframe>-->
<iframe hidden src="https://www.google.com/maps/embed?pb=!4v1668192381695!6m8!1m7!1spbOuNKdA9fSDtMl-0JzNDg!2m2!1d19.31173586075709!2d-99.18429103841581!3f179.6629908073546!4f-6.12880220303461!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!--------------------Aviso de Privacidad------------------->

                        <!--------------------Aviso de Privacidad------------------->
                        <div class="container">
                        <div class="row">
                            <div class="col-md-12" style="text-align:center;">
                                <p><small><a href="https://apps.dgire.unam.mx/avisos/" target="" id="aviso" class="color" style="cursor:pointer;"><u>Aviso de Privacidad</u></a></small></p>
                            </div>
                        </div>
                    </div>

                    </br>
                    
            </div>


        </div>
    </div>
    <div class="footer">
            <p style="background-color: Gainsboro;"><small><small>
                Hecho en México © Todos los derechos reservados 2022. Universidad Nacional Autónoma de México (UNAM), Dirección General de Incorporación y Revalidación de Estudios (DGIRE). Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la institución. Sitio web administrado por la DGIRE.
                </small>
                </small>
            </p>
        </div>

<?php include 'cdnScript.php';?>
<script src="js/login.js"></script>  
<?php include 'pie.php'; ?>


                
