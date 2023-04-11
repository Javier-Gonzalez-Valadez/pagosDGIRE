$(document).ready(function(){ 
     
    $('#tableHoy').DataTable({
        dom: "Blfrtip",
        "aaSorting":[],
        buttons:{
            dom:{ 
                button:{
                    className: 'btn'
                }
            },
            buttons:[
                {
                    extend:"excel",
                    text:'Exportar Excel',
                    className: 'btn btn-outline-success mb-3',
                    excelStyles:{
                        "template": ['blue_gray_medium'] 
                    }
                }, 
            ]
        },        
        ajax:'http://132.247.147.17/~javiergv/controlAsistencia/usuario/asistenciasHoy',
        columns: [
            { data: 'Fecha' },
            { data: 'nombre' }, 
            { data: 'nomArea' },
            { data: 'Llegada' }
        ],
        "autoWidth": false,
        "responsive": true, 
        language: {
            "decimal": "",
            "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias totales",
            "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
            "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Asistencias",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },        
    });
    $('#selectSubd').on('change', function(){ 
        if($("#selectSubd option:selected").val()!="Seleccione"){
            idSubd=$("#selectSubd option:selected").val(); 
            $.ajax({
                url: "http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultarDeptosPorSubd", 
                type: "POST",
                data: { idSubd: idSubd },
                dataType: "json",
                success: function(opciones) {
                    console.log(opciones);
                  // rellena el segundo select con las opciones obtenidas
                  $("#selectDepto").html("");
                  $("#selectDepto").append("<option value='" + 'Seleccione' + "'>" + 'Seleccione el Departamento' + "</option>"); 
                  $("#selectDepto").append("<option value='" + 'todo' + "'>" + 'Todos los Departamentos de la Subdirección' + "</option>");
                  $.each(opciones, function(key, value) { 
                    $("#selectDepto").append("<option value='" + value.idArea + "'>" + value.nomArea + "</option>"); 
                  });
                }
              });
        }else{
            $("#selectDepto").html("");
            $("#selectDepto").append("<option value='" + 'Seleccione' + "'>" + 'Seleccione la Subdirección' + "</option>");
        }          
    });
    $('#tableHoy').attr('hidden', false);
    $('#tableFiltro').DataTable({
        dom: "Blfrtip",
        "aaSorting":[],
        buttons:{
            dom:{ 
                button:{
                    className: 'btn'
                }
            },
            buttons:[
                {
                    extend:"excel",
                    text:'Exportar Excel',
                    className: 'btn btn-outline-success mb-3',
                    excelStyles:{
                        "template": ['blue_gray_medium'] 
                    }
                },
            ]
        },         
        ajax:'http://132.247.147.17/~javiergv/controlAsistencia/usuario/asistenciasCert',
        columns: [
            { data: 'Fecha' },
            { data: 'nombre' }, 
            { data: 'nomArea' },  
            { data: 'Llegada' }
        ],
        "autoWidth": false,
        "responsive": true,
        language: {
            "decimal": "",
            "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias totales",
            "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
            "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Asistencias",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "lengthChange": false,
        "lengthChange": true,
    }); 
    $('#tableFiltro').attr('hidden', false);   
     
    $('#tableFiltro_wrapper').attr('hidden', true);    
    
    
    $('#consultHoy').on('click', function(){
        $('#divFiltrar').attr('hidden', true);
        $('#consultHoy').css('background', 'gray'); 
        $('#consultDepto').css('background', 'white');
        $('#consultCert').css('background', 'white'); 
        $('#tableHoy').attr('hidden', false); 
        $('#tableHoy_wrapper').attr('hidden', false); 
        $('#tableFiltro_wrapper').attr('hidden', true);  
        //location.reload();
    }); 
        
    $('#consultDepto').on('click', function(e){
        $('#divFiltrar').attr('hidden', false);
        $('#tableHoy_wrapper').attr('hidden', true); 
        $('#tableFiltro_wrapper').attr('hidden', false);  
        $('#consultHoy').css('background', 'white');  
        $('#consultDepto').css('background', 'gray');    
        $('#fechaInicio').val('');
        $('#fechaFin').val('');
        if(! $.fn.DataTable.isDataTable( '#tableFiltro' )){
            crearTableFiltro(); 
        }else{
            $('#tableFiltro').DataTable().destroy();
            $('#tableFiltro').find('tbody').detach(); 
            crearTableFiltro(); 
            $('#tableFiltro_wrapper').attr('hidden', false);  
            //$('#tableFiltro').attr('hidden', true);  
        }
    });

    $('#consulBtn').on('click', function(e){ 
        e.preventDefault();
        
        var fechaInicio = $('#fechaInicio').val();
        fechaInicio = fechaInicio.replaceAll('-', '/'); 
        var fechaFin = $('#fechaFin').val(); 
        fechaFin = fechaFin.replaceAll('-', '/');  
        var depto = $('#selectDepto').val();
        var subd = $('#selectSubd').val();

         if((fechaInicio=="" && fechaFin=="" ) && subd!="Seleccione" && depto=="Seleccione"){
            if(depto=="Seleccione"){ 
                $('#selectDepto').attr('style', 'outline:1.75px solid red');
                $('#spanDepto').attr("hidden", false); 
                $('#selectDepto').change(function() { 
                    $('#selectDepto').removeAttr('style');
                    $('#spanDepto').attr("hidden", true);
                }); 
            }
            
        } 

        if((fechaInicio!="" && fechaFin!="")&&(subd=="Seleccione"||depto=="Seleccione")){
            if(subd=="Seleccione"){ 
                $('#selectSubd').attr('style', 'outline:1.75px solid red');
                $('#spanSubd').attr("hidden", false);
                $('#selectSubd').change(function() {
                    $('#selectSubd').removeAttr('style');
                    $('#spanSubd').attr("hidden", true);
                }); 
                
            } 
            if(depto=="Seleccione"){ 
                $('#selectDepto').attr('style', 'outline:1.75px solid red');
                $('#spanDepto').attr("hidden", false); 
                $('#selectDepto').change(function() { 
                    $('#selectDepto').removeAttr('style');
                    $('#spanDepto').attr("hidden", true);
                }); 
            }
        }
        
        if(fechaInicio != '' && fechaFin !='' && subd!="Seleccione" && depto!='Seleccione' && depto=='todo'){//---------CON FECHA Y SUBD Y TODOS DEPTOS DE LA SUBD---------------------------------------
            $('#tableFiltro').DataTable().destroy();
            $('#tableFiltro').find('tbody').detach();  
            $('#tableFiltro').DataTable({
                dom: "Blfrtip",
                "aaSorting":[],
                buttons:{
                    dom:{ 
                        button:{
                            className: 'btn'
                        }
                    },
                    buttons:[
                        {
                            extend:"excel",
                            text:'Exportar Excel',
                            className: 'btn btn-outline-success mb-3',
                            excelStyles:{
                                "template": ['blue_gray_medium'] 
                            }
                        },
                    ]
                },             
                'ajax':{
                    'method': "POST",
                    'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultaAsistencias", 
                    'data': {
                        'fechaInicio' : fechaInicio,
                        'fechaFin' : fechaFin,
                        'depto' : depto, 
                        'subd' : subd
                    },
                },
                'columns': [
                    { 'data': 'Fecha' }, 
                    { 'data': 'nombre' }, 
                    { 'data': 'nomArea' },  
                    { 'data': 'Llegada' }
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias totales",
                    "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
                    "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Asistencias",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
            $('#tableFiltro').attr('hidden', false);    
            $('#tableFiltro_wrapper').attr('hidden', false);  
        }else if(fechaInicio != '' && fechaFin !='' && subd!="Seleccione" && (depto!='Seleccione' && depto!='todo')){//---CON FECHA Y SUBD Y DEPARTAMENTO DE LA SUBD---------------------------------------
            $('#tableFiltro').DataTable().destroy();
            $('#tableFiltro').find('tbody').detach();  
            $('#tableFiltro').DataTable({
                dom: "Blfrtip",
                "aaSorting":[],
                buttons:{
                    dom:{  
                        button:{
                            className: 'btn'
                        }
                    },
                    buttons:[
                        {
                            extend:"excel",
                            text:'Exportar Excel',
                            className: 'btn btn-outline-success mb-3',
                            excelStyles:{
                                "template": ['blue_gray_medium'] 
                            }
                        },  
                    ]
                },             
                'ajax':{
                    'method': "POST",
                    'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultaAsistencias", 
                    'data': {
                        'fechaInicio' : fechaInicio,
                        'fechaFin' : fechaFin,
                        'subd' : subd,
                        'depto' : depto
                    },
                },
                'columns': [
                    { 'data': 'Fecha' }, 
                    { 'data': 'nombre' }, 
                    { 'data': 'nomArea' },  
                    { 'data': 'Llegada' }
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias totales",
                    "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
                    "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Asistencias",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
            $('#tableFiltro').attr('hidden', false);    
            $('#tableFiltro_wrapper').attr('hidden', false);  
        }else if(fechaInicio == '' && fechaFin =='' && subd!="Seleccione" && (depto!='Seleccione' && depto=='todo')){//------------------------SOLO CON FECHAS--------------------------------------
            $('#tableFiltro').DataTable().destroy(); 
            $('#tableFiltro').find('tbody').detach();  
            $('#tableFiltro').DataTable({
                dom: "Blfrtip",
                "aaSorting":[],
                buttons:{
                    dom:{ 
                        button:{
                            className: 'btn'
                        }
                    },
                    buttons:[
                        {
                            extend:"excel",
                            text:'Exportar Excel',
                            className: 'btn btn-outline-success mb-3',
                            excelStyles:{
                                "template": ['blue_gray_medium'] 
                            }
                        },
                    ]
                },       
                'ajax':{
                    'method': "POST",
                    'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultaAsistencias", 
                    'data': {
                        'fechaInicio' : fechaInicio,
                        'fechaFin' : fechaFin,
                        'subd' : subd,
                        'depto' : depto
                    },
                },
                'columns': [
                    { 'data': 'Fecha' },
                    { 'data': 'nombre' }, 
                    { 'data': 'nomArea' },  
                    { 'data': 'Llegada' }
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias totales",
                    "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
                    "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Asistencias",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
            $('#tableFiltro').attr('hidden', false);    
            $('#tableFiltro_wrapper').attr('hidden', false);
        } else if(fechaInicio == '' && fechaFin =='' && subd!="Seleccione" && (depto!='Seleccione' && depto!='todo')){//------------------------SOLO CON DEPARTAMENTO--------------------------------------
            $('#tableFiltro').DataTable().destroy();
            $('#tableFiltro').find('tbody').detach();  
            $('#tableFiltro').DataTable({
                dom: "Blfrtip",
                "aaSorting":[],
                buttons:{
                    dom:{ 
                        button:{
                            className: 'btn'
                        }
                    },
                    buttons:[
                        {
                            extend:"excel",
                            text:'Exportar Excel',
                            className: 'btn btn-outline-success mb-3',
                            excelStyles:{
                                "template": ['blue_gray_medium'] 
                            }
                        },
                    ]
                },                   
                'ajax':{
                    'method': "POST",
                    'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultaAsistencias", 
                    'data': {
                        'fechaInicio' : fechaInicio,
                        'fechaFin' : fechaFin,
                        'subd' : subd,
                        'depto' : depto
                    },
                },
                'columns': [
                    { 'data': 'Fecha' },
                    { 'data': 'nombre' }, 
                    { 'data': 'nomArea' },  
                    { 'data': 'Llegada' }
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias totales",
                    "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
                    "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Asistencias",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo", 
                        "next": "Siguiente",
                        "previous": "Anterior"
                    } 
                }
            });
            $('#tableFiltro').attr('hidden', false);    
            $('#tableFiltro_wrapper').attr('hidden', false);
        }
        

    });

    
    $('#consultCert').on('click', function(){
        $('#tableHoy').attr('hidden', true);
        $('#consultHoy').css('background', 'white'); 
        $('#consultDepto').css('background', 'white');
        $('#consultCert').css('background', 'gray'); 
        $('#tableHoy').attr('hidden', true);
        $('#tableConsultarPorDepto').attr('hidden', true); 
        
    }); 

    function noHayAsistenciasHoy(){ 
        var Toast = Swal.mixin({  
            toast: true,
            position: 'top-center',  
            showConfirmButton: false,     
            timer: 4000  
        });   
        Toast.fire({    
            icon: 'error',
            title: 'Aún no hay asistencias para el día de hoy.... '
        })
    }

    function crearTableFiltro(){
        $('#tableFiltro').DataTable({
            dom: "Blfrtip",
            "aaSorting":[], 
            buttons:{
                dom:{ 
                    button:{
                        className: 'btn'
                    }
                },
                buttons:[
                    {
                        extend:"excel",
                        text:'Exportar Excel',
                        className: 'btn btn-outline-success mb-3',
                        excelStyles:{
                            "template": ['blue_gray_medium'] 
                        }
                    },

                
                    
                ]
            },           
            ajax:'http://132.247.147.17/~javiergv/controlAsistencia/usuario/asistenciasCert',
            columns: [
                { data: 'Fecha' },
                { data: 'nombre' }, 
                { data: 'nomArea' },  
                { data: 'Llegada' }
            ],
            "autoWidth": false,
            "responsive": true,
            language: {
                "decimal": "",
                "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias totales",
                "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
                "infoFiltered": "(Filtrado de _MAX_ total asistencias)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Asistencias",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo", 
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        }); 
    }

    
});