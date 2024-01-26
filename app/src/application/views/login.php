<main class="d-flex justify-content-between align-items-center h-100 w-100">
    <img src="assets/images/software_engineer.png" class=" h-100 w-75">
    <div class="h-50 w-25">
        <div class="fs-2 text-center">
            <b class="fs-1" style="color: #7DBAE5;">Biomed</b>Soft
        </div>
        <!--login-logo -->
        <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded">

            <div class="card-body">
                <p class="text-center fs-3">Iniciar Sesión </p>

                <form id="loginform" action="/Login/ingresar" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="usename" name="usename"  placeholder="Usuario" required>
                        <span class="input-group-text"><span class="fas fa-user"></span></span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="usepassword" name="usepassword"  placeholder="Contraseña" required>
                        <span class="input-group-text"><span class="fas fa-lock"></span></span>
                    </div>
                    <button type="submit" class=" col-12 btn mx-1 btn-block" style="background-color: #7DBAE5; color: white;">Ingresar</button>
                </form>

            </div>
            <!--login-card-body -->
        </div>
    </div>
  
</main>