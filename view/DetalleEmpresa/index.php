<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
  <!DOCTYPE html>
  <html>
  <?php require_once("../MainHead/head.php"); ?>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <title>CRL-SENA</>::Mi Empresa</title>
  </head>

  <body>
    <div id="app">
      <div id="main" class="layout-horizontal">
        <header class="mb-5">
          <?php require_once("../MainHeader/header.php"); ?>


          <?php require_once("../MainNav/nav.php"); ?>
        </header>
        <div class="content-wrapper container">
          <div class="page-heading">
            <div class="tbl-cell">
              <h3 id="lblnomidticket">Detalle Empresa - 1</h3>
              <div id="lblestado"></div>
              <span class="badge bg-info" id="lblnomusuario"></span>
              <span class="badge bg-secondary" id="lblfechcrea"></span>
            </div>
          </div>
          <div class="page-content">
            <section class="row">
              <div class="mb-3">
                <div class="row">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_titulo">Razon Social</label>
                              <input type="text" class="form-control" id="emp_titulo" name="emp_titulo" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_nit">Nit</label>
                              <input type="text" class="form-control" id="emp_nit" name="emp_nit" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_rlegal">Representante legal</label>
                              <input type="text" class="form-control" id="emp_rlegal" name="emp_rlegal" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_ntrab">Numero de trabajadores</label>
                              <input type="text" class="form-control" id="emp_ntrab" name="emp_ntrab" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_aeco">Actividad Economica</label>
                              <input type="text" class="form-control" id="emp_aeco" name="emp_aeco" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_nries">Nivel de riesgo</label>
                              <input type="text" class="form-control" id="emp_nries" name="emp_nries" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_arl">Nombre ARL</label>
                              <input type="text" class="form-control" id="emp_arl" name="emp_arl" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="emp_tel">Telefono</label>
                              <input type="text" class="form-control" id="emp_tel" name="emp_tel" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="usu_correo">email</label>
                              <input type="text" class="form-control" id="usu_correo" name="usu_correo" readonly>
                            </fieldset>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <section class="activity-line" id="lbldetalle">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="box-typical box-typical-padding" id="pnldetalle">
                          <p>
                            Suba documentos de su empresa desde aqui
                          </p>
                          <div class="row">
                            <div class="row">
                              <div class="col-lg-12">
                                <fieldset class="form-group">
                                  <label class="form-label semibold" for="tickd_descrip">Descripción</label>
                                  <textarea id="tickd_descrip" name="tickd_descrip" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </fieldset>
                              </div>
                              <!-- TODO: Agregar archivos adjuntos -->
                              <div class="col-lg-12">
                                <fieldset class="form-group">
                                  <label class="form-label semibold" for="fileElem">Documentos</label>
                                  <input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
                                </fieldset>
                              </div>

                              <div class="col-lg-12">
                                <button type="button" id="btnenviar" class="btn btn-primary rounded-pill">Enviar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php require_once("../MainJs/js.php"); ?>

    <script type="text/javascript" src="detalleempresa.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "index.php");
}
?>