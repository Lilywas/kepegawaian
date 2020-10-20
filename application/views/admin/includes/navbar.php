<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= site_name . " - " . $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text|Signika+Negative:300|Zilla+Slab&display=swap" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">

  <link href="<?= base_url('assets/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- SIDEBAR -->
    <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('home/admin') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= site_name ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($this->uri->segment('1') == 'home') {
                            echo ('active');
                          } ?>">
        <a class="nav-link" href="<?= site_url('home/admin') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item <?php if ($this->uri->segment('1') == 'addpegawai') {
                            echo ('active');
                          } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Tambah Pegawai</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" style="font-size: 15px" href="<?= site_url('addpegawai/pns') ?>">PNS</a>
            <a class="collapse-item" style="font-size: 15px" href="<?= site_url('addpegawai') ?>">Non-PNS</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php if ($this->uri->segment('1') == 'unit') {
                            echo ('active');
                          } ?>">
        <a class="nav-link" href="<?= site_url('unit') ?>">
          <i class="far fa-building fa-fw"></i>
          <span>Unit Kerja</span>
        </a>
      </li>

      <li class="nav-item <?php if ($this->uri->segment('1') == 'subunit') {
                            echo ('active');
                          } ?>">
        <a class="nav-link" href="<?= site_url('subunit') ?>">
          <i class="fas fa-network-wired fa-fw"></i>
          <span>Sub Unit Kerja</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?php if ((($this->uri->segment('1') == 'listpegawai') && ($this->uri->segment('2') != 'nonaktif')) || ($this->uri->segment('1') == 'kompetensi')) {
                            echo ('active');
                          } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-table"></i>
          <span>Daftar Pegawai</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" style="font-size: 15px" href="<?= site_url('listpegawai') ?>">Pegawai Aktif</a>
            <a class="collapse-item" style="font-size: 15px" href="<?= site_url('listpegawai/pensiun') ?>"><?= "Pegawai Akan Pensiun" ?></a>
          </div>
        </div>
      </li>
      <li class="nav-item <?php if ($this->uri->segment('2') == 'nonaktif') {
                            echo ('active');
                          } ?>">
        <a class="nav-link" href="<?= site_url('listpegawai/nonaktif') ?>">
          <i class="fas fa-history fa-fw"></i>
          <span>Daftar Pegawai Non-Aktif</span>
        </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand navbar-light bg-gray-900 topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item no-arrow">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </li>
          </ul>
        </nav>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Pilih "Logout" untuk keluar dari halaman.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= site_url('account/logout') ?>">Logout</a>
              </div>
            </div>
          </div>
        </div>