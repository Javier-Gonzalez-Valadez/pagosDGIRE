<?php if(isset($_SESSION['admin'])):?>
<link rel="stylesheet" href="<?=base_url?>assets/css/registro.css">

<?php  require_once 'views/layouts/cabecera.php'; ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">



<?php  require_once 'views/layouts/lateral.php'; ?>

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
                style="color:#0b5ed7; outline: 1.90px solid #0b5ed7; border-radius:35%;padding:3%;"></i></a>
    </div>
</nav>
<!-- Fin del NavBar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-------------------INICIO DEL MAIN CONTENT-------------------->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <!--Form del Register-->
                        <div class="col-md-8">

                            <!-- -----------------------------------INICIO DE LA CARD DE REGISTRO EMPLEADOS DE CERTIFICACION----------------------------------------- -->
                            <div class="card " id="cardEmpleadosCert">
                                <div class="card-header pestaña" style="background-color:midnightblue;">
                                    <div style="text-align:left;display:inline-block; width:78%;">
                                        <p class="formTitle" style="color:white;padding-top:-30px;"><b>Datos para el
                                                registro de un Usuario</b></p>
                                    </div>

                                    <div style="text-align:rigth;display:inline-block;width:20%;">
                                        <button class="btn btn-success" id="registrarCert" style="color:white;">
                                            Guardar <small><i class="fa-solid fa-check"></i></i></small>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body" style="text-align:center;">
                                    <p style="margin-top:px;margin-bottom:-5px;">( Llene los campos para registrar
                                        usuario, los campos marcados con * son obligatorios )</p>

                                    </br>
                                    <!--------------- ------------------------------AQUI EMPIEZA EL FORMULARIO DE REGISTRO DE EMPLEADOS DE CERTIFICACION----------------------------------------------- -->
                                    <form id="forRegistroEmpleadosCert">
                                        <!--Login-->
                                        <div class="row mb-3">
                                            <label for="loginCert" class="col-md-4 col-form-label text-md-end">Usuario
                                                (*):</label>
                                            <div class="col-md-6" style="text-align:left;">
                                                <input id="loginCert" class="form-control" name="loginCert" required autofocus
                                                    maxlength="15">
                                                <span id="spanLogin" hidden style="color:red;">Escribe el usuario</span>
                                                <span id="spanYaExiste" hidden style="color:red;">Este nombre de usuario ya existe!</span>
                                            </div>
                                        </div>
                                        <!--Nombre-->
                                        <div class="row mb-3">
                                            <label for="nombreCert" class="col-md-4 col-form-label text-md-end">Nombre Completo
                                                (*):</label>
                                            <div class="col-md-6" style="text-align:left;">
                                                <input id="nombreCert" type="text" class="form-control" required
                                                    maxlength="60" name="nombreCert" required autocomplete="nombreCert"
                                                    >
                                                <span id="spanNombre" hidden style="color:red;">Escribe el o los
                                                    nombres</span>
                                            </div>
                                        </div>
                                        <!--Correo-->
                                        <div class="row mb-3">
                                            <label for="correoCert" class="col-md-4 col-form-label text-md-end">Correo
                                                Electrónico (*):</label>

                                            <div class="col-md-6" style="text-align:left;">
                                                <input id="correoCert" type="email" class="form-control" maxlength="60"
                                                    name="correoCert" required autocomplete="email">
                                                <span id="spanCorreo" hidden style="color:red;">Escribe el correo</span>
                                            </div>
                                        </div>
                                        <!--DEPARTAMENTO-->
                                        <div class="row mb-3">
                                            <label class="col-md-4 col-form-label text-md-end"
                                                for="deptoCert">Departamento del empleado (*):</label>
                                            <div class="col-md-6" style="text-align:left;">
                                                <select class="form-select" name="deptoCert" id="deptoCert" required>
                                                    <option value="Seleccione" id="seleccione">Seleccione
                                                    </option>
                                                    <?php for ($i=0; $i < count($deptos); $i++) { ?>
                                                    <option value="<?= $deptos[$i]->idArea; ?>" id="seleccione">
                                                        <?= $deptos[$i]->nomArea; ?></option>
                                                    <?php } ?>

                                                </select>
                                                <span id="spanDepto" hidden style="color:red;">Selecciona el
                                                    departamento</span>
                                            </div>
                                        </div>
                                        <!--Contraseña-->
                                        <div class="row mb-3">
                                            <label for="passwordCert"
                                                class="col-md-4 col-form-label text-md-end">Contraseña
                                                (*):</label>
                                            <div class="col-md-6" style="text-align:left;">
                                                <input id="passwordCert" type="password" class="form-control"
                                                    maxlength="100" name="passwordCert" required
                                                    autocomplete="new-password">
                                                <span id="spanPassword" hidden style="color:red;">Escribe la
                                                    contraseña</span>
                                                <span id="spanNoCoincide1" hidden style="color:orange;">No coinciden las
                                                    contraseñas!</span>

                                                <small><small><span id="passstrength"></span></small></small>
                                            </div>
                                        </div>
                                        <!--Confirmar Contraseña-->
                                        <div class="row mb-3">
                                            <label for="password-confirmCert"
                                                class="col-md-4 col-form-label text-md-end">Confirmar Contraseña
                                                (*):</label>
                                            <div class="col-md-6" style="text-align:left;">
                                                <input id="password-confirmCert" type="password" class="form-control"
                                                    maxlength="100" required autocomplete="new-password">
                                                <span id="spanConfirmPassword" hidden style="color:red;">Escribe la
                                                    verficación de la contraseña</span>
                                                <span id="spanNoCoincide2" hidden style="color:orange;">No coinciden las
                                                    contraseñas!</span>
                                            </div>
                                        </div>
                                        <!--perfil-->
                                        <div class="row mb-3">
                                            <label class="col-md-4 col-form-label text-md-end"
                                                for="perfilCert">Seleccione
                                                el perfil del empleado (*):</label>
                                            <div class="col-md-6" style="text-align:left;">
                                                <select class="form-select" name="perfilCert" id="perfilCert" required>
                                                    <option value="Seleccione" id="seleccione">Seleccione</option>
                                                    <?php for ($i=0; $i < count($perfiles); $i++) { ?>
                                                    <option value="<?= $perfiles[$i]->idPerfil; ?>">
                                                        <?= $perfiles[$i]->nomPerfil; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span id="spanPerfil" hidden style="color:red;">Selecciona el
                                                    perfil</span>
                                            </div>
                                        </div>
                                        <!--Activo-->
                                        <div class="row mb-3">
                                            <label for="activoSelect"
                                                class="col-md-4 col-form-label text-md-end">Usuario
                                                Activo
                                                (*):</label>
                                            <div class="col-md-3" style="text-align:left;">
                                                <select class="form-select" name="activoSelect" id="activoSelect">
                                                    <option value='Seleccione' selected>Seleccione</option>
                                                    <option value='1'>Si</option>
                                                    <option value='0'>No</option>
                                                </select>
                                                <span id="spanActivo" hidden style="color:red;">Selecciona el estatus
                                                    Activo o No activo</span>
                                            </div>
                                        </div>
                                    </form>
                                    <!------------------------------------------------AQUI TERMINA EL FORMULARIO DE REGISTRO DE EMPLEADOS DE CERTIFICACION----------------------------------------------->


                                </div>

                            </div>
                            <!------------------------------------ FIN DE LA CARD DE REGISTRO DE EMPS DE CERTIFICACION------------------>
                        </div>
                    </div> 
                    <?php include_once('views/layouts/pie.php') ?>
                    <script type="text/javascript" src="<?=base_url?>assets/js/registro.js"></script>
                    <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        document.querySelectorAll('input').forEach(node => node.addEventListener('keypress',
                            e => {
                                if (e.keyCode == 13) {
                                    e.preventDefault();
                                    $('#registrarCert').click();
                                }
                            }))
                    });
                    </script>
                </div>
                <!--------------------FIN DEL MAIN CONTENT------------------------>
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

 