<div id="modaleditar" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="empresa_edit">
                <div class="modal-body">

                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="esis_descrip">Links</label>
                            <textarea type="text" class="form-control" id="esis_descrip" name="esis_descrip"></textarea>
                        </fieldset>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Cerrar</span>
                        </button>

                        <button type="button" id="btnactualizar" class="btn btn-primary rounded-pill">Enviar</button>
                    </div>
            </form>
        </div>
    </div>
</div>