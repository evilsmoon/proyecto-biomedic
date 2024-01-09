</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cronograma</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Cronograma</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                    <div class="card-header">
                            <a class="btn btn-app" type="button" id="btn-modal-asignar-tecnico">
                                <i class="fas fa-tasks"></i> Asignar Trabajo
                            </a>
                        </div>

                        <div class="card-body ">
                            <div class="table-responsive-xl">
                                <table id='cronograma' class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">ID</th>
                                            <th rowspan="3">Número de Inventario</th>
                                            <th rowspan="3">Personal Asignado</th>
                                            <th colspan="16">Cuartimestre #1</th>
                                            <th colspan="16">Cuartimestre #2</th>
                                            <th colspan="16">Cuartimestre #3</th>
                                        </tr>
                                        <tr>

                                            <!-- Cuartimestre #1 -->
                                            <th colspan="4">Enero</th>
                                            <th colspan="4">Febrero</th>
                                            <th colspan="4">Marzo</th>
                                            <th colspan="4">Abril</th>
                                            <!-- Cuartimestre #2 -->
                                            <th colspan="4">Mayo</th>
                                            <th colspan="4">Junio</th>
                                            <th colspan="4">Julio</th>
                                            <th colspan="4">Agosto</th>
                                            <!-- Cuartimestre #3 -->
                                            <th colspan="4">Septiembre</th>
                                            <th colspan="4">Octubre</th>
                                            <th colspan="4">Noviembre</th>
                                            <th colspan="4">Diciembre</th>
                                        </tr>
                                        <tr>

                                            <!-- Enero -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Febrero -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Marzo -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Abril -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Mayo -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Junio -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Julio -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Agosto -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Septiembre -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Octubre -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Noviembre -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <!-- Diciembre -->
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cronogramas as $cronograma) : ?>
                                            <tr>
                                                <td><?php echo $cronograma->Equipo_ID; ?></td>
                                                <td><?php echo $cronograma->nombre_equipo; ?></td>
                                                <td><?php echo $cronograma->nombre_personal; ?></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_1_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_1_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_1_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_1_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_2_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_2_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_2_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_2_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_3_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_3_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_3_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_3_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_4_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_4_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_4_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_4_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_5_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_5_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_5_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_5_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_6_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_6_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_6_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_6_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_7_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_7_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_7_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_7_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_8_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_8_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_8_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_8_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_9_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_9_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_9_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_9_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_10_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_10_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_10_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_10_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_11_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_11_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_11_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_11_4 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_12_1 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_12_2 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_12_3 == 0 ? '' : 'checked'; ?>></td>
                                                <td><input type="checkbox" disabled <?php echo $cronograma->Cuatrimestre_12_4 == 0 ? '' : 'checked'; ?>></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
