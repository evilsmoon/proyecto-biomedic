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

    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Biomed Soft</span>
    </a>

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
            <a href="<?php echo base_url('Doctor');?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;"></i>
              <p>
                Inventario
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="<?php echo base_url('Doctor/pendientes'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;"></i>
              <p>
                Mantenimiento correctivo
                <span class="badge badge-danger right">+1</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Doctor/cronograma'); ?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt" style="color: #7DBAE5;"></i>
              <p>
                Cronograma  
        
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>