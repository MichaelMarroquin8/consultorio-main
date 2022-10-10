var tabla;

function init(){
    $("#empresa_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
	var formData = new FormData($("#empresa_form")[0]);
    $.ajax({
        url: "../../controller/empresa.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#empresa_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#empresa_data').DataTable().ajax.reload();

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
    tabla=$('#empresa_data').dataTable({
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
            url: '../../controller/empresa.php?op=listar',
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

function ver(emp_id) {
    window.open(
        //localhost
        "http://localhost/Consultorio-master/view/DetalleEmpresa/?ID=" + emp_id + ""
        //producción
        // "http://consultorio.senacgts.org/view/DetalleEmpresa/?ID=" + emp_id + ""
    );
}

function editar(emp_id){
    $('#mdltitulo').html('Editar Empresa');

    $.post("../../controller/usuario.php?op=combo2",function(data, status){
        $('#usu_id').html(data);
    });

    $.post("../../controller/empresa.php?op=mostrar", {emp_id : emp_id}, function (data) {
        data = JSON.parse(data);
        $('#usu_id').val(data.usu_id).trigger('change');
        $('#emp_nit').val(data.emp_nit);
        $('#emp_r_social').val(data.emp_r_social);
        $('#emp_n_trab').val(data.emp_n_trab);
        $('#emp_re_legal').val(data.emp_re_legal);
        $('#emp_acti_eco').val(data.emp_acti_eco);
        $('#emp_nriesgo').val(data.emp_nriesgo);
        $('#emp_arl').val(data.emp_arl);
        $('#emp_tel').val(data.emp_tel);
        $('#emp_dir').val(data.emp_dir);
    }); 

    $('#modaleditar').modal('show');
}

function eliminar(emp_id){
    Swal.fire({
        title: "Consultorio Sena",
        text: "¿Esta seguro de Eliminar esta empresa?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: "Eliminar",
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("../../controller/empresa.php?op=eliminar", {emp_id : emp_id}, function (data) {

            }); 

            $('#empresa_form')[0].reset();
            $("#modalmantenimiento").modal('hide');
            $('#empresa_data').DataTable().ajax.reload();

            Swal.fire({
                title: "Consultorio Sena!",
                text: "Empresa Eliminado.",
                icon: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){


    $.post("../../controller/usuario.php?op=combo2",function(data, status){
        $('#usu_id').html(data);
    });
    
    $('#mdltitulo').html('Nuevo Registro');
    $('#empresa_form')[0].reset();
    $('#modalmantenimiento').modal('show');
});

init();