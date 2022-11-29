
<link rel="stylesheet" href="assets/css/registro.css"> 

        <div class="row" >
            <div class="col-md-2"></div>
            <!--Form del Register-->
            <div class="col-md-8" >
                <div class="card text-start"> 
                  <div class="card-body">
                    <h5 class="card-title" style="color: midnightblue; text-align:center;">Datos de registro al sistema de pagos DGIRE</h5>
                    <p style="text-align:center;"><small>Por favor llene el formulario que se le proporciona, los campos con * son obligatorios.</small></p>

                    <div  class="marco" >Datos personales</div>
                    </br>
                    <form method="POST" action="">
                        <!--Perfil-->
                        <div class="row mb-3">
                            <label for="perfil" class="col-md-4 col-form-label text-md-end">Seleccione el perfil (*):</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name= "perfil" id="perfil">
                                    <option selected id="pE">Seleccione</option>
                                    <option value="Alumno">Alumno</option>
                                    <option value="Director Tecnico">Director Tecnico</option>
                                    <option value="Profesor">Profesor</option>
                                    <option value="Publico en general">Publico en general</option>
                                </select> 
                            </div>  
                        </div> 
                        <!--Nombre-->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre (*):</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <!--Apellido Paterno-->
                        <div class="row mb-3">
                            <label for="apellidoPaterno" class="col-md-4 col-form-label text-md-end">Primer apellido (*):</label>
                            <div class="col-md-6">
                                <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno" value="" required autocomplete="apellidoPaterno">
                            </div>
                        </div>
                        <!--Apellido Materno-->
                        <div class="row mb-3">
                            <label for="apellidoMaterno" class="col-md-4 col-form-label text-md-end">Segundo apellido (*):</label>

                            <div class="col-md-6">
                                <input id="apellidoMaterno" type="text" class="form-control" name="apellidoMaterno" value="" required autocomplete="apellidoMaterno" autofocus>
                            </div>
                        </div>
                        <!--Clave plantel-->
                        <div class="row mb-3" hidden id="cvePlantel">
                            <label for="apellidoPaterno"  class="col-md-4 col-form-label text-md-end">Clave del Plantel (*):</label>
                            <div class="col-md-6">
                                <input id="clavePlantel"  type="text" class="form-control" name="clavePlantel" value="" required autocomplete="apellidoPaterno">
                            </div> 
                        </div>  
                        <!--Numero de Expediente-->
                        <div class="row mb-3" hidden id="noExpdte">
                            <label for="noExpdte"  class="col-md-4 col-form-label text-md-end">Numero de Expediente (*):</label>

                            <div class="col-md-6">
                                <input id="noExpdte" type="text" class="form-control" name="noExpediente" value="" required autocomplete="apellidoMaterno" autofocus>
                            </div>
                        </div>
                        <!--Correo-->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Correo Electronico (*):</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control" name="email" value="" required autocomplete="email">
                                <span id="errorCorreo" style="display:none;color:red;"><small><small>Formato de correo inválido</small></small></span>
                                <span id="successCorreo" style="display:none;color:green;"><small><small>Correo válido</small></small></span>
                            </div>
                        </div>
                        <!--Confirmar correo-->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Confirmar Correo Electronico (*):</label>

                            <div class="col-md-6">
                                <input id="confirmCorreo" type="confirmEmail" class="form-control" value="" required autocomplete="email">
                                <span id="errorCorreoC" style="display:none;color:red;"><small><small>Formato de correo inválido en la confirmación</small></small></span>
                                <span id="errorConfirm" style="display:none;color:red;"><small><small>El correo no coincide, verifique.</small></small></span>
                                <span id="successConfirm" style="display:none;color:green;"><small><small>Los correos coinciden</small></small></span>
                            </div>
                        </div>
                        <!--Telefono-->
                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">Telefono (*):</label>

                            <div class="col-md-6">
                                <input id="telefono" type="tel" class="form-control" name="telefono" placeholder="Ej. (lada) +56226046"
                                value="" required autocomplete="telefono">
                            </div>
                        </div>
                        <!--Celular-->  
                        <div class="row mb-3">
                            <label for="celular" class="col-md-4 col-form-label text-md-end">Celular (*):</label>

                            <div class="col-md-6">
                                <input id="celular" type="tel" class="form-control" placeholder="Ej. (lada) +56226046"
                                name="celular" value="" required autocomplete="celular">
                            </div>
                        </div>
                        <!--Contraseña--> 
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña (*):</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                <small><small><span id="passstrength"></span></small></small>
                            </div>
                        </div>
                        <!--Confirmar Contraseña-->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar Contraseña (*):</label> 

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!--Datos de Facturacion-->
                        <div class="row mb-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-9"> 
                                <div class="col-md-12">
                                    <label style="display: inline-block;">Marque la casilla de verificación si desea ingresar sus datos de facturación</label>
                                    <input type="checkbox" style="display: inline-block; margin-left:5px" id="facturacion">
                                </div>
                                </br>
                            <div class="col-md-2"></div>
                        </div>
                        <br/>
                        <br/>
                        <!--------------------------------Datos de facturacion---------------------->
                        <div class="salto" hidden>
                            <div class="marco" id="marco">Datos de Facturación</div>
                            </br>
                        </div>
                        <!--Tipo de persona--->
                        <div class="row mb-3 " id="tipoPersona" hidden>
                            <label for="tipoPersona" class="col-md-4 col-form-label text-md-end">Tipo de persona (*):</label>
                            <div class="col-md-6">
                                <select name="" class="form-select" id="selecTipoPersona" >
                                    <option selected>Seleccione</option>
                                    <option value="fisica">Física</option>
                                    <option value="moral">Moral</option>
                                </select> 
                            </div>  
                        </div> 

                        <!--RFC-->
                        <div class="row mb-3" id="RFC" hidden>
                            <label for="RFC" class="col-md-4 col-form-label text-md-end">RFC (*):</label> 

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!--Nombre FACTURACION-->
                        <div class="row mb-3" id="nombreFac" hidden>
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nombre (*):</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <!--Apellido Paterno FACTURACION-->
                        <div class="row mb-3" id="apellidoPaternoFac" hidden>
                            <label for="apellidoPaterno" class="col-md-4 col-form-label text-md-end">Primer apellido(*):</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="apellidoPaterno" value="" required >
                            </div>
                        </div>

                        <!--Apellido Materno FACTURACION-->
                        <div class="row mb-3" id="apellidoMaternoFac" hidden>
                            <label for="apellidoMaternoFac" class="col-md-4 col-form-label text-md-end">Segundo apellido (*):</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="apellidoMaterno" value="" required autocomplete="apellidoMaterno" autofocus>
                            </div>
                        </div>

                        <!--Razon Social FACTURACION-->
                        <div class="row mb-3" id="rsFac" hidden>
                            <label class="col-md-4 col-form-label text-md-end">Razón Social (*):</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control"  value="" requiredautofocus>
                            </div>
                        </div>

                        <!--Calle FACTURACION-->
                        <div class="row mb-3" id="calleFac" hidden>
                            <label for="calleFac" class="col-md-4 col-form-label text-md-end">Calle (*):</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="apellidoMaterno" value="" required >
                            </div>
                        </div>

                        <!--Numero Exterior FACTURACION-->
                        <div class="row mb-3" id="noExtFac" hidden>
                            <label  class="col-md-4 col-form-label text-md-end">Número Exterior (*):</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="numExterior" value="" required >
                            </div>
                        </div>

                        <!--Numero Interior FACTURACION-->
                        <div class="row mb-3" id="noIntFac" hidden>
                            <label class="col-md-4 col-form-label text-md-end">Número Interior:</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="numInterior" value="" required >
                            </div>
                        </div>

                        <!--Codigo Postal FACTURACION-->
                        <div class="row mb-3" id="CPFac" hidden>
                            <label for="calleFac" class="col-md-4 col-form-label text-md-end">Código Postal (*):</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="codigoPostal" value="" required >
                            </div>
                        </div>

                        <!--Colonia FACTURACION-->
                        <div class="row mb-3" id="coloniaFac" hidden>
                            <label for="tipoPersona" class="col-md-4 col-form-label text-md-end">Colonia (*):</label>
                            <div class="col-md-6">
                                <select name="" id="coloniaSelect" class="form-select">
                                    <option selected>Elegir</option>
                                </select> 
                            </div>  
                        </div> 

                        <!--Ciudad FACTURACION-->
                        <div class="row mb-3" id="ciudadFac" hidden>
                            <label for="tipoPersona" class="col-md-4 col-form-label text-md-end">Ciudad (*):</label>
                            <div class="col-md-6">
                                <select name="" id="ciudadSelect" class="form-select">
                                    <option selected>Elegir</option>
                                </select> 
                            </div>  
                        </div> 

                        <!--Municipio FACTURACION-->
                        <div class="row mb-3" id="municipioFac" hidden>
                            <label class="col-md-4 col-form-label text-md-end">Municipio (*):</label>
                            <div class="col-md-6">
                                <select name="" id="municipioSelect" class="form-select">
                                    <option selected>Elegir</option>
                                </select> 
                            </div>  
                        </div> 

                        <!--Estado FACTURACION-->
                        <div class="row mb-3" id="estadoFac " hidden>
                            <label class="col-md-4 col-form-label text-md-end">Estado (*):</label>
                            <div class="col-md-6">
                                <select name="" id="estadoSelect" class="form-select">
                                    <option selected>Elegir</option>
                                </select> 
                            </div>  
                        </div> 

                        <!--¿NO aparece su colonia?-->
                        <div class="row mb-3" id="colNoAp" hidden>
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <label class="" style="display: inline-block;">
                                        ¿No aparece su colonia?</label>
                                    <input type="checkbox" style="display: inline-block; margin-left:5px" id="noApCol">
                                </div>
                            </div>     
                            <br/> 
                        </div>
                        
                        
                        <!--Escriba su colonia-->   
                        <div class="row mb-3" id="ponerColonia" hidden>
                            <label for="calleFac" class="col-md-4 col-form-label text-md-end">Ecriba su colonia(*):</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="ponColonia" value="" required >
                            </div>
                        </div>

                        <!-----------------------IFRAME----------------------------> 
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="5" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" >
                                        <div class="modal-content">
                                        <div class="modal-header" style="display:block;text-align:center;color:midnightblue;"> 
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel" >Aviso de Privacidad</h1>
                                        </div>
                                        <div class="modal-body">
                                            <iframe class="w-100"style="height:60vh;" src="https://www.dgire.unam.mx/webdgire/" frameborder="0"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Acepto términos y condiciones</button>
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  


                            <div class="col-md-2"></div> 
                        </div>

                        
                        <!--Terminos y Condiciones-->
                        <div class="row"> 
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                
                                <div class="col-md-12">
                                <a hidden href="https://apps.dgire.unam.mx/avisos/" id="redirectAviso" target="_blank"></a>  
                                    <label class="" style="display: inline-block;">
                                        Confirme que usted acepta los Terminos y Condiciones del Aviso de Privacidad (*)</label>
                                    <input type="checkbox" id="tyc">
                                    
                                </div>
                                </br>
                            </div>             
                        </div>
                        <br/>
                        <br/> 

                        
                        <!--Captcha-->
                        <div class="col-mb-3 text-md-center">
                            <div class="col-md-12" style="text-align:center;display:block;">
                                <button class="btn btn-outline-secondary" id="btnCaptcha">
                                    <input type="checkbox" id="captcha">
                                    <b>No soy un robot </b> 
                                </button>
                            </div> 
                            <br/>
                            
                        </div>

                        <!--Suma--> 
                        <div class="row mb-3" id="suma" hidden>
                            
                            <label class="col-md-4 col-form-label text-md-end" id="operacion" value=""></label>
                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="name" value="" id="result" required>
                                <span id="resultCorrecto" style="display:none;color:green;"> Confirmado</span>
                                <span id="resultIncorrecto" style="display:none;color:red;"> Incorrecto, verifique </span>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-primary" type="checkbox" id="refrescar">Refrescar <i class='fa fa-refresh'></i></button>
                            </div>
                            
                        </div>
                        <br/>
 
                        <!--Boton de Envío-->
                        <div class="col-mb-3 text-md-center">
                            <div class="text-md-center d-grid gap-2 col-4 mx-auto"">
                                <button type="submit" class="btn" id="registrarse">
                                    Registrarse <small><i class="fa fa-user-plus"></i></small>
                                </button>
                            </div> 
                        </div>
                    </form>
                    
                  </div>
                  
                </div>

            </div>
        </div>   
        <div class="row">
            <div class="col-md-2 text-md-end">
            </div>
            <div class="col-md-8 text-md-start">
                <a href="acceso.php" class="btn btn-outline-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Regresar </a>

            </div>
            <div class="col-md-2 text-md-end">  
            </div>
                                                 
        </div>      

    <script id="rendered-js">
    $(document).ready(function ($) {
        $('#myPassword').strength({
        strengthClass: 'strength',
        strengthMeterClass: 'strength_meter',
        strengthButtonClass: 'button_strength',
        strengthButtonText: 'Mostrar Password',
        strengthButtonTextToggle: 'Ocultar Password' });
    });
    </script>
    <script type="text/javascript" src="assets/js/registro.js"></script> 
