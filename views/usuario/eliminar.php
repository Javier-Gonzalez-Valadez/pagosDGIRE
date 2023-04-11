<?php if(isset($_SESSION['admin'])):?>

<?php include_once "views/layouts/cabecera.php" ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">
<?php include_once('views/layouts/lateral.php') ?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div style="width:90%;"> 
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                Hola, <b><?=$_SESSION['admin']->nombre?></b>
                <b><?=$_SESSION['admin']->segundoApellido?> - (Privilegios de Administrador de <?=$_SESSION['admin']->nomArea?>) </b>
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
                                    <b style="color:#FFF">Eliminar Usuario</b>
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
                                                    name="loginUsuario" autofocus maxlength="15">
                                            </div>
                                        </div>

                                        <div class="divButton col-md-12 col-sm-12 col-xs-12"
                                            style="display:block; text-align:left; margin-left:5%;">
                                            <button class="btn btn-info swalDefaultSuccess" id="buscarUsuario"
                                                type="button" style="display:inline-block;">
                                                Buscar <i class='fas fa-search'></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-------------------------FIN Formulario de BUSQUEDA DE USUARIO A ACATUALIZAR---------------------------->
                            </div>
                            <!-- ||||||||||||||||||||||||||||||||| AQUI TERMINA LA CARD BUSCAR USUARIO ||||||||||||||||||||||||||||||| -->
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <!-- Button trigger modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="modalEliminar" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"
                                                style="background-color:midnightblue !important;color: white;">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Estás seguro que deseas eliminar al usuario?</p>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn" id="btnEliminar"
                                                    style="background-color:#0b5ed7 !important;color:white;"
                                                    data-bs-dismiss="modal"><i class="fas fa-check"></i>
                                                    Confirmar</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                                        class="fas fa-times"></i> Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade " id="imposibleEliminarModal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="width:45%">
                                        <div class="modal-content">
                                            <div class="modal-header"
                                                style="background-color:rgb(210,0,0);height:55px !important;">
                                                <div style="width:100% !important;text-align:center;">
                                                    <h5 class="modal-title" id="staticBackdropLabel"
                                                        style="margin-top:-7px !important;color:white;"><b>Imposible
                                                            eliminar</b></h5>
                                                </div>
                                            </div>
                                            <div class="modal-body" style="text-align:center;">
                                                <p style="padding-top:0%;">
                                                    El usuario que deseas eliminar cuenta con un historial de
                                                    asistencias previo, por lo que
                                                    resulta imposible eliminarlo.

                                                </p>
                                                <p style="margin-top:-2%;">Te sugerimos cambiar el estatus 'Activo' del
                                                    usuario asignandole el valor <i><small>'NO'</small></i>, en la
                                                    sección de Actualizar.</p>
                                                <p style="margin-top:-2%;">
                                                    De esta manera ya no podrá realizar ninguna actividad en el sistema.
                                                </p>
                                            </div>
                                            <div class="modal-footer" style="margin-top:-4.5%;">
                                                <div style="text-align:center; width:100% !important">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Aceptar</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card" id="cardInfUser" hidden>
                                    <div class="card-header"
                                        style="background-color: #a5a2a2 !important; color: white; display:inline-block;">
                                        <b style="display:inline-block;width:70%;;">Ficha informativa
                                            del usuario/a</b>
                                        <div class="text-right"
                                            style="display:inline-block;text-align:rigth; width:25%;">
                                            <button class="btn btn-danger" id="borrarFI">Borrar usuario<i
                                                    class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p hidden><b>ID:</b></p>
                                        <input type="text" id="idUsuario" hidden>
                                        <p><b>Nombre:</b></p>
                                        <p class="" id="nombres"></p>
                                        <p><b>Correo:</b></p>
                                        <p class="" id="correoYlogin"></p>
                                        <p><b>Usuario:</b></p>
                                        <p class="" id="login"></p>
                                        <p><b>Fecha de Registro:</b></p>
                                        <p class="" id="fechaRegistro"></p>
                                        <p><b>Activo:</b></p>
                                        <p class="" id="activo"></p>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <?php include_once('views/layouts/pie.php') ?>
                    <script src="<?=base_url?>assets/js/eliminar.js"></script>
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