<div class="modal fade" id="modal-calificar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Calificar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id='form-calificzar' action="<?php echo base_url('Enfermera/calificar_orden') ?>">
                    <div class="row">
                        <input type="text" id="id_orden" name="id_orden" hidden>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" id="estado" name="estado">
                                    <option value="APROBADO"> Aprobado </option>
                                    <option value="RECHAZADO"> Rechazado </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start gap-3">
                        <button type="button" class="btn btn-danger mx-2" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary mx-2">Calificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>