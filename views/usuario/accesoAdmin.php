<?php require 'views/layouts/cabecera.php';unset($_SESSION['admin']); unset($_SESSION['consultas']);unset($_SESSION['consultasSubd']); ?>
<link rel="stylesheet" href="../assets/css/acceso.css">
<h1></h1>
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
                                    <form id="formAdmin">
                                        <!----------LOGIN DEL USUARIO------------>
                                        <div class="row mb-3">
                                            <label for="loginUsuario"
                                                class=" col-xs-12 col-md-3 col-lg-3 col-xl-3 col-form-label text-md-center"><small><b
                                                        class="color">Usuario: </b></small></label>

                                            <div class=" col-xs-12 col-md-9 col-lg-9 col-xl-9">
                                                <input id="loginUsuario" type="text" class="form-control"
                                                    name="loginUsuario" value="" required autocomplete="loginUsuario" autofocus maxlength="15">
                                            </div>
                                        </div>
                                        <!----------CONTRASEÑA DEL USUARIO------------>
                                        <div class="row mb-3">
                                            <label for="passwd"
                                                class=" col-xs-12 col-md-3 col-lg-3 col-xl-3 col-form-label text-md-center"><small><b
                                                        class="color">Contraseña: </b></small></label>

                                            <div class=" col-xs-12 col-md-9 col-lg-9 col-xl-9">
                                                <input id="passwd" type="password" class="form-control" name="passwd"
                                                    value="" required autocomplete="passwd">
                                            </div>
                                        </div> 

                                        <div class="divButton" style="display:block; widtg:100%; text-align:center;">
                                            <button class="btn btn-primary" type="submit" style="width:40%;" id="btnEntrar"> Entrar <i
                                                    class='fa fa-unlock'></i></button>
                                        </div>

                                    </form>
                                </div>
                            </small>
                        </div>
                        <hr>
                    </div>
                </div>  
                <div style="text-align:center;">
                    <small><a href="<?=base_url?>usuario/index" class="btn"   
                            style=" display:inline-block;background-color:midnightblue; color:white;">
                            Asistencia <i class="fa-solid fa-clipboard-user"></i></a></small> 
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php require 'views/layouts/pie.php';?> 
<script type="text/javascript" src="<?=base_url?>assets/js/acceso.js"></script>  
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input').forEach( node => node.addEventListener('keypress', e => {
            if(e.keyCode == 13) {
              e.preventDefault(); 
              $('#btnEntrar').click();
            }
        }))
    }); 
</script>