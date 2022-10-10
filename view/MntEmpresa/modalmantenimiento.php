<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="empresa_form">
                <div class="modal-body">


                    <div class="form-group">
                        <label class="form-label semibold" for="usu_id">Usuario Asignado</label>
                        <select id="usu_id" name="usu_id" class="form-control" data-placeholder="Seleccionar">
                            <option label="Seleccionar"></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_nit">NIT</label>
                        <input type="text" class="form-control" id="emp_nit" name="emp_nit" placeholder="NIT" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_r_social">Razon Socail</label>
                        <input type="text" class="form-control" id="emp_r_social" name="emp_r_social" placeholder="Razon Socail" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_n_trab">Numero trabajadores</label>
                        <input type="number" class="form-control" id="emp_n_trab" name="emp_n_trab" placeholder="Numero trabajadores" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_re_legal">Representante legal</label>
                        <input type="text" class="form-control" id="emp_re_legal" name="emp_re_legal" placeholder="Representante legal" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_acti_eco">Activiad economica</label>
                        <input type="text" class="form-control" id="emp_acti_eco" name="emp_acti_eco" placeholder="Activiad economica" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="emp_nriesgo">Nivel riesgo</label>
                        <select id="emp_nriesgo" name="emp_nriesgo" class="form-control" data-placeholder="Seleccionar">
                            <option label="Seleccionar"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_arl">ARL</label>
                        <input type="text" class="form-control" id="emp_arl" name="emp_arl" placeholder="ARL" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_tel">Telefono</label>
                        <input type="number" class="form-control" id="emp_tel" name="emp_tel" placeholder="Telefono" required>
                    </div>

                    
                    <div class="form-group">
                        <label class="form-label" for="emp_dir">Dirección</label>
                        <input type="text" class="form-control" id="emp_dir" name="emp_dir" placeholder="Telefono" required>
                    </div>
                    
                    <label class="form-label" for="">Datos de contacto</label>

                    <div class="form-group">
                        <label class="form-label" for="emp_cnom">Nombre</label>
                        <input type="text" class="form-control" id="emp_cnom" name="emp_cnom" placeholder="Telefono" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="emp_ccar">Cargo</label>
                        <input type="text" class="form-control" id="emp_ccar" name="emp_ccar" placeholder="Telefono" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_ctel">Telefono</label>
                        <input type="text" class="form-control" id="emp_ctel" name="emp_ctel" placeholder="Telefono" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="emp_cemail">Email</label>
                        <input type="text" class="form-control" id="emp_cemail" name="emp_cemail" placeholder="Telefono" required>
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