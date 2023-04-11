$(document).ready(function(){ 
    idArea = $('#idArea').val();
    console.log(idArea);
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
        'ajax':{
            'method': "POST",
            'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/asistenciasHoyConsult", 
            'data': {
                'idArea' : idArea                  
            },
        },
        'columns': [
            { 'data': 'Fecha' }, 
            { 'data': 'nombre' }, 
            { 'data': 'nomArea' },  
            { 'data': 'Llegada' }
        ],
        "autoWidth": false,
        "responsive": true,
        language: {
            "decimal": "",
            "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias",
            "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
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
        'ajax':{
            'method': "POST",
            'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/asistenciasTodasConsult", 
            'data': {
                'idArea' : idArea                  
            },
        },
        'columns': [
            { 'data': 'Fecha' }, 
            { 'data': 'nombre' }, 
            { 'data': 'nomArea' },  
            { 'data': 'Llegada' }
        ],
        "autoWidth": false,
        "responsive": true,
        language: {
            "decimal": "",
            "emptyTable": "Aún no hay usuarios que hayan registrado su entrada",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias",
            "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
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
     
    $('#tableFiltro_wrapper').attr('hidden', true);    
    
    
    $('#consultHoy').on('click', function(){
        $('#consultHoy').css('background', 'gray'); 
        $('#consultFechas').css('background', 'white');
        $('#consultCert').css('background', 'white'); 
        $('#tableHoy').attr('hidden', false); 
        $('#tableHoy_wrapper').attr('hidden', false); 
        $('#tableFiltro_wrapper').attr('hidden', true);  
        $('#divFiltrarFecha').attr('hidden', true); 
        
    }); 

    $('#consulBtn').on('click', function(e){
        e.preventDefault();
        
        var fechaInicio = $('#fechaInicio').val();
        fechaInicio = fechaInicio.replaceAll('-', '/'); 
        var fechaFin = $('#fechaFin').val();
        fechaFin = fechaFin.replaceAll('-', '/');  
        
        if(fechaInicio != '' && fechaFin !='' ){//--------------------------CON FECHA Y DEPARTAMENTO---------------------------------------
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
                    'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/asistenciasPorFechaConsult", 
                    'data': {
                        'fechaInicio' : fechaInicio,
                        'fechaFin' : fechaFin,
                        'depto' : idArea
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias",
                    "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
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

    $('#consultFechas').on('click', function(){
        $('#consultHoy').css('background', 'white'); 
        $('#consultFechas').css('background', 'gray');
        $('#tableHoy').attr('hidden', true); 
        $('#tableHoy_wrapper').attr('hidden', true); 
        $('#tableFiltro').attr('hidden', false); 
        $('#tableFiltro_wrapper').attr('hidden', false);  
        $('#divFiltrarFecha').attr('hidden', false);
    }); 
    

    $('#filtrarPorFecha').change(function() { 
        if(this.checked ) {
            $('#formDepto').attr('hidden', false); 
            $('#divFechas').attr('hidden', false); 
        }else{
            if($('#filtrarPorDepto').is(':checked')){
                $('#divFechas').attr('hidden', true); 
            }else{
                $('#formDepto').attr('hidden', true); 
                $('#divFechas').attr('hidden', true); 
            }
        }
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ asistencias",
                "infoEmpty": "Mostrando 0 de 0 de 0 asistencias totales",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
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