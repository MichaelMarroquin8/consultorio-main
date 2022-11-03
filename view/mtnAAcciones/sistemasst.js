function init() {}

$(document).ready(function () {
  listardetalle();
});

$(document).on("click","#btneditar", function(){
  
  sis_sst=1

  $('#empresa_edit')[0].reset();
  $('#modaleditar').modal('show');
  $('#mdltitulo').html('Editar Empresa');

  $.post(
    "../../controller/sistemasst.php?op=get_sistemas_accion",
    { sis_sst: sis_sst },
    function (data) {
      data = JSON.parse(data);
      $("#sis_descrip").val(data.sis_descrip);
    }
  );
});

$(document).on("click","#btnactualizar", function(){


  var esis_descrip = $("#esis_descrip").val();
  
  $.post("../../controller/sistemasst.php?op=update_sistemas_accion", {sis_descrip:esis_descrip}, function (data) {
      swal.fire({title: "Correcto", text: "Actualizado Correctamente!", icon: 
      "success"}).then(function(){ 
        location.reload();
        }
      );
  }); 

});


function listardetalle() {
    sis_sst=1;
  $.post(
    "../../controller/sistemasst.php?op=get_sistemas_accion",
    { sis_sst: sis_sst },
    function (data) {
      data = JSON.parse(data);
      $("#sis_descrip").val(data.sis_descrip);
    }
  );
}

init();
