<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">
                    <input type="hidden" id="cats_id" name="cats_id">

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label" for="cat_id">Soporte</label>
                                <select class="select2 form-select" id="cat_id" name="cat_id" data-placeholder="Seleccionar" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cats_nom">Nombre</label>
                                <input type="text" class="form-control" id="cats_nom" name="cats_nom" placeholder="Ingrese Nombre" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cerrar</span>
                    </button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>