<?php if(isset($_SESSION['consultas'])):?>
<?php  require_once 'views/layouts/cabecera.php'; ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">


<?php  require_once 'views/layouts/lateralConsultas.php';?>

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
            Hola, <b><?=$_SESSION['consultas']->nombre?></b>
            <b>- (Privilegios de Consultas del <?=$_SESSION['consultas']->nomArea?>). </b>
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
                                    <b>Bienvenido/a <?=$_SESSION['consultas']->nombre?></b>
                                </h5>
                                <div class="card-body text-center">
                                    <p>Sistema administrativo de control de asistencias.</p>


                                    <p>Podrás consultar las asistencias e historial de asistencias del personal
                                        de tu departamento, visualizando fecha y hora de entrada
                                    </p>

                                    <p>También podrás consultar, al personal que se encuentra en tu
                                        departamento con sus datos <br> a detalle.</p>


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



<?php else:?>
<?=header("Location:".base_url."usuario/acceso");?>
<?php endif;?>

<!-- ./wrapper -->