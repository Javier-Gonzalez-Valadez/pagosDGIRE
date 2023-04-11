<?php if(isset($_SESSION['consultasSubd'])):?>
<?php  require_once 'views/layouts/cabecera.php'; ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">


<?php  require_once 'views/layouts/lateralConsultasSubd.php';?>

<div class="col-md-2">

</div>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            Hola, <b><?=$_SESSION['consultasSubd']->nombre?></b>
            <b><?=$_SESSION['consultasSubd']->primerApellido?></b>
            <b><?=$_SESSION['consultasSubd']->segundoApellido?> - (Consultas de todos los departamentos de la
            <?=$_SESSION['subdConsultasSubd']->nomSubd?>).</b>
        </li>
    </ul>

</nav>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">

                        <div class="col-md-2"></div>
                        <div class="col-md-8">

                            <div class="card mt-3" id="cardInfUser">
                                <h5 class="card-header"
                                    style="background-color: midnightblue; !important; color: white; text-align:center;">
                                    <b>Bienvenido/a <?=$_SESSION['consultasSubd']->nombre?></b>
                                </h5>
                                <div class="card-body text-center">
                                    <p>Sistema administrativo de control de asistencias.</p>

                                    <p>Podrás consultar las asistencias e historial de asistencias del personal
                                        de todos los departamentos de tu Subdirección, visualizando fecha y hora de
                                        entrada.
                                    </p>

                                    <p>También podrás consultar, los datos del personal que se encuentra en tu
                                        Subdirección.
                                    </p>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-2"></div>

                    </div>
                    <?php require_once 'views/layouts/pie.php';?>
                    <div class="footer">
                        <p class="textoFooter" style="background-color: Gainsboro;">
                            Hecho en México © Todos los derechos reservados 2022. Universidad Nacional Autónoma de
                            México (UNAM), Dirección General de Incorporación y Revalidación de Estudios (DGIRE). Esta
                            página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite
                            la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por
                            escrito de la institución. Sitio web administrado por la DGIRE.
                        </p>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->

<!-- ./wrapper -->
<?php else:?>
<?=header("Location:".base_url."usuario/acceso");?>
<?php endif;?>