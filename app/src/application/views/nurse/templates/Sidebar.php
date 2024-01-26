  <aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <style>
      .brand-link {
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>

    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Biomed Soft</span>
    </a>

    <div class="sidebar">
    <div class="user-panel text-center  mt-3 pb-3 mb-3">
        <i class=" fas fa-user mx-1" style="color: #7DBAE5;"></i>
         <?php echo $this->session->userdata('user'); ?>
      </div>

      <!-- Sidebar Menu -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item ">
          <a href="<?php echo base_url('Enfermera/'); ?>" class="nav-link">
            <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;"></i>
            <p>
              Inventario
            </p>
          </a>
        </li>
        <li class="nav-item ">
          <a href="<?php echo base_url('Enfermera/solicitudes'); ?>" class="nav-link">
            <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;"></i>
            <p>
              Solicitudes
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Enfermera/cronograma'); ?>" class="nav-link">
            <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;"></i>
            <p>
              Cronograma
            </p>
          </a>
        </li>
      </ul>
      </nav>
    </div>
  </aside>