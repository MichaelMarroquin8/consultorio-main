function init() {
  $("#docs_form").on("submit",function(e){
    guardaryeditar(e);
});
}

$(document).ready(function () {
  $.post("../../controller/rol.php?op=combo", function (data, status) {
    $("#rol_id").html(data);
  });
});

// $(document).on("click", "#btnenviar", function () {
//   var formData = new FormData();

//   formData.append("usu_id", usu_id);

//   var totalfiles = $("#fileElem").val().length;

//   for (var i = 0; i < totalfiles; i++) {
//     formData.append("files[]", $("#fileElem")[0].files[i]);
//   }

//   $.ajax({
//     url: "../../controller/empresa.php?op=documentos",
//     type: "POST",
//     data: formData,
//     contentType: false,
//     processData: false,
//     success: function (data) {
//       $("#fileElem").val("");
//       swal.fire("Correcto!", "Registrado Correctamente", "success");
//     },
//   });
// });

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#docs_form")[0]);
  var totalfiles = $("#fileElem").val().length;
  for (var i = 0; i < totalfiles; i++) {
    formData.append("files[]", $("#fileElem")[0].files[i]);
  }

  $.ajax({
    url: "../../controller/empresa.php?op=insert",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      data = JSON.parse(data);
      console.log(data);
      swal.fire("Correcto!", "Registrado Correctamente", "success");
    },
  });
}

init();
