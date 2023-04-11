<?php if(isset($_SESSION['consultasSubd'])):?>
<link rel="stylesheet" href="<?=base_url?>assets/css/consultar.css">
<?php include_once 'views/layouts/cabecera.php'; ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">

<!--DataTables CSS CDN-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<?php  require_once 'views/layouts/lateralConsultasSubd.php'; ?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div style="width:90%;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                Hola, <b><?=$_SESSION['consultasSubd']->nombre?></b>
                <b><?=$_SESSION['consultasSubd']->primerApellido?></b>
                <b><?=$_SESSION['consultasSubd']->segundoApellido?> - (Consultas de todos los departamentos de la
                <?=$_SESSION['subdConsultasSubd']->nomSubd?>). </b>
            </li>
            <input type="text" value="<?=$_SESSION['consultasSubd']->idArea?>" hidden id="idArea">
            <input type="text" value="<?=$_SESSION['subdConsultasSubd']->idSubdireccion?>" hidden id="idSubd">
            <input type="text" value="<?=$_SESSION['subdConsultasSubd']->nomSubd?>" hidden id="idSubd">
        </ul>
    </div>
    <div style="width:8%;text-align:right;">
        <a href="<?=base_url?>usuario/entrada" style="margin-top:-99%;"><i class="fas fa-home"
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
                <!-- AQUI EMPIEZA EL MAIN CONTENT -->
                <div class="col-lg-12">
                    <br>
                    <br>
                    <h3 style="text-align:center;">USUARIOS</h3>
                    <br>
                    <!--------------------- TABLE PARA CONSULTAR LOS USUARIOS DE ESTE DEPARTAMENTO---------------------  -->
                    <table id="tableConsultar" style="">
                        <thead>
                            <tr style="text-align:center;background-color:midnightblue; color:white;">
                                <th>
                                    Nombre completo
                                </th>
                                <th>
                                    Usuario
                                </th>
                                <th>
                                    Correo
                                </th>
                                <th>
                                    Perfil
                                </th>
                                <th>
                                    Departamento
                                </th>
                            </tr>
                        </thead>
                    </table>
                    <!--------------- FIN DE TABLE PARA CONSULTAR LOS USUARIOS DE ESTE DEPARTAMENTO--------------------- -->
                </div>
                <!-- AQUI TERMINA EL MAIN CONTENT  -->
            </div>
            <!-- /.row -->
            <?php include_once('views/layouts/pie.php') ?>
            <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
            <script src="<?=base_url?>assets/js/consultarUsuariosConsultSubd.js"></script>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php else:?>
<?= header("Location:".base_url."usuario/acceso");?>
<?php endif;?>