<?php include 'cabecera.php';?>
<link rel="stylesheet" href="css/acceso.css">
<?php include 'cabecera2.php';?>
     <div class="">
            <div class="row banner">
                 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, nemo earum, praesentium pariatur, deleniti provident similique aspernatur excepturi dolorem obcaecati id ipsum voluptates aut totam in non molestiae dolore harum.
            </div> 
     </div>
    <div class="container">
        <div class="row">
                    
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card w-100">
                    
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <!----------------------------Informacion de Ingreso------------------------------>
                                <div class="col-md-6">
                                    <h5 style="display: block; text-align:center;"><b><small>Bienvenido al sistema de pagos de la DGIRE</small></b></h5>
                                    <p><small><b>Pasos para solicitar servicio(s) :</b></small></p>
                                    <small>
                                        <ol style="text-align:justify;"> 
                                            <li><small>Registrarse en el sistema, con correo electrónico y una contraseña personalizada. Si no se ha registrado de click <a href="registro.php">Aquí</a></small></li>
                                            <li><small>Activar la cuenta al recibir la confirmación de su registro en el correo electrónico.</small></li>
                                            <li><small>Solicitar servicio(s), ingresando al sistema de pagos en la opción de "Solicitud de pago".</small></li>
                                            <li><small>Recibir Ficha de Depósito Digital Referenciada (FDR).</small></li>
                                            <li><small>Acudir a realizar el pago en cualquier sucursal del banco BBVA Bancomer.</small></li>
                                            <li><small>Escanear el comprobante de pago bancario (CPB).</small></li>
                                            <li><small>Enviar vía sistema de pagos la imagen escaneada del CPB en formato jpg no mayor a 800Kb. Opción "Cargar Pago".</small></li>
                                            <li><small>Esperar la confirmación y autorización del pago correspondiente vía correo electrónico; asi como el Comprobante Fiscal Digital (CFD) si registró sus datos fiscales y solicitó factura, o "ticket" en caso contrario.</small></li>
                                            <li><small>Acudir al área correspondiente de la DGIRE a solicitar el servicio.</small></li>
                                        </ol>
                                    </small>
                                </div>
                                <!----------------------------Formulario de Ingreso------------------------------>
                                <div class="col-md-6">
                                    <div class="card text-center">
                                        <div class="card-header">
                                            <h5><b>Ingresar</b></h5>
                                        </div>
                                        <small>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <!----------Correo electonico------------>
                                                <div class="row mb-3">
                                                <label class="col-md-3 col-form-label text-md-end"><small><b style="color: blue;">Correo electrónico:</b></small></label>

                                                <div class="col-md-9">
                                                    <input id="correo" type="email" class="form-control" name="email" value="" required autocomplete="email">
                                                    <span id="errorCorreo" style="display:none;color:red;"><small>Formato de correo inválido</small></span>
                                                    <span id="successCorreo" style="display:none;color:green;"><small>Correo válido</small></span>
                                                </div>
                                            </div>

                                                <!----------Contraseña------------>
                                                <div class="row mb-3" id="">
                                                    <label  class="col-md-3 col-form-label text-md-end">
                                                        <small><b style="color: blue;">Contraseña:</b></small>
                                                    </label>

                                                    <div class="col-md-9">
                                                        <input  type="text" class="form-control" value="" required >
                                                    </div> 
                                                </div>
                                                <!--Captcha-->
                                                <div class="col-mb-3 text-md-center">
                                                    <div class="col-md-6">
                                                        <button class="btn btn-secondary" id="btnCaptcha">
                                                            <input type="checkbox" id="captcha">
                                                            <b>No soy un robot</b> 
                                                        </button>
                                                    </div> 
                                                    <br/>
                                                    
                                                </div>

                                                <!--Suma-->
                                                <div class="row mb-3" id="suma" hidden>
                                                    
                                                    <label class="col-md-3 col-form-label text-md-end" id="operacion" value=""></label>
                                                    <div class="col-md-5">
                                                        <input  type="text" class="form-control" name="name" value="" id="result" required>
                                                        <span id="resultCorrecto" style="display:none;color:green;"> Confirmado</span>
                                                        <span id="resultIncorrecto" style="display:none;color:red;"> Incorrecto, verifique </span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="btn btn-light" type="checkbox" id="refrescar">Refrescar</button>
                                                    </div>
                                                    
                                                </div>
                                                <br/>
                                                </br>
                                                <a href="#" class="btn btn-primary">Ingresar</a>
                                                
                                            </form>
                                            <hr>
                                            <p class="text-md-end"><small><a href="recuperarContrasenia/recuperar_contrasenia.php">¿Olvidó su contraseña?</a></small></p> 
                                            <p class="text-md-end"><small>¿Aún no estás registrado? <a href="registro.php">Registrarse</a></small></p>
                                        </div></small>
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--------------------Aviso de Privacidad------------------->
                        <div class="container">
                        <div class="row">
                            <div class="col-md-12" style="text-align:center;">
                                <p><small><b> </b><a class="abrirModal" id="abrirModal" style="cursor:pointer;"><u>Aviso de Privacidad</u></a></small></p>
                            </div>
                        </div>
                    </div>
                    </div>
                   
                    <img src="imgs/Footer.png" class="w-100" alt="">
                </div>
                
                
            </div>


        </div>
    </div>

<?php include 'cdnScript.php';?>
<script src="js/login.js"></script>  
<?php include 'pie.php'; ?>


                
