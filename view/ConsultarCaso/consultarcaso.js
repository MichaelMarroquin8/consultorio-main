var tabla;
var usu_id = $("#user_idx").val();
var emp_id = $("#emp´_idx").val();
var rol_id = $("#rol_idx").val();
var rols_id = $("#rols_idx").val();

function init() {
  $("#ticket_form").on("submit", function (e) {
    guardar(e);
  });
}

$(document).ready(function () {
  
  $.post("../../controller/usuario.php?op=combo", function (data) {
    $("#usu_asig").html(data);
  });

  if (rols_id == 3) {
    tabla = $("#ticket_data")
      .dataTable({
        aProcessing: true,
        aServerSide: true,
        dom: "Bfrtip",
        searching: true,
        lengthChange: false,
        colReorder: true,
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        ajax: {
          url: "../../controller/ticket.php?op=listar_x_usu",
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
  } else if (rols_id == 2) {
    tabla = $("#ticket_data")
      .dataTable({
        aProcessing: true,
        aServerSide: true,
        dom: "Bfrtip",
        searching: true,
        lengthChange: false,
        colReorder: true,
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        ajax: {
          url: "../../controller/ticket.php?op=listar_x_asig",
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
  } else if (rols_id == 1) {
    tabla = $("#ticket_data")
      .dataTable({
        aProcessing: true,
        aServerSide: true,
        dom: "Bfrtip",
        searching: true,
        lengthChange: false,
        colReorder: true,
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        ajax: {
          url: "../../controller/ticket.php?op=listar",
          type: "post",
          dataType: "json",
          error: function (e) {
            console.log(e.responseText);
          },
        },
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
  }
});

function ver(tick_id) {
  window.open(
    //localhost
    "http://localhost/Consultorio-master/view/DetalleCaso/?ID=" + tick_id + ""
    //producción
    // "http://consultorio.senacgts.org/view/DetalleCaso/?ID=" + tick_id + ""
  );
}

function asignar(tick_id) {
  $.post(
    "../../controller/ticket.php?op=mostrar",
    { tick_id: tick_id },
    function (data) {
      data = JSON.parse(data);
      $("#tick_id").val(data.tick_id);

      $("#mdltitulo").html("Asignar Agente");
      $("#modalasignar").modal("show");
    }
  );
}

function guardar(e) {
  e.preventDefault();
  var formData = new FormData($("#ticket_form")[0]);
  $.ajax({
    url: "../../controller/ticket.php?op=asignar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      var tick_id = $("#tick_id").val();
      $.post(
        "../../controller/email.php?op=ticket_asignado",
        { tick_id: tick_id },
        function (data) {}
      );

      swal.fire("Correcto!", "Asignado Correctamente", "success");

      $("#modalasignar").modal("hide");
      $("#ticket_data").DataTable().ajax.reload();
    },
  });
}

function CambiarEstado(tick_id) {

    Swal.fire({
      title: "Consultorio Sena",
      text: "¿Esta seguro de Reabrir el Caso?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: "Si",
      cancelButtonColor: '#d33',
      cancelButtonText: "No",
      closeOnConfirm: false
  }).then((result) => {
  if (result.isConfirmed) {

        $.post(
          "../../controller/ticket.php?op=reabrir",
          { tick_id: tick_id, usu_id: usu_id },
          function (data) {}
        );

        $("#ticket_data").DataTable().ajax.reload();

        swal.fire({
          title: "Consultorio SENA!",
          text: "Caso Abierto.",
          icon: "success",
          confirmButtonClass: "btn-success",
        });
      }
    }
  );
}

init();
