var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

/* TODO: Guardar datos de los input */
function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/categoria.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#usuario_form')[0].reset();
            /* TODO:Ocultar Modal */
            $("#modalmantenimiento").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();

            /* TODO:Mensaje de Confirmacion */
            swal.fire({
                title: "Consultorio Sena!",
                text: "Completado.",
                icon: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
}

$(document).ready(function(){
    /* TODO: Mostrar listado de registros */
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
            url: '../../controller/categoria.php?op=listar',
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

/* TODO: Mostrar informacion segun ID en los inputs */
function editar(cat_id){
    $('#mdltitulo').html('Editar Registro');

    /* TODO: Mostrar Informacion en los inputs */
    $.post("../../controller/categoria.php?op=mostrar", {cat_id : cat_id}, function (data) {
        data = JSON.parse(data);
        $('#cat_id').val(data.cat_id);
        $('#cat_nom').val(data.cat_nom);
    }); 

    /* TODO: Mostrar Modal */
    $('#modalmantenimiento').modal('show');
}

/* TODO: Cambiar estado a eliminado en caso de confirmar mensaje */
function eliminar(cat_id){
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
            $.post("../../controller/categoria.php?op=eliminar", {cat_id : cat_id}, function (data) {

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

/* TODO: Limpiar Inputs */
$(document).on("click","#btnnuevo", function(){
    $('#cat_id').val('');
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    /* TODO:Mostrar Modal */
    $('#modalmantenimiento').modal('show');
});

init();