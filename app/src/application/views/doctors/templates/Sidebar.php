  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">BioMedic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Doctor</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('Doctor'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Doctor/fichas_tecnicas'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Fichas Tecnicas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Doctor/pendientes'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Mantenimiento correctivo 
              </p>
              <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">+1
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Doctor/cronograma'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Cronograma  
              </p> 
              <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">+1
              </span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>