<div class="modal fade" id="modal-solicitud">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Formulario Equipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prioridad">Prioridad:</label>
                                <select class="form-control" id="prioridad" name="prioridad">
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="servicioMedico">Servicio médico:</label>
                                <input type="text" class="form-control" id="servicioMedico" name="servicioMedico">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="personalAsignado">Personal asignado:</label>
                                <input type="text" class="form-control" id="personalAsignado" name="personalAsignado">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="asunto">Asunto:</label>
                                <textarea type="text" class="form-control" id="asunto" name="asunto"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="solicitadoPor">Solicitado por:</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>