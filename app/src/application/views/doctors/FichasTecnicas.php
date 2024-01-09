<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Solicitudes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Técnico</a></li>
                        <li class="breadcrumb-item active">Ficha Tecnicas</li>
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
                            <a class="btn btn-app" type="button" id="btn-modal-ficha">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <table id='fichas' class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre Equipo</th>
                                        <th hidden>url Equipo</th>
                                        <th>PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($fichas as $ficha) : ?>
                                        <tr>
                                            <td><?php echo $ficha['id']; ?></td>
                                            <td><?php echo $ficha['nom_equipo']; ?></td>
                                            <td hidden><?php echo $ficha['url_equipo']; ?></td>
                                            <td><a></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
