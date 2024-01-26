<div class="modal fade" id="modal-formulario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-formulario">Formulario Equipo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" id="idEquipo" name="idEquipo" hidden>
                    <div class="row">
                        <div class="col">
                            <h2>1. Función del equipo</h2>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Descripción Categoría</th>
                                    <th scope="col">Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="3">Terapéutico</td>
                                    <td>Apoyo vital</td>
                                    <td><input type="number" class="form-control text-center" id='1-1-1' name="1-1-1" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Cirugía y cuidados intensivos</td>
                                    <td><input type="number" class="form-control text-center" id='1-1-2' name="1-1-2" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Fisioterapia y tratamiento</td>
                                    <td><input type="number" class="form-control text-center" id='1-1-3' name="1-1-3" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">Diagnóstico</td>
                                    <td>Control de cirugía y cuidados intensivos</td>
                                    <td><input type="number" class="form-control text-center" id='1-2-1' name="1-2-1" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>

                                    <td>Control fisiológico adicional y diagnóstico</td>
                                    <td><input type="number" class="form-control text-center" id='1-2-2' name="1-2-2" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">Analítico</td>
                                    <td>Análisis del laboratorio</td>
                                    <td><input type="number" class="form-control text-center" id='1-3-1' name="1-3-1" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Accesorios del laboratorio</td>
                                    <td><input type="number" class="form-control text-center" id='1-3-2' name="1-3-2" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Computadoras y afines</td>
                                    <td><input type="number" class="form-control text-center" id='1-3-3' name="1-3-3" min="1" max="10" disabled ></td>
                                </tr>

                                <tr>
                                    <td>Otros</td>
                                    <td>Relacionados con el paciente y otros</td>
                                    <td><input type="number" class="form-control text-center" id='1-4-1' name="1-4-1" min="1" max="10" disabled ></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h2>2. Riesgo físico</h2>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Descripción el riesgo durante el uso</th>
                                    <th>Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Riesgo de muerte del paciente</td>
                                    <td><input type="number" class="form-control text-center" id="2-1" name="2-1" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Posible lesión del paciente o el operador</td>
                                    <td><input type="number" class="form-control text-center" id="2-2" name="2-2" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Tratamiento inapropiado o error de diagnóstico</td>
                                    <td><input type="number" class="form-control text-center" id="2-3" name="2-3" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Daño al equipo</td>
                                    <td><input type="number" class="form-control text-center" id="2-4" name="2-4" min="1" max="10" disabled ></td>
                                </tr>
                                <tr>
                                    <td>Sin riesgo significativo identificado</td>
                                    <td><input type="number" class="form-control text-center" id="2-5" name="2-5" min="1" max="10" disabled ></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>