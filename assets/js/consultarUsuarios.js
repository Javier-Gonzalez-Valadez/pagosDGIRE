$(document).ready(function () {
    $('#consultDepto').css('background', 'white');
    $('#consultTodos').css('background', 'gray');  
    $('#tableConsultarTodos').DataTable({
        ajax:'http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultarTodos',
        columns: [
            { data: 'nombre' }, 
            { data: 'loginUsuario' },  
            { data: 'correo' },  
            { data: 'nomPerfil' },
            { data: 'nomArea' }
        ],
        "autoWidth": false,
        "responsive": true,
        language: {
            "decimal": "",
            "emptyTable": "No hay usuarios que mostrar",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios totales",
            "infoEmpty": "Mostrando 0 de 0 de 0 usuarios totales",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ usuarios",
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
    $('#tableConsultarPorDepto').DataTable({
        ajax:'http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultarTodos',
        columns: [
            { data: 'nombre' }, 
            { data: 'loginUsuario' },  
            { data: 'correo' },  
            { data: 'nomPerfil' },
            { data: 'nomArea' }
        ],
        "autoWidth": false,
        "responsive": true,
        language: {
            "decimal": "",
            "emptyTable": "No hay usuarios que mostrar",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios totales",
            "infoEmpty": "Mostrando 0 de 0 de 0 usuarios totales",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ usuarios",
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
    $('#tableConsultarPorDepto').attr('hidden', true);    
    $('#tableConsultarPorDepto_wrapper').attr('hidden', true);  
    //_------------CONSULTAR TODOS LOS USUARIOS------------
    $('#consultTodos').on('click', function(){ 
        $('.divSelect').attr('hidden', true); 
        $('#consultDepto').css('background', 'white');
        $('#consultTodos').css('background', 'gray');  
        $('#tableConsultarTodos').attr('hidden', false); 
        $('#tableConsultarTodos_wrapper').attr('hidden', false);
        $('#tableConsultarPorDepto').attr('hidden', true); 
        $('#tableConsultarPorDepto_wrapper').attr('hidden', true);  
    });
    //-------------FIN DE CONSULTAR TODOS LOS USUARIOS---------

    $('#consultDepto').on('click', function(){ 
        $('.divSelect').attr('hidden', false); 
        $('#consultDepto').css('background', 'gray');
        $('#consultTodos').css('background', 'white'); 
        $('#tableConsultarTodos').attr('hidden', true); 
        $('#tableConsultarTodos_wrapper').attr('hidden', true);
        $('#tableConsultarPorDepto').attr('hidden', false);
        $('#tableConsultarPorDepto_wrapper').attr('hidden', false);    
    }); 

    //-----------------CONSULTAR POR DEPARTAMENTO------------------------  
    $('#consulBtn').on('click',function (e) {
        e.preventDefault();
        
        if($('#selectDepto').val()!="Seleccione" && $('#selectDepto').val()!="todo"){
            
            var idArea = $("#selectDepto option:selected").val(); 
            console.log(idArea);  
            $('#tableConsultarPorDepto').DataTable().destroy();
            $('#tableConsultarPorDepto').find('tbody').detach();  
            $('#tableConsultarPorDepto').DataTable({
                'ajax':{
                    'method': "POST",
                    'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultarPorDepto", 
                    'data': {
                        'idArea' : idArea,
                    },
                },
                'columns': [
                    { data: 'nombre' }, 
                    { data: 'loginUsuario' },
                    { data: 'correo' },  
                    { data: 'nomPerfil' },
                    { data: 'nomArea' }
                ], 
                language: {
                    "decimal": "",
                    "emptyTable": "No hay usuarios que mostrar",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios totales",
                    "infoEmpty": "Mostrando 0 de 0 de 0 usuarios totales",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ usuarios",
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
            $('#tableConsultarPorDepto').attr('hidden', false);    
            $('#tableConsultarPorDepto_wrapper').attr('hidden', false);  
        }else if($('#selectDepto').val()!="Seleccione" && $('#selectDepto').val()=="todo"){
            var idSubd = $("#selectSubd option:selected").val(); 
            console.log(idSubd);  
            $('#tableConsultarPorDepto').DataTable().destroy();
            $('#tableConsultarPorDepto').find('tbody').detach();  
            $('#tableConsultarPorDepto').DataTable({
                'ajax':{
                    'method': "POST",
                    'url': "http://132.247.147.17/~javiergv/controlAsistencia/usuario/consultarTodosUsuariosSubd", 
                    'data': {
                        'idSubd' : idSubd,
                    },
                },
                'columns': [
                    { data: 'nombre' }, 
                    { data: 'loginUsuario' },
                    { data: 'correo' },  
                    { data: 'nomPerfil' }, 
                    { data: 'nomArea' }
                ], 
                language: {
                    "decimal": "",
                    "emptyTable": "No hay usuarios que mostrar",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios totales",
                    "infoEmpty": "Mostrando 0 de 0 de 0 usuarios totales",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ usuarios",
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
            $('#tableConsultarPorDepto').attr('hidden', false);    
            $('#tableConsultarPorDepto_wrapper').attr('hidden', false);  
        }
        else{
            camposFaltantes(); 
        }
        
    });
    //-------------FIN DE CONSULTAR POR DEPARTAMENTO----------------------

    function alertaEcontradosDepto(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'top-center', 
            showConfirmButton: false,     
            timer: 4000  
        });   
        Toast.fire({    
            icon: 'success',
            title: 'Usuarios encontrados, procesando....'
        })
    }

    function procesando(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'top-center', 
            showConfirmButton: false,     
            timer: 4000  
        });   
        Toast.fire({    
            icon: 'success',
            title: 'Procesando...'
        })
    }
    function camposFaltantes(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'top-center',  
            showConfirmButton: false,     
            timer: 4000  
        });   
        Toast.fire({    
            icon: 'error',
            title: 'Seleccione el departamento del cual quiere consultar los empleados primeramente !!'
        })
    }

    function alertaError(){
        var Toast = Swal.mixin({  
            toast: true,
            position: 'top-center', 
            showConfirmButton: false,     
            timer: 5000  
        });   
        Toast.fire({   
            icon: 'error',
            title: 'Hubo un error a la hora de buscar a los usuarios...'
        })
    }
});
