<main class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../index2.html"><b>Biomed</b>Soft</a>
        </div>
        <!--login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sessión </p>

                <form id="loginform" action="/Login/ingresar" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="username" name="username"  placeholder="Usuario" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password"  placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row flex justify-content-end">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>

            </div>
            <!--login-card-body -->
        </div>
    </div>
</main>