  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <!-- Brand Logo -->
    <style>
      .brand-link {
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>

    <!-- <a href="#" class="brand-link">
      <span class="brand font-weight-light">Biomed Soft</span>
    </a> -->
    <div class="brand-link ">
            <samp class="brand-text fs-5 text-center"><b class="fs-1" style="color: #7DBAE5;">Biomed</b>Soft</samp>
        </div>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel text-center  mt-3 pb-3 mb-3">
        <i class=" fas fa-user mx-1" style="color: #7DBAE5;" ></i>
         <?php echo $this->session->userdata('user'); ?>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('Admin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;" ></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Cronograma'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;" ></i>
              <p>
                Cronograma
              </p>
            </a>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/usuarios'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;" ></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/preventivo'); ?>" class="nav-link ">
              <i class="nav-icon fas fa-list-alt " style="color: #7DBAE5;" ></i>
              <p>
                Notificaciones de mantenimiento preventivo
              </p>

              <span class="badge badge-danger right">+1</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Admin/ordentrabajo'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;" ></i>
              <p>
                Notificaciones de mantenimiento correctivo
                <span class="badge badge-danger right">+1</span>
              </p>
              
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Admin/fichas_tecnicas'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;" ></i>
              <p>
                Fichas técnicas
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>