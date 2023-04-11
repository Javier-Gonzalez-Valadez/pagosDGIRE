<?php include_once "views/layouts/cabecera.php" ?>
<!-- Theme style -->  
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">  
<?php include_once('views/layouts/lateral.php') ?> 

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item"> 
                    Hola, <b><?=$_SESSION['admin']->nombre?></b> 
                    <b><?=$_SESSION['admin']->primerApellido?></b> 
                    <b><?=$_SESSION['admin']->segundoApellido?> - Administrador. </b> 
            </li> 
            <li style="text-align: rigth;">
            <a href="<?=base_url?>usuario/cerrarSesion" class="btn btn-sm btn-warning" style="decoration:none">Cerrar Sesion</a>
            </li> 
        </ul> 
    </nav> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   <!-- AQUI EMPIEZA EL CONTENT WRAPPER -->
                   <div class="col-lg-12"> 

                    </div>
                    <!-- AQUI TERMINA EL CONTENT WRAPPER  -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php include_once('views/layouts/pie.php') ?>