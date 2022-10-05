function init() {
  $("#docs_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$(document).ready(function() {


  $.post("../../controller/usuario.php?op=combo", function (data) {
    $("#usu_asig").html(data);
  });
 

});

$(document).on("click", "#btnenviar", function () {
  var usu_id = $("#user_idx").val();
  var formData = new FormData();
  formData.append("usu_id", usu_id);
  var totalfiles = $("#fileElem").val().length;
  for (var i = 0; i < totalfiles; i++) {
    formData.append("files[]", $("#fileElem")[0].files[i]);
  }

  $.ajax({
    url: "../../controller/documento.php?op=insert",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#fileElem").val("");
      swal.fire("Correcto!", "Registrado Correctamente", "success");
    },
  });
});
