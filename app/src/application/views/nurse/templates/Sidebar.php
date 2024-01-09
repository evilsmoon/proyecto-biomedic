  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">BioMedic</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Enfermera</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item ">
            <a href="<?php echo base_url('Enfermera/');?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url('Enfermera/solicitudes');?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Solicitudes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Enfermera/cronograma'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Cronograma
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>