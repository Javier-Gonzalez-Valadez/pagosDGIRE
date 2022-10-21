
<?php 
    include 'cabecera.php';
?>


    <div class="container w-10">
        <div class="row" >
            <div class="col-md-1" >
            </div>
            <!--Form del Register-->
            <div class="col-md-10" >
                <div class="card text-start">
                  <img class="card-img-top w-100" src="imgs/BannerDGIRE.png" alt="Title">
                  <div class="card-body">
                    <h5 class="card-title" style="color:blue;">Datos de registro al sistema de pagos DGIRE</h5>
                    <p><small>Por favor llene el formulario que se le proporciona, los campos con * son obligatorios.</small></p>

                    <div class="ui-widget-header ui-corner-top ui-corner-bottom" align="center" style="padding:5px 0 5px 0; width:88%; margin:15px auto 0 auto; font-size:16px; margin-bottom:10px;">Datos personales</div>

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
                            <label for="apellidoPaterno" class="col-md-4 col-form-label text-md-end">Apellido Paterno (*):</label>
                            <div class="col-md-6">
                                <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno" value="" required autocomplete="apellidoPaterno">
                            </div>
                        </div>
                        <!--Apellido Materno-->
                        <div class="row mb-3">
                            <label for="apellidoMaterno" class="col-md-4 col-form-label text-md-end">Apellido Materno (*):</label>

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
                                <span id="errorCorreo" style="display:none;color:red;"><small>Formato de correo inválido</small></span>
                                <span id="successCorreo" style="display:none;color:green;"><small>Correo válido</small></span>
                            </div>
                        </div>
                        <!--Confirmar correo-->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Confirmar Correo Electronico (*):</label>

                            <div class="col-md-6">
                                <input id="confirmCorreo" type="confirmEmail" class="form-control" value="" required autocomplete="email">
                                <span id="errorCorreoC" style="display:none;color:red;"><small>Formato de correo inválido en la confirmación</small></span>
                                <span id="errorConfirm" style="display:none;color:red;"><small>El correo no coincide, verifique.</small></span>
                                <span id="successConfirm" style="display:none;color:green;"><small>Los correos coinciden</small></span>
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
                            <div class="col-md-2"></div>
                        </div>
                        <br/>
                        <br/>
                        <!--------------------------------Datos de facturacion---------------------->
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
                            <label for="apellidoPaterno" class="col-md-4 col-form-label text-md-end">Apellido Paterno (*):</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="apellidoPaterno" value="" required >
                            </div>
                        </div>

                        <!--Apellido Materno FACTURACION-->
                        <div class="row mb-3" id="apellidoMaternoFac" hidden>
                            <label for="apellidoMaternoFac" class="col-md-4 col-form-label text-md-end">Apellido Materno (*):</label>

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

                        <!--Terminos y condiciones - MODAL INFO-->
                        <div class="modal modal-xl tycModal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable ">
                                <div class="modal-content">  
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" style="display:inline;" id="staticBackdropLabel"><b style="color:blue;">AVISO DE PRIVACIDAD DGIRE</b></h1>
                                    </div>
                                    <div class="modal-body" style="margin-left:13px;margin-right:13px; text-align: justify;">
                                    <p><small> La Dirección General de Incorporación y Revalidación de Estudios (en adelante DGIRE) de la Universidad Nacional Autónoma de México (en lo subsiguiente UNAM), con domicilio en Circuito Cultural S/N (enfrente de la Dirección General de Planeación), Ciudad Universitaria, Alcaldía Coyoacán, C.P. 04510, en la Ciudad de México, recaba datos personales y es responsable del tratamiento que se les de.</small></p>
                                        <h6><b>Los datos personales que son recabados serán utilizados para las siguientes finalidades:</b></h6>
                                        <ul>
                                            <li><small>Otorgar validez e incorporados a los estudios que se realicen en establecimientos educativos nacionales o extranjeros.</small></li>
                                            <li><small>Autorizar a docentes de instituciones educativas incorporadas a la Universidad para impartir una cátedra, de conformidad con el Manual de Disposiciones y Procedimientos para el Sistema Incorporado de la UNAM.</small></li>
                                            <li><small>Dar seguimiento del avance escolar de los alumnos registrados por una institución educativa incorporada a la UNAM y otorgarle la certificación de sus estudios.</small></li>
                                            <li><small>Registrar, y en su caso, asignar becas destinadas a los alumnos adscritos a una institución con planes de estudios incorporados a la UNAM cada ciclo escolar anual.</small></li>
                                            <li><small>Enviar Fichas de Depósito digital Referenciado (FDR) y Comprobantes Fiscales Digitales por Internet (CFDI) al usuario que pague y solicite factura derivado de la presentación de un servicio de la DGIRE.</small></li>
                                            <li><small>Difundir eventos, realizar actividades, capacitación continua, talleres e información a través de boletines relativos a las funciones de la DGIRE.</small></li>
                                            <li><small>Realizar estadísticas y análisis institucionales para el diagnóstico, planeación y evaluación del desempeño académico y administrativo.</small></li>
                                            <li><small>Seguridad y control de acceso al área reservada. </small></li>
                                        </ul>
                                        <p><small>Con motivo de los servicios que administra y gestiona el área universitaria, esta Dirección General trata datos personales de menores de edad y corresponde a sus padres o tutores legales otorgar el consentimiento expreso al suscribir el presente Aviso de Privacidad; en dicho tratamiento se privilegiará el interés superior de los niños y adolescentes en términos de las disposiciones previstas en la Ley General de los Derechos de Niñas, Niños y Adolescentes.</small></p>
                                        <p><small>Se recaban datos personales de los aspirantes y alumnos, algunos de ellos sensibles, así como también de profesores, directores técnicos, representantes de las instituciones educativas que aspiran a incorporarse al Sistema Universitario al momento de llenar los formularios que obran en los portales web de DGIRE:</small></p>
                                        <ul>
                                            <li>
                                                <small><b>Datos académicos de profesores incorporados: </b></small>
                                                <ul>
                                                    <li><small><u>Datos de identificación y estudios: </u>Nombre completo, Clave Única de Registro de Población (en adelante CURP), nacionalidad, género, ciudad, país, último año activo, área de estudio, último nivel o grado de estudios concluido o pasante de: bachillerato, licenciatura, especialidad, maestría, doctorado o posdoctorado; porcentaje de créditos y promedio, cursos y diplomados cursados, idiomas y trayectoria docente.</small></li>
                                                    <li><small><u>Documentos que obran en su expediente:</u>Título, cédula profesional, constancia de créditos y promedio certificado de bachillerato, currículum, acreditación de cursos, constancia de registro en la SHCP, acta de examen profesional, constancia de examen de lengua extranjera expedida por la UNAM, acta de nacimiento, constancia de idioma expedida por otra institución, calidad migratoria y permiso de Secretaría de Gobernación.</small></li>
                                                    <li><small><u>Datos de facturación: </u>RFC de las personas físicas, CURP, domicilio y teléfono particular.</small></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <small><b>Datos académicos de alumnos incorporados:</b></small>
                                                <ul>
                                                    <li><small><u>Datos de identificación y estudios: </u>Nombre completo, CURP, número de cuenta, género, fecha y país de nacimiento, nacionalidad, correo electrónico, teléfonos; datos de la institución educativa de adscripción; acreditación de la secundaria, el bachillerato o la licenciatura, según corresponda y la documentación oficial probatoria. Plan de estudios y asignaturas cursadas, calificaciones, grados y créditos obtenidos (avance académico) e historial académico.</small></li>
                                                    <li><small><u>Estado académico del alumno: </u>Vigente, no vigente, exalumno, baja definitiva por falsificación.</small></li>
                                                    <li><small><u>Datos del nivel actual de estudios:</u> Clave de plantel y plan de estudios; área y año del plan de estudios; año y semestre del ciclo actual; año y semestre que cursa según plan de estudios, folio de certificado de nivel actual, fecha de modificación y de terminación o baja de estudios.</small></li>
                                                    <li><small><u>Datos de primer ingreso a DGIRE o secundaria: </u>Plantel de 1er ingreso, plan de 1er ingreso, área de nivel de primer ingreso, años de primer ingreso a DGIRE, ingreso por revalidación, fecha de primer ingreso a DGIRE, fecha de término de 1er ingreso, folio de certificado de 1er ingreso.</small></li>
                                                    <li><small><u>Datos del nivel anterior de estudios:</u> Si fue preparatoria o Colegio de Ciencias y Humanidades, fecha de término del nivel anterior, folio de certificado del nivel anterior, clave del plantel, del plan y área del nivel anterior, promedio en plan de estudios anterior, cédula única de registro personal, tipo de exámenes con que acreditó: ordinarios o extraordinarios, asignaturas acreditadas o revalidadas (de manera ordinaria o extraordinaria).
                                                    </small></li>

                                                </ul>
                                            </li>
                                            <li>
                                                <small><b>Datos personales sensibles de alumnos incorporados:</b> Fotografía, firma y huellas dactilares del alumno.</small>
                                            </li>
                                            <li>
                                                <small><b>Datos de la Institución educativa que sea incorporarse al Sistema Universitario:</b>Nombres completos de: propietario, del rector, del director general, director técnico, del representante legal, del representante de servicios escolares, representante de trámites y apoderado legal del plantel, planos arquitectónicos del plantel donde se localiza. Correo electrónico, teléfono y datos de facturación institucional del plantel.</small>
                                            </li>

                                        </ul>
                                        <p><small>El área universitaria no realiza transferencias de sus datos personales a terceros.</small></p>
                                        <h6><b>Fundamento para el tratamiento de datos personales</b></h6>
                                        <p><small>Los artículos 6º, Base A y 16, segundo párrafo, de la Constitución Política de los Estados Unidos Mexicanos; el 3º, fracción XXXIII, 4º, 16, 17, 18, 20, 21, 22, 23, 26, 27 y 28 de la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, así como los numerales del 5 al 19 de los Lineamientos para la Protección de Datos Personales en Posesión de la Universidad Nacional Autónoma de México, publicados en la Gaceta UNAM el 25 de febrero de 2019.</small></p>
                                        <h6><i><b>Cookies y Web Beacons</b></i></h6>
                                        <p><small>La página web utiliza cookies y web beacons a través de los cuales es posible generar información estadística.</small></p>
                                        <p><small>Las cookies son archivos de texto que son descargados automáticamente y almacenados en el disco duro del equipo de cómputo del usuario al navegar en una página de Internet específica, que permiten recordar al servidor de Internet algunos datos sobre este usuario, entre ellos, sus preferencias para la visualización de las páginas en ese servidor, nombre y contraseña. Asimismo, el sitio web contiene anuncios publicitarios que pueden enviar cookies de nuestros usuarios.</small></p>
                                        <p><small>Las web beacons son imágenes insertadas en una página de Internet o correo electrónico, que puede ser utilizado para monitorear el comportamiento de un visitante, como almacenar información sobre la dirección IP del usuario, duración del tiempo de interacción en dicha página y el tipo de navegador utilizado, entre otros. Dicha información se almacena en las bitácoras de nuestro servidor y es la siguiente:</small></p>
                                        <ul>
                                            <li><small>Tipo de navegador y sistema operativo.</small></li>
                                            <li><small>Si cuenta o no con software como java script o flash.</small></li>
                                            <li><small>Sitio que visitó antes de entrar al nuestro.</small></li>
                                            <li><small>Vínculos web que sigue en Internet.</small></li>
                                            <li><small>Su dirección IP (Internet Protocol).</small></li>
                                        </ul>
                                        <p><small>Estas cookies y otras tecnologías pueden ser deshabilitadas. Para conocer cómo hacerlo, consulte los siguientes vínculos:</small></p>
                                        <ul>
                                            <li><small><b>Microsoft Edge:</b> <a target="_blank" href="https://support.microsoft.com/es-mx/help/4468242/microsoft-edge-browsing-data-and-privacy-microsoft-privacy">https://support.microsoft.com/es-mx/help/4468242/microsoft-edge-browsing-data-and-privacy-microsoft-privacy</a></small></li>
                                            <li><small><b>Mozilla Firefox:</b> <a target="_blank" href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias</a></small></li>
                                            <li><small><b>Google Chrome:</b> <a target="_blank" href="https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=es">https://support.google.com/accounts/answer/61416?co=GENIE.Platform%3DDesktop&hl=es</a></small></li>
                                            <li><small><b>Apple Safari:</b> <a target="_blank" href="https://support.apple.com/es-es/guide/safari/sfri11471/mac">https://support.apple.com/es-es/guide/safari/sfri11471/mac</a></small></li>
                                        </ul>
                                        <p><small>En el caso de empleo de cookies, el botón de "ayuda" que se encuentra en la barra de herramientas de la mayoría de los navegadores, le dirá cómo evitar aceptar nuevas cookies, cómo hacer que el navegador le notifique cuando recibe una nueva cookie o cómo deshabilitar todas las cookies.</small></p>
                                        <br/>
                                        <h6><b>Ejercicio de derechos ARCO (Acceso, rectificación, cancelación u oposición al uso de sus datos personales)</b></h6>
                                        <p><small>Tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho a solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada adecuadamente (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.</small></p>
                                        <p><small>Para ejercer sus derechos de acceso, rectificación, cancelación y oposición puede acudir a la Unidad de Transparencia de la Universidad Nacional Autónoma de México, con domicilio en lado Norponiente del Circuito Estadio Olímpico sin número, a un costado del Anexo de la Facultad de Filosofía y Letras, Ciudad Universitaria, Alcaldía Coyoacán, C.P. 04510, Ciudad de México, o bien por medio de la Plataforma Nacional de Transparencia <a href="https://www.plataformadetransparencia.org.mx">(https://www.plataformadetransparencia.org.mx)</a>.</small></p>
                                        <p><small>La determinación adoptada, se le comunicará en un plazo máximo de veinte días hábiles contados desde la fecha en que se recibió la solicitud, a efecto de que, si resulta procedente, haga efectiva la misma dentro de los quince días hábiles siguientes a que se comunique la respuesta.</small></p>
                                        <p><small>Puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. Asimismo, usted deberá considerar que, para ciertos fines, la revocación de su consentimiento implicará que no le podamos seguir prestando el servicio del sistema en línea que nos solicitó, o la conclusión de su relación con nosotros.</small></p>
                                        
                                        <h6><b>Modificaciones al Aviso de Privacidad</b></h6>
                                        <p><small>El presente aviso de privacidad puede sufrir modificaciones o actualizaciones. Dichas actualizaciones o modificaciones estarán disponibles al público, por lo que el Titular podrá consultarlas en el sitio web de la DGIRE en la sección de <b>Aviso de Privacidad</b>. Se recomienda y requiere al Titular consultar el Aviso de Privacidad, por lo menos semestralmente para estar actualizado de las condiciones y términos de este.</small></p>
                                        <p><small><b>Fecha última actualización:</b> 29 de julio de 2019.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="cerrarModal" class="btn btn-primary" data-bs-dismiss="modal">Acepto</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Terminos y Condiciones-->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <label class="" style="display: inline-block;">
                                        Confirme que usted acepta los Terminos y Condiciones del Aviso de Privacidad (*)</label>
                                    <input type="checkbox" id="tyc" data-toggle="modal" data-target="#tycModal" style="display: inline-block; margin-left:5px">
                                </div>
                            </div>             
                        </div>
                        <br/>
                        <br/>

                        
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
                            
                            <label class="col-md-4 col-form-label text-md-end" id="operacion" value=""></label>
                            <div class="col-md-3">
                                <input  type="text" class="form-control" name="name" value="" id="result" required>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-light" type="checkbox" id="refrescar">Refrescar</button>
                            </div>
                            
                        </div>
                        <br/>
                        <!--Boton de Envío-->
                        <div class="col-mb-3 text-md-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div> 
                        </div>
                    </form>
                    
                  </div>
                  
                </div>
                <img class="card-img-footer w-100" src="imgs/Footer.png" alt="Title">
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div> 

<?php
    include 'pie.php';
?>
