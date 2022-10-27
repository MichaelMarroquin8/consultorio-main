<div id="modaleditar" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="empresa_edit">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="form-label" for="eemp_nit">NIT</label>
                        <input type="text" class="form-control" id="eemp_nit" name="eemp_nit" placeholder="NIT" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eemp_r_social">Razon Socail</label>
                        <input type="text" class="form-control" id="eemp_r_social" name="eemp_r_social" placeholder="Razon Socail" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eemp_n_trab">Numero trabajadores</label>
                        <input type="number" class="form-control" id="eemp_n_trab" name="eemp_n_trab" placeholder="Numero trabajadores" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eemp_re_legal">Representante legal</label>
                        <input type="text" class="form-control" id="eemp_re_legal" name="eemp_re_legal" placeholder="Representante legal" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eemp_acti_eco">Activiad economica</label>
                        <input type="text" class="form-control" id="eemp_acti_eco" name="eemp_acti_eco" placeholder="Activiad economica" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="eemp_nriesgo">Nivel riesgo</label>
                        <select id="eemp_nriesgo" name="eemp_nriesgo" class="form-control" data-placeholder="Seleccionar">
                            <option label="Seleccionar"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eemp_arl">ARL</label>
                        <input type="text" class="form-control" id="eemp_arl" name="eemp_arl" placeholder="ARL" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eemp_tel">Telefono</label>
                        <input type="number" class="form-control" id="eemp_tel" name="eemp_tel" placeholder="Telefono" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eemp_dir">Dirección</label>
                        <input type="text" class="form-control" id="eemp_dir" name="eemp_dir" placeholder="Telefono" required>
                    </div>


                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold" for="">Datos de contacto</label>
                        </fieldset>
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="eemp_cnom">Nombre</label>
                        <input type="text" class="form-control" id="eemp_cnom" name="eemp_cnom">
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="eemp_ccar">Cargo</label>
                        <input type="text" class="form-control" id="eemp_ccar" name="eemp_ccar">
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="eemp_ctel">Telefono</label>
                        <input type="text" class="form-control" id="eemp_ctel" name="eemp_ctel">
                    </div>

                    <div class="form-group">
                        <label class="form-label semibold" for="eemp_cemail">Email</label>
                        <input type="text" class="form-control" id="eemp_cemail" name="eemp_cemail">
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