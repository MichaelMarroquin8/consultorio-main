function init() {}

$(document).ready(function () {
  listardetalle();
});

function listardetalle() {
    sis_sst=1;
  $.post(
    "../../controller/sistemasst.php?op=get_sistemas_auditoria",
    { sis_sst: sis_sst },
    function (data) {
      data = JSON.parse(data);
      $("#sis_descrip").val(data.sis_descrip);
    }
  );
}

init();
