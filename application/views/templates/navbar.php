<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          
          <a class="nav-link" data-toggle="dropdown" href="#">Selamat Datang, <?= $this->session->userdata('username') ?></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-cog"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a href="<?= base_url('profil') ?>" class="dropdown-item">
              <i class="fa fa-user-circle mr-2"></i> Pengaturan Akun
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
              <i class="fa fa-remove mr-2"></i> Logout
            </a>
          </div>
        </li>
        
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= base_url() ?>dashboard" class="brand-link">
          <span class="brand-text font-weight-light">Sisfo SLBN 1 Maros</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              
              <?php foreach ($menus as $menu): ?>
             
                  <li class="nav-item">
                    <a href="<?= base_url() ?><?= $menu['url'] ?>" class="nav-link">
                      <i class="<?= $menu['icon'] ?>"></i>
                      <p><?= $menu['judul'] ?></p>
                    </a>
                  </li>
                  
              <?php endforeach ?>
                  
                  <!-- <li class="nav-item">
                    <a href="<?= base_url() ?>siswa" class="nav-link">
                      <i class="far fa-user nav-icon"></i>
                      <p>
                        Siswa
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>guru" class="nav-link">
                      <i class="far fa-user nav-icon"></i>
                      <p>
                        Guru
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>rombel" class="nav-link">
                      <i class="far fas fa-book nav-icon"></i>
                      <p>
                        Rombel
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>jadwal" class="nav-link">
                      <i class="nav-icon far fa-calendar-alt"></i>
                      <p>
                        Jadwal
                      </p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview">
                    <a href="" class="nav-link">
                      <i class="far far fa-plus-square nav-icon"></i>
                      <p>
                        Data Master
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?= base_url() ?>jurusan" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Jurusan</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= base_url() ?>mapel" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Mapel</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?= base_url() ?>ruangan" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Ruangan</p>
                        </a>
                      </li> -->
                    <!--   </ul>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url() ?>admin" class="nav-link">
                      <i class="far fa-user nav-icon"></i>
                      <p>
                        Admin
                      </p>
                    </a>
                  </li> -->
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $judul ?></h1>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>
                  <!-- /.content-header -->