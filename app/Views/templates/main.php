<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPES</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/plugins/fontawesome-free/css/all.min.css") ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/plugins/jqvmap/jqvmap.min.css") ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/dist/css/adminlte.min.css") ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/plugins/daterangepicker/daterangepicker.css") ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url("admin-lte/plugins/summernote/summernote-bs4.min.css") ?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <!-- JS -->
  <script src=""></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">


  <div class="wrapper">

    <!-- Header -->
    <?= $this->include('templates/layouts/header') ?>
    <!-- End Header -->

    <!-- Main Sidebar Container -->
    <?= $this->include('templates/layouts/sidebar') ?>
    <!-- End Sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <?php if (!empty(session()->getFlashdata('success'))) { ?>
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              <strong><?= session()->getFlashdata('success'); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } else if (!empty(session()->getFlashdata('error'))) { ?>
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              <strong><?= session()->getFlashdata('error'); ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

          <?= $this->renderSection('content') ?>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>Copyright &copy; 2022 SIPES.</strong>
      All rights reserved.
    </footer>


  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url("admin-lte/plugins/jquery/jquery.min.js") ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url("admin-lte/plugins/jquery-ui/jquery-ui.min.js") ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url("admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <!-- ChartJS -->
  <script src="<?= base_url("admin-lte/plugins/chart.js/Chart.min.js") ?>"></script>
  <!-- Sparkline -->
  <script src="<?= base_url("admin-lte/plugins/sparklines/sparkline.js") ?>"></script>
  <!-- JQVMap -->
  <script src="<?= base_url("admin-lte/plugins/jqvmap/jquery.vmap.min.js") ?>"></script>
  <script src="<?= base_url("admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js") ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url("admin-lte/plugins/jquery-knob/jquery.knob.min.js") ?>"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url("admin-lte/plugins/moment/moment.min.js") ?>"></script>
  <script src="<?= base_url("admin-lte/plugins/daterangepicker/daterangepicker.js") ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url("admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") ?>"></script>
  <!-- Summernote -->
  <script src="<?= base_url("admin-lte/plugins/summernote/summernote-bs4.min.js") ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url("admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("admin-lte/dist/js/adminlte.js") ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url("admin-lte/dist/js/demo.js") ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url("admin-lte/dist/js/pages/dashboard.js") ?>"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script src="<?= base_url("assets/js/modal.js") ?>"></script>
  <script>
    $(document).ready(function() {
      $('#table_user').DataTable({
        "order": [
          [4, "asc"]
        ]
      });
    });
  </script>

</body>

</html>