<?php if(isset($_SESSION['admin'])):?>
<link rel="stylesheet" href="<?=base_url?>assets/css/consultar.css">
<?php include_once 'views/layouts/cabecera.php'; ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">

<!--DataTables CSS CDN-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<?php  require_once 'views/layouts/lateral.php'; ?>
 
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
                <b><?=$_SESSION['admin']->primerApellido?></b>
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
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 text-center mt-1 mb-1">
                <!-- --------------------------------------Botones-------------------------------------------------------------------- -->
                <a class="btn btn-app boton" id="consultTodos">
                    <i class="fas fa-universal-access"></i></i> <b>Todos</b>
                </a>
                <a class="btn btn-app boton" id="consultDepto">
                    <i class="fas fa-sort-alpha-up"></i><b>Por Departamento</b>
                </a>
                <!-- --------------------------------------FIN Botones-------------------------------------------------------------------- -->
            </div>
        </div>
    </div>
    <h3 style="text-align:center;margin-top:-1%;">USUARIOS</h3>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- AQUI EMPIEZA EL MAIN CONTENT -->
                <div class="col-lg-12">
                    <div class="row mb-1 divSelect" hidden>
                        <!-- ---------------------------------------------------CONSULTAR POR DEPARTAMENTO ---------------------------------------------- -->
                        <form id="formDepto" style="width:100%;margin auto; text-align:center;">
                            <div class="divSubd" style="display:inline-block;width:30%;">
                                <select class="form-select " name="subd" style="" id="selectSubd">
                                    <option value="Seleccione" id="seleccione">Seleccione Subdirección</option>
                                    <?php for ($i=0; $i < count($subds); $i++) { ?>
                                    <option value="<?= $subds[$i]->idSubdireccion; ?>" id="seleccione">
                                        <?= $subds[$i]->nomSubd; ?>
                                    </option>
                                    <?php } ?>
                                </select> 
                            </div>
                            <div class="divDepto" style="display:inline-block;width:50%;">
                                <select class="form-select " name="depto" style="" id="selectDepto">
                                    <option value="Seleccione" id="seleccione">Seleccione la Subdirección</option>

                                </select>
                            </div>
                            <br>
                            <button class="btn btn-info mt-1" id="consulBtn" style="">Buscar <i
                                    class="fas fa-search"></i></button>
                        </form>
                        <!-- --------------------------------------------------------FIN DE CONSULTAR POR DEPARTAMENTO ----------------------------------- -->

                    </div>
                    <!--------------------- TABLE PARA CONSULTAR TODOS LOS USUARIOS---------------------  -->
                    <table id="tableConsultarTodos" style="">
                        <thead>
                            <tr style="text-align:center;background-color:midnightblue; color:white;">
                                <th>
                                    Nombre Completo
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
                    <!--------------- FIN DE TABLE PARA CONSULTAR TODOS LOS USUARIOS--------------------- -->


                    <!----------- TABLE PARA CONSULTAR USUARIOS POR DEPARTAMENTO --------  -->
                    <div class="" style="text-align:center;">
                        <table id="tableConsultarPorDepto" style="width:100% !important;" hidden>
                            <thead style="text-align:center;">
                                <tr style="background-color:midnightblue; color:white;"> 
                                    <th>
                                        Nombre Completo
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
                    </div>
                    <!-----------FIN DE TABLE PARA CONSULTAR USUARIOS POR DEPARTAMENTO --------  -->

                </div>
                <!-- AQUI TERMINA EL MAIN CONTENT  -->
            </div>
            <!-- /.row -->
            <?php include_once('views/layouts/pie.php') ?>
            <script src="<?=base_url?>assets/js/consultarUsuarios.js"></script>
            <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php else:?>
<?= header("Location:".base_url."usuario/acceso");?>
<?php endif;?>