<?php require 'views/layouts/cabecera.php';?>  
<link rel="stylesheet" href="../assets/css/acceso.css">

    <div class="container"> 
        <div class="row">       
            <div class="col-md-3"></div>
            <div class="col-md-6"> 
                <div class="container">
                    <div class="row" style="margin-top:15px;"> 
                        <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 divCarta">
                            <hr> 
                            <div class="card " style="width: 100%;">
                                    <div class="card-header pestaña">
                                        <b style="color:#FFF">Ingresar</b>
                                    </div>
                                     
                                <small>    
                                <div class="card-body ">  
                                    
                                    <!----------------------------Formulario de Ingreso------------------------------>
                                    <form id="formAcceso">   
                                        
                                        <!----------LOGIN DEL USUARIO------------>   
                                        <div class="row mb-3">
                                            <label for="loginUsuario" class=" col-xs-12 col-md-3 col-lg-3 col-xl-3 col-form-label text-md-center"><small><b class="color">Usuario: </b></small></label>
                                            <div class=" col-xs-12 col-md-9 col-lg-9 col-xl-9">
                                                <input id="loginUsuario" type="text" class="form-control" name="loginUsuario" autofocus maxlength="15"> 
                                            </div>    
                                        </div> 
                                    
                                        <div class="divButton" style="display:block; widtg:100%; text-align:center;">
                                            <button class="btn btn-primary swalDefaultSuccess" id="entrar" type="button" style="width:40%;"> 
                                                Entrar  <i class='fa fa-unlock'></i>
                                            </button> 
                                        </div>
                    
                                    </form>
                                </div></small>
                            
                                </div> 
                                <hr>
                            </div>
                            
                        </div> 
                    </div>
                
                </div>                      
            </div> 
            <h1 style="text-align:center;color: midnightblue;" id="" class="infUser" hidden></h1>  
            <h1 style="text-align:center;color: red;" id="noUsuario" hidden>El usuario no existe</h1> 
            <div style="text-align:center;">
             <small><a href="<?=base_url?>usuario/acceso" class="btn " style=" display:inline-block;background-color:midnightblue; color:white;">
             Consultas <i class="fas fa-users-cog"></i></a></small>                

            </div> 
            </h1>  
            
        </div> 
    </div>   
    
    <?php require 'views/layouts/pie.php';?>  
    
    <script type="text/javascript" src="<?=base_url?>assets/js/login.js"></script>  

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input').forEach( node => node.addEventListener('keypress', e => {
          if(e.keyCode == 13) {
            e.preventDefault(); 
            $('#entrar').click(); 
          }
        }))
      });
    </script>
