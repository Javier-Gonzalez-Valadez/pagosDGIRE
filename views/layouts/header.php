<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de eventos</title>

     <!--Bootstrap CDN-->  
<!--      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
 -->    
    <!--DataTables Vanilla-->
    <!-- <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script> -->
    
    <!--DataTables CSS CDN-->
<!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> 
 -->    

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url ?>views/AdminLTE/bootstrap/bootstrap.css"> 

    <!--CSS de  esta vista en especifico--> 
    <link rel="stylesheet" href="<?=base_url?>assets/css/cabecera.css">   

      <!-- Font Awesome Icons --> 
    <link rel="stylesheet" href="<?=base_url?>views/AdminLTE/plugins/fontawesome/css/all.min.css">
    
    <!--ICONOS MIN CSS--> 
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  

</head>
 
<body class="hold-transition sidebar-mini">
    <!-- CABECERA -->
    <header>
         <!----------------------CABECERA DE CADA UNA DE LAS VISTAS---------------->  
        <div class="container-fluid"> 
                <div class="row banner"> 
                <div class=" col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">  
                        <a href="https://www.unam.mx/" target=_BLANK> 
                                <img class="" style="margin-top:10px;margin-bottom:10px;"src="<?=base_url?>assets/imgs/unam_white.png" id="imgUnam"alt=""> 
                        </a>
                </div> 
                <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4" style="color:#FFF;"> 
                                <a href="https://www.unam.mx/" style="text-decoration:none;" target=_BLANK>
                                        <h4  class=" hidden-sm hidden-xs" id="txtUnam" style="color:white;">Universidad Nacional <br> Autónoma de México</h4>
                                        <h4  class=" hidden-md hidden-lg" id="txtUnam" style="color:white;">UNAM</h4>
                                </a> 
                </div> 
                <!--<div class="col-lg-6 col-md-6 col-sm-0 col-xs-0" >
                        <p style="color: white; font-size:14px;margin-top:5px">REGISTRO DE ASISTENCIA PERSONAL ADMINISTRATIVO DE CONFIANZA</p>
                        <p style="displa:inline; color:white;"></p>
                        <p style="color: white;font-size:14px;margin-top:-15px;">SUBDIRECCIÓN DE CERTIFICACIÓN</p>
                </div>-->
                <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4" style="color:#FFF;">
                        <a href="https://www.dgire.unam.mx/webdgire/" style="text-decoration:none;" target=_BLANK>
                                        <p class=" hidden-sm hidden-xs" id="txtDgire">Dirección General de Incorporación y <br> Revalidación de Estudios</p>
                                        <p class=" hidden-md hidden-lg" id="txtDgire">DGIRE</p>  
                        </a>
                </div>
                <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                        <a href="https://www.dgire.unam.mx/webdgire/" target="_BLANK">
                                        <img class="" src="<?=base_url?>assets/imgs/dgire_white.png" id="imgDgire" alt=""> 
                        </a>
                </div>
                </div> 
                <div class="row bannerPagos">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtPagos"><p style="text-align:left;f">CONTROL DE ASISTENCIA</p></div>
                </div> 
        </div>
    </header>
    <!-- FIN CABECERA -->