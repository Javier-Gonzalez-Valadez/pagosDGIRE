<?php if(isset($_SESSION['admin'])):?>

<?php include_once "views/layouts/cabecera.php"?>

<link rel="stylesheet" href="<?=base_url?>assets/css/actualizar.css">
<!-- Theme style --> 
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">
<?php include_once('views/layouts/lateral.php') ?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div style="width:90%">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                Hola, <b><?=$_SESSION['admin']->nombre?></b>
                <b><?=$_SESSION['admin']->segundoApellido?> - (Privilegios de Administrador de <?=$_SESSION['admin']->nomArea?>)  </b>
            </li>
        </ul>
    </div>
    <div style="width:8%;text-align:right;">
        <a href="<?=base_url?>usuario/bienvenida" style="margin-top:-99%;"><i class="fas fa-home"
                style="color:#0b5ed7;outline: 1.90px solid #0b5ed7; border-radius:35%;padding:3%;"></i></a>
    </div>
</nav>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- AQUI EMPIEZA EL CONTENT WRAPPER -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 ">
                            <!-- -------------AQUI EMPIEZA LA CARD PRIMER FORMULARIO DE INGRESO A BUSCAR AL USUARIO--------------------- -->
                            <div class="card" style="width:100%; margin-top:50px;" id="cardBuscarUsuarios">

                                <div class="card-header pestaña" style="background-color: midnightblue;">
                                    <div style="display:inline-block;width:75%;"><b style="color:#FFF">Actualizar
                                            Usuario</b></div>

                                </div>


                                <!----------------------------Formulario de BUSQUEDA DE USUARIO A ACATUALIZAR---------------------------->

                                <div class="card-body ">

                                    <!----------------------------Formulario de Ingreso------------------------------>
                                    <form id="formAcceso">
                                        <!----------LOGIN DEL USUARIO------------>
                                        <div class="row mb-3">
                                            <label for="loginUsuario"
                                                class=" col-xs-12 col-md-3 col-lg-3 col-xl-3 col-form-label text-md-center"><small><b
                                                        class="color">Usuario: </b></small></label>
                                            <div class=" col-xs-12 col-md-9 col-lg-9 col-xl-9">
                                                <input id="loginUsuario" type="text" class="form-control"
                                                    name="loginUsuario" autofocus>
                                            </div>
                                        </div>
                                        <div class="divButton col-md-12 col-sm-12 col-xs-12"
                                            style="display:block; text-align:left; margin-left:5%;">
                                            <button class="btn btn-info swalDefaultSuccess" id="buscarUsuario"
                                                type="button" style="display:inline-block;" maxlength="10">
                                                Buscar <i class='fas fa-search'></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-------------------------FIN Formulario de BUSQUEDA DE USUARIO A ACATUALIZAR---------------------------->

                            </div>
                            <!-- |||||||||||||||||||||||||||||||||AQUI TERMINA LA CARD BUSCAR USUARIO ||||||||||||||||||||||||||||||| -->
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="container">
                                    <div class="row" style="margin-top:15px;">


                                        <div
                                            class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 divCarta text-md-center">

                                            <!-- --------------------------------------Botones-------------------------------------------------------------------- -->
                                            <div class="row divBuscarUser" hidden style="text-align:left;">
                                                <div class="col-md-12 col-lg-12 col-sm-12">
                                                    <a class="btn btn-app boton" id="btnVolverBuscar">
                                                        <i class="fas fa-search"></i><b class="espaciado">Buscar
                                                            otro usuario</b>
                                                    </a>

                                                </div>
                                            </div>
                                            <!-- --------------------------------------FIN Botones-------------------------------------------------------------------- -->

                                            <!-- -----------------------------------------------INICIO DE LA CARD DE LOS DE CERTIFICACION-------- --------------->
                                            <div class="card" id="cardEmpleadosCert" hidden>
                                                <div class="card-header pestaña"
                                                    style="background-color:midnightblue;text-align:left;">
                                                    <div style="display:inline-block;width:30%;">
                                                        <p style="display:inline-block;color:white;">
                                                            <b>Actualización del Usuario</b>
                                                        </p>
                                                    </div>
                                                    <div style="display:inline-block;width:69%;text-align:right;">
                                                        <button class="btn btn-warning" id="actualizarBtnCert"><i
                                                                class="fa-solid fa-edit"></i>
                                                            Modificar usuario
                                                        </button>
                                                        <button class="btn btn-danger" id="cancelarBtnCert"><i
                                                                class="fa-solid fa-xmark"></i>
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <p style="margin-top:px;margin-bottom:-5px;">( Modífica los
                                                        campos que deseas actualizar, y los que no, dejalos
                                                        exactamente igual
                                                        )</p>

                                                    </br>
                                                    <!--------------- ------------------------------AQUI EMPIEZA EL FORMULARIO DE REGISTRO DE EMPLEADOS DE CERTIFICACION----------------------------------------------- -->
                                                    <form id="formEmpCert" id="forRegistroEmpleadosCert">
                                                        <!--IdUsuario-->
                                                        <div class="row mb-3" hidden>
                                                            <label for="idUsuarioCert"
                                                                class="col-md-4 col-form-label text-md-end">ID Usuario
                                                                (*):</label>
                                                            <div class="col-md-6" style="text-align:left;">
                                                                <input id="idUsuarioCert" type="text"
                                                                    class="form-control" name="idUsuarioCert" autofocus>
                                                            </div>
                                                        </div>
                                                        <!--Nombre-->
                                                        <div class="row mb-3">
                                                            <label for="nombreCert"
                                                                class="col-md-4 col-form-label text-md-end">Nombre
                                                                completo
                                                                (*):</label>
                                                            <div class="col-md-6" style="text-align:left;">
                                                                <input id="nombreCert" type="text" class="form-control"
                                                                    maxlength="60" name="nombreCert" autofocus>
                                                                <span id="spanNombre" hidden style="color:red;">Escribe
                                                                    el o los nombres</span>
                                                            </div>
                                                        </div>
                                                        <!--Correo-->
                                                        <div class="row mb-3">
                                                            <label for="correoCert"
                                                                class="col-md-4 col-form-label text-md-end">Correo
                                                                Electrónico (*):</label>

                                                            <div class="col-md-6" style="text-align:left;">
                                                                <input id="correoCert" type="email" class="form-control"
                                                                    maxlength="60" name="correoCert" required>
                                                                <span id="spanCorreo" hidden style="color:red;">Escribe
                                                                    el correo</span>
                                                            </div>
                                                        </div>
                                                        <!--Login-->
                                                        <div class="row mb-3">
                                                            <label for="loginCert"
                                                                class="col-md-4 col-form-label text-md-end">Usuario
                                                                (*):</label>
                                                            <div class="col-md-6" style="text-align:left;">
                                                                <input id="loginCert" class="form-control" disabled
                                                                    maxlength="15" name="loginCert" required>
                                                                <span id="spanLogin" hidden style="color:red;">Escribe
                                                                    el usuario</span>
                                                            </div>
                                                        </div>
                                                        <!--DEPARTAMENTO-->
                                                        <div class="row mb-3">
                                                            <label class="col-md-4 col-form-label text-md-end"
                                                                for="depto">Departamento del empleado (*):</label>
                                                            <div class="col-md-6" style="text-align:left;">
                                                                <select class="form-select" name="deptoCert"
                                                                    id="deptoCert">
                                                                    <option value="Seleccione" id="seleccione">
                                                                        Seleccione su area
                                                                    </option>
                                                                    <?php for ($i=0; $i < count($deptos); $i++) { ?>
                                                                    <option value="<?= $deptos[$i]->idArea; ?>"
                                                                        id="seleccione"><?= $deptos[$i]->nomArea; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <span id="spanDepto" hidden
                                                                    style="color:red;">Selecciona el departamento</span>
                                                            </div>
                                                        </div>
                                                        <!--Contraseña-->
                                                        <div class="row mb-3">
                                                            <label for="passwordCert"
                                                                class="col-md-4 col-form-label text-md-end">Contraseña
                                                                (*):</label>
                                                            <div class="col-md-4" style="">
                                                                <input id="passwordCert" type="password" maxlength="100"
                                                                    disabled class="form-control" name="passwordCert"
                                                                    required autocomplete="new-password"
                                                                    value="*****************">
                                                                <span id="spanPassword" hidden
                                                                    style="color:red;">Escribe la contraseña</span>
                                                                <span id="spanNoCoincide1" hidden
                                                                    style="color:orange;">No coinciden las
                                                                    contraseñas!</span>
                                                                <small><small><span
                                                                            id="passstrength"></span></small></small>
                                                            </div>
                                                            <div class="col-md-3"
                                                                style="margin-left:-35px;margin-top:6px;">
                                                                <input type="checkbox" name="" id="actContra" style="">
                                                                <p style="display:inline-block;">Actualizar</p>
                                                            </div>
                                                        </div>
                                                        <!--Confirmar Contraseña-->
                                                        <div class="row mb-3">
                                                            <label for="password-confirmCert"
                                                                class="col-md-4 col-form-label text-md-end">Confirmar
                                                                Contraseña
                                                                (*):</label>
                                                            <div class="col-md-6" style="text-align:left;">
                                                                <input id="password-confirmCert" type="password"
                                                                    maxlength="100" disabled class="form-control"
                                                                    required autocomplete="new-password"
                                                                    value="*****************">
                                                                <span id="spanConfirmPassword" hidden
                                                                    style="color:red;">Escribe la verficación de la
                                                                    contraseña</span>
                                                                <span id="spanNoCoincide2" hidden
                                                                    style="color:orange;">No coinciden las
                                                                    contraseñas!</span>
                                                            </div>
                                                        </div>
                                                        <!--Fecha de Registro-->
                                                        <div class="row mb-3" hidden>
                                                            <label for="fechaRegistroCert"
                                                                class="col-md-4 col-form-label text-md-end">Fecha de
                                                                registro
                                                                :</label>
                                                            <div class="col-md-6">
                                                                <input id="fechaRegistroCert" class="form-control">
                                                            </div>
                                                        </div>
                                                        <!--Activo-->
                                                        <div class="row mb-3">
                                                            <label for="activoSelect"
                                                                class="col-md-4 col-form-label text-md-end">Usuario
                                                                Activo
                                                                (*):</label>
                                                            <div class="col-md-2" style="text-align:left;">
                                                                <select class="form-select" name="activoSelect"
                                                                    id="activoSelect">
                                                                    <option value='1'>Si</option>
                                                                    <option value='0'>No</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--perfil-->
                                                        <div class="row mb-3">
                                                            <label class="col-md-4 col-form-label text-md-end"
                                                                for="perfil">Seleccione
                                                                el perfil del empleado (*):</label>
                                                            <div class="col-md-6" style="text-align:left;">
                                                                <select class="form-select" name="perfilCert"
                                                                    id="perfilCert">
                                                                    <option value="Seleccione" selected="selected"
                                                                        id="seleccione">
                                                                        Seleccione</option>
                                                                    <?php for ($i=0; $i < count($perfiles); $i++) { ?>
                                                                    <option value="<?= $perfiles[$i]->idPerfil; ?>">
                                                                        <?= $perfiles[$i]->nomPerfil; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <span id="spanPerfil" hidden
                                                                    style="color:red;">Selecciona el perfil</span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!------------------------------------------------AQUI TERMINA EL FORMULARIO DE REGISTRO DE EMPLEADOS DE CERTIFICACION----------------------------------------------->


                                                </div>

                                            </div>
                                            <!------------------------------ FIN DE LA CARD DE EMPLEADOS DE CERTIFICACION----------------------- -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>

                <?php include_once('views/layouts/pie.php') ?>
                <script src="<?=base_url?>assets/js/actualizar.js"></script>

                <script>
                document.addEventListener('DOMContentLoaded', () => {
                    document.querySelectorAll('input').forEach(node => node.addEventListener('keypress',
                        e => {
                            if (e.keyCode == 13) {
                                e.preventDefault();
                                $('#buscarUsuario').click();


                            }
                        }))
                });
                </script>
            </div>
            <!-- AQUI TERMINA EL CONTENT WRAPPER  -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php else:?>
<?= header("Location:".base_url."usuario/acceso");?>
<?php endif;?>