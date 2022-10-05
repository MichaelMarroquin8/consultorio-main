var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            
            $.post("../../controller/usuario.php?op=emailregistro", {usu_correo : $("#usu_correo").val()}, function (datos) {
            });
            console.log(datos);
            $('#usuario_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            Swal.fire({
                title: "Consultorio SENA!",
                text: "Completado.",
                icon: "success",
                confirmButtonColor: '#3085d6',
                confirmButtonText: "Aceptar",
            });
        }
    }); 
}

$(document).ready(function(){
     tabla=$('#usuario_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/usuario.php?op=listar',
            type : "post",
            dataType : "json",						
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
});

function editar(usu_id){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/rol.php?op=combo",function(data, status){
        $('#rol_id').html(data);
    });

    $.post("../../controller/subrol.php?op=combo1",function(data, status){
        $('#rols_id').html(data);
    });

    $.post("../../controller/usuario.php?op=mostrar", {usu_id : usu_id}, function (data) {
        data = JSON.parse(data);
        $('#usu_id').val(data.usu_id);
        $('#usu_tid').val(data.usu_tid).trigger('change');
        $('#usu_cc').val(data.usu_cc);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_ape').val(data.usu_ape);
        $('#usu_ficha').val(data.usu_ficha);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pass);
        $('#rol_id').val(data.rol_id).trigger('change');
        $('#rols_id').val(data.rols_id).trigger('change');
    }); 

    $('#modalmantenimiento2').modal('show');
}

function eliminar(usu_id){
    Swal.fire({
        title: "Consultorio Sena",
        text: "Esta seguro de Eliminar el registro?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: "Eliminar",
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/usuario.php?op=eliminar", {usu_id : usu_id}, function (data) {

            }); 

            $('#usuario_data').DataTable().ajax.reload();	

            Swal.fire({
                title: "Consultorio Sena!",
                text: "Registro Eliminado.",
                icon: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    
    $.post("../../controller/rol.php?op=combo",function(data, status){
        $('#rol_id').html(data);
    });

    $("#rol_id").change(function(){
        rol_id = $(this).val();

        $.post("../../controller/subrol.php?op=combo",{rol_id : rol_id},function(data, status){
            $('#rols_id').html(data);
        });
    });

    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $('#modalmantenimiento').modal('show');
});

init();