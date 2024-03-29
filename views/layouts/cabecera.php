<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIstema de Pagos DGIRE</title>

    <!--Bootstrap CDN-->   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    <!--DataTables Vanilla-->
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    
    <!--DataTables CSS CDN-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> 
    
    <link rel="stylesheet" href="<?=base_url?>assets/css/acceso.css">  
    <!--ICONOS MIN CSS--> 
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  

 
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
    <script type="text/javascript" src="js/strength.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>--> 
    <!-- JavaScript Bundle with Popper -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </head>
<body> 
    <!----------------------CABECERA DE CADA UNA DE LAS VISTAS----------------> 
    <div class="row banner"> 
        <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
            <a href="https://www.unam.mx/" target=_BLANK> 
                    <img class=""src="<?=base_url?>assets/imgs/unam_white.png" id="imgUnam"alt=""> 
            </a>
        </div> 
        <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4">
                    <a href="https://www.unam.mx/" style="text-decoration:none;" target=_BLANK>
                            <h4  class=" hidden-sm hidden-xs" id="txtUnam" style="color:white;">Universidad Nacional Autónoma de México</h4>
                            <h4  class=" hidden-md hidden-lg" id="txtUnam" style="color:white;">UNAM</h4>
                    </a>
        </div>
        <div class="col-4 col-lg-5 col-md-5 col-sm-4 col-xs-4">
                <a href="https://www.dgire.unam.mx/webdgire/" style="text-decoration:none;" target=_BLANK>
                            <h4 class=" hidden-sm hidden-xs" id="txtDgire">Dirección General de Incorporación y Revalidación de Estudios</h4>
                            <h4 class=" hidden-md hidden-lg" id="txtDgire">DGIRE</h4> 
                </a>
        </div>
        <div class="col-2 col-lg-1 col-md-1 col-sm-2 col-xs-2">
                <a href="https://www.dgire.unam.mx/webdgire/" target="_BLANK">
                            <img class="" src="<?=base_url?>assets/imgs/dgire_white.png" id="imgDgire" alt=""> 
                </a>
        </div>
        </div>
        <div class="row bannerPagos">
            <div class="col-12 col-lg col-md-12 col-sm-12 col-xs-12 txtPagos"><p>Unidad Administrativa Sistema de Pagos</p></div>
    </div> 
    
