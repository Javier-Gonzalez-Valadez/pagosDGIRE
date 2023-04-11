<?php if(isset($_SESSION['consultas'])):?>

<link rel="stylesheet" href="<?=base_url?>assets/css/consultar.css">
<?php include_once 'views/layouts/cabecera.php'; ?>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url?>views/AdminLTE/css/adminlte.min.css">

<!--DataTables CSS CDN-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<?php  require_once 'views/layouts/lateralConsultas.php'; ?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div style="width:90%;">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link active" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                Hola, <b><?=$_SESSION['consultas']->nombre?></b>
                <b>- (Privilegios de Consultas del <?=$_SESSION['consultas']->nomArea?>). </b>
            </li>

            <input type="text" value="<?=$_SESSION['consultas']->idArea?>" hidden id="idArea">
        </ul>
    </div>
    <div style="width:8%;text-align:right;">
        <a href="<?=base_url?>usuario/bienvenido" style="margin-top:-99%;"><i class="fas fa-home"
                style="color:#0b5ed7;outline: 1.90px solid #0b5ed7; border-radius:35%;padding:3%;"></i></a>
    </div>
</nav>
<!-- Fin del NavBar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <div class="row  mt-1">
            <div class="col-md-12 col-lg-12 col-sm-12 text-center ">
                <!-- --------------------------------------Botones-------------------------------------------------------------------- -->
                <a class="btn btn-app boton" id="consultHoy" style="background-color:gray;">
                    <i class="fas fa-book-reader"></i> <b>Hoy</b>
                </a>
                <a class="btn btn-app boton" id="consultFechas">
                    <i class="fas fa-sort-alpha-down"></i></i> <b>Todas y por Fechas</b>
                </a>
                <!-- --------------------------------------FIN Botones-------------------------------------------------------------------- -->
            </div>
            <h3 style="text-align:center;">ASISTENCIAS</h3>
            <div class="col-md 6" style="text-align:center;" id="divFiltrarFecha" hidden>
                <form id="formFechas">
                    <div class="" id="divFechas">
                        <div class="" id="divFecha" style="display:inline-block;">
                            <label for="fechaInicio" style="font-weight: normal !important;">De:</label>
                            <input type="date" name="fechaInicio" id="fechaInicio">
                        </div>
                        <div class="" id="" style="display:inline-block;">
                            <label for="fechaFin" style="font-weight: normal; !important">Hasta:</label>
                            <input type="date" name="fechaFin" id="fechaFin">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-info" id="consulBtn" style="">Consultar <i
                            class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="row mb-3 " id="divSelect">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center" style="">
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- AQUI EMPIEZA EL MAIN CONTENT -->
                <div class="col-lg-12">

                    <!--------------------- TABLE PARA ASISTENCIAS DE HOY---------------------->
                    <table id="tableHoy" style="width: 100% !important;">
                        <thead>
                            <tr style="text-align:center;background-color:midnightblue; color:white;">
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    Nombre completo
                                </th>
                                <th>
                                    Departamento
                                </th>
                                <th>
                                    Hora de Entrada
                                </th>
                            </tr>
                        </thead>

                    </table>
                    <!--------------- FIN DE TABLE PARA ASISTENCIAS DE HOY--------------------- -->


                    <!----------- TABLE PARA CONSULTAR ASISTENCIAS POR FECHA --------  -->
                    <!-- Tabla de asistencias de todos cert -->

                    <table id="tableFiltro" style="width: 100% !important;" hidden>
                        <thead>
                            <tr style="text-align:center;background-color:midnightblue; color:white;">
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    Nombre completo
                                </th>
                                <th>
                                    Departamento
                                </th>
                                <th>
                                    Hora de Entrada
                                </th>
                            </tr>
                        </thead>

                    </table>
                    <!-----------FIN DE TABLE PARA CONSULTAR ASISTENCIAS POR DEPARTAMENTO --------  -->

                </div>
                <!-- AQUI TERMINA EL MAIN CONTENT  -->
            </div>
            <!-- /.row -->
            <?php include_once('views/layouts/pie.php') ?>
            <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
            <!-- Para hacer funcionar la extensión de los botones en datatbles -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.6/js/dataTables.buttons.min.js"
                integrity="sha512-hPELv/uqaT+ZbHiKMWXHNV15N6SPTB80TXb9/idOejUqAJZmeLjITlt3Fts8RtCshL/v2kfw7mIKpZnFilDEnA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.3.6/js/buttons.html5.min.js"
                integrity="sha512-7zlyt51h8vHkNaSfm7U8nMTrJpk4OKPsnUasrwAhsmHQy/3ButSwHEoXZ76XoZo+yz2IvANt70+suP6FvplRYQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <!-- Para etilizar las tablas exportadas a excel -->
            <script
                src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js">
            </script>
            <script
                src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js">
            </script>
            <script src="<?=base_url?>assets/js/consultarAsistenciasConsul.js"></script>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php else:?>
<?= header("Location:".base_url."usuario/acceso");?>
<?php endif;?>