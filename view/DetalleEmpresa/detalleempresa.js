function init() {}

$(document).ready(function () {
  var emp_id = getUrlParameter("ID");

  listardetalle(emp_id);

  $("#tickd_descrip").summernote({
    height: 100,
    lang: "es-ES",
    callbacks: {
      onImageUpload: function (image) {
        console.log("Image detect...");
        myimagetreat(image[0]);
      },
      onPaste: function (e) {
        console.log("Text detect...");
      },
    },
    toolbar: [
      ["style", ["bold", "italic", "underline", "clear"]],
      ["font", ["strikethrough", "superscript", "subscript"]],
      ["fontsize", ["fontsize"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["height", ["height"]],
    ],
  }); 

  
  tabla = $("#documentos_data")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      searching: true,
      lengthChange: false,
      colReorder: true,
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
      ajax: {
        url: "../../controller/documento.php?op=listar",
        type: "post",
        data: { emp_id: emp_id },
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
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
};

$(document).on("click", "#btnenviar", function () {
  var emp_id = getUrlParameter("ID");
  var usu_id = $("#user_idx").val();
  var tickd_descrip = $("#tickd_descrip").val();

  if ($("#tickd_descrip").summernote("isEmpty")) {
    swal.fire("Advertencia!", "Falta Descripción", "warning");
  } else {
    var formData = new FormData();
    formData.append("emp_id", emp_id);
    formData.append("usu_id", usu_id);
    formData.append("tickd_descrip", tickd_descrip);
    var totalfiles = $("#fileElem").val().length;
    for (var i = 0; i < totalfiles; i++) {
      formData.append("files[]", $("#fileElem")[0].files[i]);
    }

    if (totalfiles==0) {
        swal.fire("Advertencia!", "Faltan documentos", "warning");
    }else { 
        $.ajax({
        url: "../../controller/empresa.php?op=insertdetalle",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
          console.log(data);
          listardetalle(emp_id);
          /* TODO: Limpiar inputfile */
          $("#fileElem").val("");
          $("#tickd_descrip").val("reset");
          swal.fire("Correcto!", "Registrado Correctamente", "success");
        },
      });
    }
   
  }
});


$(document).on("click","#btneditar", function(emp_id){
  var emp_id = getUrlParameter("ID");
  
  $('#empresa_edit')[0].reset();
  $('#modaleditar').modal('show');
  $('#mdltitulo').html('Editar Empresa');

  $.post("../../controller/usuario.php?op=combo2",function(data, status){
      $('#usu_id').html(data);
  });

  $.post("../../controller/empresa.php?op=mostrar", { emp_id : emp_id }, function (data) {
      data = JSON.parse(data);

      $("#eemp_nit").val(data.emp_nit);
      $('#eemp_n_trab').val(data.emp_n_trab);
      $('#eemp_r_social').val(data.emp_r_social);
      $('#eemp_re_legal').val(data.emp_re_legal);
      $('#eemp_acti_eco').val(data.emp_acti_eco);
      $('#eemp_nriesgo').val(data.emp_nriesgo);
      $("#eemp_arl").val(data.emp_arl);
      $("#eemp_tel").val(data.emp_tel);
      $('#eemp_dir').val(data.emp_dir);
      
      $("#eemp_cnom").val(data.emp_cnom);
      $("#eemp_ccar").val(data.emp_ccar);
      $("#eemp_ctel").val(data.emp_ctel);
      $("#eemp_cemail").val(data.emp_cemail);
  }); 

});

$(document).on("click","#btnactualizar", function(){

  var emp_id = getUrlParameter("ID");

  var eemp_nit = $("#eemp_nit").val();
  var eemp_r_social = $('#eemp_r_social').val();
  var eemp_n_trab = $('#eemp_n_trab').val();
  var eemp_re_legal = $('#eemp_re_legal').val();
  var eemp_acti_eco = $('#eemp_acti_eco').val();
  var eemp_nriesgo = $('#eemp_nriesgo').val();
  var eemp_arl = $("#eemp_arl").val();
  var eemp_dir = $('#eemp_dir').val();
  var eemp_tel = $("#eemp_tel").val();
  var eemp_cnom = $("#eemp_cnom").val();
  var eemp_ccar = $("#eemp_ccar").val();
  var eemp_ctel = $("#eemp_ctel").val();
  var eemp_cemail = $("#eemp_cemail").val();
  
  $.post("../../controller/empresa.php?op=editar", {emp_id:emp_id,emp_nit:eemp_nit,emp_r_social:eemp_r_social,emp_n_trab:eemp_n_trab,emp_re_legal:eemp_re_legal,emp_acti_eco:eemp_acti_eco,emp_nriesgo:eemp_nriesgo,emp_arl:eemp_arl,emp_tel:eemp_tel,emp_dir:eemp_dir,emp_cnom:eemp_cnom,emp_ccar:eemp_ccar,emp_ctel:eemp_ctel,emp_cemail:eemp_cemail}, function (data) {
      swal.fire({title: "Correcto", text: "Actualizado Correctamente!", icon: 
      "success"}).then(function(){ 
        location.reload();
        }
      );
  }); 

});


function listardetalle(emp_id) {
  $.post(
    "../../controller/empresa.php?op=listardetalle",
    { emp_id: emp_id },
    function (data) {
      $("#lbldetalle").html(data);
    }
  );

  $.post(
    "../../controller/empresa.php?op=mostrar",
    { emp_id: emp_id },
    function (data) {
      data = JSON.parse(data);
      $("#lblnomusuario").html(data.usu_nom + " " + data.usu_ape);
      $("#lblfechcrea").html(data.fech_crea);

      $("#lblnomidticket").html("Detalle Empresa <br>" + data.emp_r_social +"<br>" + data.emp_nit);

      $("#emp_titulo").val(data.emp_r_social);
      $("#emp_nit").val(data.emp_nit);
      $("#emp_rlegal").val(data.emp_re_legal);
      $("#emp_ntrab").val(data.emp_n_trab);
      $("#emp_aeco").val(data.emp_acti_eco);
      $("#emp_nries").val(data.emp_nriesgo);
      $("#emp_arl").val(data.emp_arl);
      $("#emp_tel").val(data.emp_tel);
      $("#usu_correo").val(data.usu_correo);
      $("#emp_cnom").val(data.emp_cnom);
      $("#emp_ccar").val(data.emp_ccar);
      $("#emp_ctel").val(data.emp_ctel);
      $("#emp_cemail").val(data.emp_cemail);
    }
  );
}

init();
