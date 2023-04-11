<div class="wrapper">
   <link rel="stylesheet" href="<?=base_url?>assets/css/lateral.css">
    <!-----------------------INICIO DE LA BARRA LATERAL-------------------------> 
    <aside class="main-sidebar sidebar-dark-primary elevation-4 layout-fixed">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
                <div class="image" id="logoDGIRE">
                    <img src="<?=base_url?>assets/imgs/dgire_white.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a class="d-block" id="tituloCert">Certificación</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2"> 
                <!--LISTA DE LA BARRA LATERAL-->
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-header">ASISTENCIAS</li>
                    <li class="nav-item">
                        <a href="<?=base_url?>usuario/consultarAsistencias" class="nav-link"> 
                            <i class="nav-icon fas fa-book-reader"></i>   
                            <p> 
                                Consultar 
                                
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">USUARIOS</li>
                    <li class="nav-item">
                        <a href="<?=base_url?>usuario/consultarUsuarios" class="nav-link">
                            <i class="nav-icon fas fa-eye"></i>  
                            <p>  
                                Consultar 
                                
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url?>usuario/registro" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>  
                            <p>
                                Agregar 
                                
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url?>usuario/actualizar" class="nav-link"> 
                            <i class="nav-icon fas fa-edit"></i>  
                            <p>
                                Actualizar 
                                
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url?>usuario/eliminar" class="nav-link">
                            <i class="fas fa-trash-alt"></i>  
                            <p>
                                Eliminar 
                                
                            </p>
                        </a>
                    </li>
                    <li class="nav-header" style="color:#343a40">---------</li> 
                    <li class="nav-item" style="margin-bottom:20px;">
                        <a href="<?=base_url?>usuario/cerrarSesion" class="nav-link" style="outline: 1px solid #a5a2a2; display:inline;">
                            <i class="nav-icon fas fa-sign-out"></i>   
                            <p>
                                Cerrar sesión 
                                
                            </p>
                        </a>
                    </li>
                </ul>
            </nav><!-- /.sidebar-menu -->
        </div><!-- /.sidebar -->      
    </aside>
    <script src="<?=base_url?>assets/js/lateral.php"></script>

  <!-----------------------FIN DE LA BARRA LATERAL-------------------------> 