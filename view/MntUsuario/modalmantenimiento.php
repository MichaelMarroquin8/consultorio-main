<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">

                    <input type="hidden" id="usu_id" name="usu_id">

                    <div class="form-group">
                        <label class="form-label semibold" for="usu_tid">Tipo ID</label>
                        <select id="usu_tid" name="usu_tid" class="form-control" data-placeholder="Seleccionar">
                            <option label="Seleccionar"></option>
                            <option value="1">Cedula de Ciudadania</option>
                            <option value="2">Tarjeta de identidad</option>
                            <option value="3">Cedula de Extranjeria</option>
                            <option value="4">PEP</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_cc">No. identidad</label>
                        <input type="text" class="form-control" id="usu_cc" name="usu_cc" placeholder="Ingrese No. identidad" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_nom">Nombre</label>
                        <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_ape">Apellido</label>
                        <input type="text" class="form-control" id="usu_ape" name="usu_ape" placeholder="Ingrese Apellido" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_ficha">Ficha</label>
                        <input type="text" class="form-control" id="usu_ficha" name="usu_ficha" placeholder="Ingrese Ficha">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_correo">Correo Electronico</label>
                        <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="test@test.com" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="usu_pass">Contraseña</label>
                        <input type="text" class="form-control" id="usu_pass" name="usu_pass" placeholder="************" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="rol_id">Rol</label>
                        <select id="rol_id" name="rol_id" class="form-control" data-placeholder="Seleccionar">
                            <option label="Seleccionar"></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="rols_id">SubRol</label>
                        <select id="rols_id" name="rols_id" class="form-control" data-placeholder="Seleccionar">
                            <option label="Seleccionar"></option>
                        </select>
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