<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
  <!DOCTYPE html>
  <html>
  <?php require_once("../MainHead/head.php"); ?>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <title>CRL-SENA</>::Mis Casos</title>
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
              <h3 id="lblnomidticket">Detalle Caso - 1</h3>
              <div id="lblestado"></div>
              <span class="badge bg-info" id="lblempresa"></span><br>
              <span class="badge bg-success" id="lblnomusuario"></span>
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
                              <label class="form-label semibold" for="tick_titulo">Titulo</label>
                              <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="cat_nom">Categoria</label>
                              <input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
                            </fieldset>
                          </div>

                          <div class="col-lg-6">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="cat_nom">SubCategoria</label>
                              <input type="text" class="form-control" id="cats_nom" name="cats_nom" readonly>
                            </fieldset>
                          </div>



                          <div class="col-lg-12">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="tick_titulo">Documentos Adicionales</label>
                              <table id="documentos_data" class="table">
                                <thead>
                                  <tr>
                                    <th style="width: 90%;">Nombre</th>
                                    <th class="text-center" style="width: 10%;"></th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                              </table>
                            </fieldset>
                          </div>


                          <div class="col-lg-12">
                            <fieldset class="form-group">
                              <label class="form-label semibold" for="tickd_descripusu">Descripción</label>
                              <div class="summernote-theme-1">
                                <textarea id="tickd_descripusu" name="tickd_descripusu" class="summernote" name="name"></textarea>
                              </div>

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
                            Ingrese su respuesta
                          </p>
                          <div class="row">
                            <div class="col-lg-12">
                              <fieldset class="form-group">
                                <label class="form-label semibold" for="tickd_descrip">Descripción</label>
                                <div class="summernote-theme-1">
                                  <textarea id="tickd_descrip" name="tickd_descrip" class="summernote" name="name"></textarea>
                                </div>
                              </fieldset>
                            </div>
                            
                            <!-- TODO: Agregar archivos adjuntos -->
                            <div class="col-lg-12">
                              <fieldset class="form-group">
                                <label class="form-label semibold" for="fileElem">Documentos Adicionales</label>
                                <input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
                              </fieldset>
                            </div>

                            <div class="col-lg-12">
                              <button type="button" id="btnenviar" class="btn btn-primary rounded-pill">Enviar</button>
                              <?php
                              if ($_SESSION["rol_id"] == 2) {
                              ?>
                                <button type="button" id="btncerrarticket" class="btn btn-danger rounded-pill">Cerrar Caso</button>
                              <?php
                              }
                              ?>
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
    <?php require_once("../MainJs/js.php"); ?>

    <script type="text/javascript" src="detalleticket.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "index.php");
}
?>