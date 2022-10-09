<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url(); ?>/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SIPES</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info ml-2">
        <a href="#" class="d-block"><?= session('nama') ?></a><a href="<?= base_url(); ?>/auth/logout" class="d-block">Logout</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">Menu</li>
        <li class="nav-item">
          <a href="<?= base_url(); ?>/dashboard" class="nav-link">
            <i class="fas fa-tachometer-alt nav-icon"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php if (session('role') == 'siswa') { ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/pengumuman" class="nav-link">
              <i class="fas fa-bell nav-icon"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/siswa/profile" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>Data Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/cetak" class="nav-link">
              <i class="fas fa-print nav-icon"></i>
              <p>Cetak</p>
            </a>
          </li>
        <?php } ?>
        <?php if (session('role') == 'admin') { ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/manage/user" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>Data User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/manage/siswa" class="nav-link">
              <i class="fas fa-user-tie nav-icon"></i>
              <p>Data Seleksi Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/settings" class="nav-link">
              <i class="fa fa-cog nav-icon"></i>
              <p>Pengaturan</p>
            </a>
          </li>
          <!-- <li class="nav-item">
              <a href="<?= base_url(); ?>/profile-matching/seleksi" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Seleksi Siswa</p>
              </a>
            </li> -->
          <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>
          <?php } ?>
        </ul>
      </nav> -->
          <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>