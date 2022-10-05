<div class="modal fade text-left" id="modalasignar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="ticket_form">
                <div class="modal-body">
                    <input type="hidden" id="tick_id" name="tick_id">
                    <section class="basic-choices">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="usu_asig">Soporte</label>
                                                        <select class="select2 form-select" id="usu_asig" name="usu_asig" data-placeholder="Seleccionar" required>

                                                        </select>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cerrar</span>
                    </button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Asignar</button>
                </div>
            </form>
        </div>
    </div>
</div>