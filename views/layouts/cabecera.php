<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Control de Asistencia</title>
    <!--<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>-->   
    <!--Bootstrap CDN--> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    
    <!--CSS de  esta vista en especifico-->   
    <link rel="stylesheet" href="<?=base_url?>assets/css/cabecera.css">   

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"> 
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js"></script> 

    <!-- JavaScript Bundle with Popper -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini"> 
   <header style=" ">
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
                        <a href="https://www.dgire.unam.mx/webdgire/" style="text-decoration:none; " target=_BLANK>
                                        <p class=" hidden-sm hidden-xs" id="txtDgire" style="padding-top:10px;">Dirección General de Incorporación y <br> Revalidación de Estudios</p>
                                        <p class=" hidden-md hidden-lg" id="txtDgire">DGIRE</p>  
                        </a>
                </div>
                <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                        <a href="https://www.dgire.unam.mx/webdgire/" target="_BLANK">
                                        <img class="" src="<?=base_url?>assets/imgs/dgire_white.png" id="imgDgire" alt=""> 
                        </a>
                </div>
                </div>
                <div class="row bannerPagos" style="line-height: 1.5; display: flex; align-items: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 txtPagos" style="height: 100%;"> 
                                <p style="text-align: left; margin: 0;">CONTROL DE ASISTENCIA</p>
                        </div> 
                </div> 
        </div>
   </header>
     

