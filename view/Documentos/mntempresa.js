var tabla;
var usu_id = $("#user_idx").val();

function init(){
}

$(document).ready(function(){
    tabla = $("#empresa_data")
      .dataTable({
        aProcessing: true,
        aServerSide: true,
        dom: "Bfrtip",
        searching: true,
        lengthChange: false,
        colReorder: true,
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        ajax: {
          url: "../../controller/empresa.php?op=listar_x_asig",
          type: "post",
          dataType: "json",
          data: { usu_id: usu_id },
          error: function (e) {
            console.log(e.responseText);
          },
        },
        ordering: false,
        bDestroy: true,
        responsive: true,
        bInfo: true,
        iDisplayLength: 10,
        autoWidth: false,
        language: {
          sProcessing: "Procesando...",
          sLengthMenu: "Mostrar _MENU_ registros",
          sZeroRecords: "No se encontraron resultados",
          sEmptyTable: "Ningún dato disponible en esta tabla",
          sInfo: "Mostrando un total de _TOTAL_ registros",
          sInfoEmpty: "Mostrando un total de 0 registros",
          sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
          sInfoPostFix: "",
          sSearch: "Buscar:",
          sUrl: "",
          sInfoThousands: ",",
          sLoadingRecords: "Cargando...",
          oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior",
          },
          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
              ": Activar para ordenar la columna de manera descendente",
          },
        },
      })
      .DataTable();
});

function ver(emp_id) {
    window.open(
      //loal
      // "http://localhost/Consultorio-master/view/DetalleEmpresa/?ID=" + emp_id + ""
      //produccion
      "http://consultorio.senacgts.org/view/DetalleEmpresa/?ID=" + emp_id + ""
    );
}

init();